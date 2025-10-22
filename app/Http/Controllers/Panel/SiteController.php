<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiteRequest;
use App\Models\Organisation;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller
{
    use AuthorizesRequests;

    public function create(Organisation $organisation)
    {
        if (!Auth::user()->can('addSite', $organisation)) {
            abort(Response::HTTP_FORBIDDEN, __('pages.errors.403.message'));
        }

        return view('panel.sites.create', compact('organisation'));
    }

    public function store(StoreSiteRequest $request, Organisation $organisation)
    {
        if (!Auth::user()->can('addSite', $organisation)) {
            return back()->with('error', __('pages.errors.403.message'));
        }

        $validatedData = $request->validated();

        $baseSlug = Str::slug($validatedData['name']);
        $slug = $baseSlug;

        $originalSlug = $baseSlug;
        $counter = 1;
        while (Site::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . Str::random(5);
        }

        $site = new Site([
            'name' => $validatedData['name'],
            'slug' => $slug,
            'custom_domain' => $validatedData['custom_domain'] ?? null,
            'user_id' => Auth::id(),
            'organisation_id' => $organisation->id,
            'status' => 'pending',
            'storage_path' => 'sites/' . $slug,
        ]);

        $site->save();

        return redirect()
            ->route('panel.overview', $organisation)
            ->with('success', __('panel.sites.create_success'));
    }
}
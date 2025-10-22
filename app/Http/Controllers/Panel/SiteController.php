<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiteRequest;
use App\Models\Organisation;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function overview(Organisation $organisation, Site $site)
    {
        if (!Auth::user()->can('view', $organisation)) {
            abort(Response::HTTP_FORBIDDEN, __('pages.errors.403.message'));
        }

        return view('panel.sites.overview', compact('organisation', 'site'));
    }

    public function files(Request $request, Organisation $organisation, Site $site)
    {
        if (!Auth::user()->can('view', $organisation)) {
            abort(Response::HTTP_FORBIDDEN, __('pages.errors.403.message'));
        }

        $path = $request->query('path', '/');
        $fullPath = $site->storage_path . $path;

        $files = Storage::files($fullPath);
        $directories = Storage::directories($fullPath);

        return view('panel.sites.files', compact('organisation', 'site', 'files', 'directories', 'path'));
    }

    public function editFile(Request $request, Organisation $organisation, Site $site)
    {
        if (!Auth::user()->can('view', $organisation)) {
            abort(Response::HTTP_FORBIDDEN, __('pages.errors.403.message'));
        }

        $file = $request->query('file');
        $path = $site->storage_path . $file;

        if (!Storage::exists($path)) {
            abort(Response::HTTP_NOT_FOUND, __('pages.errors.404.message'));
        }

        $content = Storage::get($path);

        return view('panel.sites.edit-file', compact('organisation', 'site', 'file', 'content'));
    }

    public function updateFile(Request $request, Organisation $organisation, Site $site)
    {
        if (!Auth::user()->can('view', $organisation)) {
            abort(Response::HTTP_FORBIDDEN, __('pages.errors.403.message'));
        }

        $file = $request->query('file');
        $path = $site->storage_path . '/' . $file;

        if (!Storage::exists($path)) {
            abort(Response::HTTP_NOT_FOUND, __('pages.errors.404.message'));
        }

        Storage::put($path, $request->input('content'));

        return redirect()
            ->route('panel.sites.files', [$organisation, $site])
            ->with('success', __('panel.sites.files.update_success'));
    }

    public function backups(Organisation $organisation, Site $site)
    {
        if (!Auth::user()->can('view', $organisation)) {
            abort(Response::HTTP_FORBIDDEN, __('pages.errors.403.message'));
        }

        return view('panel.sites.backups', compact('organisation', 'site'));
    }

    public function visits(Organisation $organisation, Site $site)
    {
        if (!Auth::user()->can('view', $organisation)) {
            abort(Response::HTTP_FORBIDDEN, __('pages.errors.403.message'));
        }

        return view('panel.sites.visits', compact('organisation', 'site'));
    }

    public function settings(Organisation $organisation, Site $site)
    {
        if (!Auth::user()->can('view', $organisation)) {
            abort(Response::HTTP_FORBIDDEN, __('pages.errors.403.message'));
        }

        return view('panel.sites.settings', compact('organisation', 'site'));
    }
}
<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation;
use Illuminate\Support\Str;

class OrganisationController extends Controller
{
    public function overview(Organisation $organisation)
    {
        $organisation->load('sites');

        return view('panel.organisations.overview', compact('organisation'));
    }

    public function settings(Organisation $organisation)
    {
        return view('panel.organisations.settings', compact('organisation'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(['name' => 'required|min:4|max:20',]);

        $baseSlug = Str::slug($validatedData['name']);
        $slug = $baseSlug;

        while (Organisation::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . Str::random(5);
        }

        $organisation = Organisation::create([
            'name' => $validatedData['name'],
            'email' => Auth::user()->email,
            'user_id' => Auth::id(),
            'slug' => $slug,
        ]);

        //$organisation->users()->attach(Auth::id(), ['role' => 'ownder']);
        $organisation->users()->attach(Auth::id(), ['role' => 'admin']);

        return redirect()->route('panel.organisations.overview', $organisation);
    }
}
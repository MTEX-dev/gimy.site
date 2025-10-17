<?php

namespace App\Http\Controllers\CP;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = auth()->user()->profiles;

        return view('cp.profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('cp.profiles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'avatar_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'primary_color' => ['nullable', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
            'secondary_color' => ['nullable', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
        ]);

        if ($request->hasFile('avatar_path')) {
            $validated['avatar_path'] = $request->file('avatar_path')->store('profiles/avatars', 'public');
        }

        auth()->user()->profiles()->create($validated);

        return redirect()->route('cp.profiles.index')->with('success', __('cp.profiles.success.created'));
    }

    public function edit(Profile $profile)
    {
        return view('cp.profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'avatar_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'primary_color' => ['nullable', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
            'secondary_color' => ['nullable', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
        ]);

        if ($request->hasFile('avatar_path')) {
            // Delete old avatar if it exists
            if ($profile->avatar_path) {
                Storage::disk('public')->delete($profile->avatar_path);
            }
            $validated['avatar_path'] = $request->file('avatar_path')->store('profiles/avatars', 'public');
        }

        $profile->update($validated);

        return redirect()->route('cp.profiles.index')->with('success', __('cp.profiles.success.updated'));
    }

    public function destroy(Profile $profile)
    {
        // Delete avatar if it exists
        if ($profile->avatar_path) {
            Storage::disk('public')->delete($profile->avatar_path);
        }

        $profile->delete();

        return redirect()->route('cp.profiles.index')->with('success', __('cp.profiles.success.deleted'));
    }
}

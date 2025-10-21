<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OrganisationController extends Controller
{
    public function overview(Organisation $organisation)
    {
        $organisation->load('sites');

        return view('panel.organisations.overview', compact('organisation'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:20',
        ]);

        $baseSlug = Str::slug($validatedData['name']);
        $slug = $baseSlug;

        $originalSlug = $baseSlug;
        $counter = 1;
        while (Organisation::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . Str::random(5);
        }

        $organisation = Organisation::create([
            'name' => $validatedData['name'],
            'email' => Auth::user()->email,
            'user_id' => Auth::id(),
            'slug' => $slug,
        ]);

        $organisation->users()->attach(Auth::id(), ['role' => 'admin']);

        return redirect()->route('panel.overview', $organisation);
    }

    public function settings(Organisation $organisation)
    {
        return view('panel.organisations.settings', compact('organisation'));
    }

    public function update(Request $request, Organisation $organisation)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:20',
            'email' => 'nullable|email',
        ]);

        $organisation->update($validatedData);

        return redirect()
            ->route('panel.organisations.settings', $organisation)
            ->with('success', __('panel.organisations.update_success'));
    }

    public function destroy(Request $request, Organisation $organisation)
    {
        $request->validate([
            'slug_confirmation' => 'required|string',
            'password' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail(__('panel.organisations.password_mismatch'));
                    }
                },
            ],
        ]);

        if ($request->slug_confirmation !== $organisation->slug) {
            return back()->withErrors([
                'slug_confirmation' => __('panel.organisations.slug_mismatch'),
            ]);
        }

        $organisation->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', __('panel.organisations.delete_success'));
    }

    public function members(Organisation $organisation)
    {
        $members = $organisation->users()->withPivot('role')->get();

        return view('panel.organisations.members', compact('organisation', 'members'));
    }

    public function addMember(Request $request, Organisation $organisation)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
            'role' => 'required|in:admin,member',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if ($organisation->users()->where('user_id', $user->id)->exists()) {
            return back()->withErrors([
                'email' => __('panel.organisations.member_already_exists'),
            ]);
        }

        $organisation->users()->attach($user->id, ['role' => $validatedData['role']]);

        return back()->with('success', __('panel.organisations.member_added_success'));
    }

    public function updateMemberRole(
        Request $request,
        Organisation $organisation,
        User $user,
    ) {
        $validatedData = $request->validate([
            'role' => 'required|in:admin,member',
        ]);

        $organisation->users()->updateExistingPivot($user->id, [
            'role' => $validatedData['role'],
        ]);

        return back()->with('success', __('panel.organisations.member_role_updated_success'));
    }

    public function removeMember(Organisation $organisation, User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->withErrors([
                'message' => __('panel.organisations.cannot_remove_self'),
            ]);
        }

        $organisation->users()->detach($user->id);

        return back()->with('success', __('panel.organisations.member_removed_success'));
    }
}
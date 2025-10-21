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

        //$organisation->users()->attach(Auth::id(), ['role' => 'ownder']);
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

        return redirect()->route('panel.organisations.settings', $organisation)->with('success', 'Organisation settings updated.');
    }

    public function destroy(Organisation $organisation)
    {
        $organisation->delete();

        return redirect()->route('panel.dashboard')->with('success', 'Organisation deleted.');
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
            return back()->withErrors(['email' => 'This user is already a member of the organisation.']);
        }

        $organisation->users()->attach($user->id, ['role' => $validatedData['role']]);

        return back()->with('success', 'Member added successfully.');
    }

    public function updateMemberRole(Request $request, Organisation $organisation, User $user)
    {
        $validatedData = $request->validate([
            'role' => 'required|in:admin,member',
        ]);

        $organisation->users()->updateExistingPivot($user->id, ['role' => $validatedData['role']]);

        return back()->with('success', 'Member role updated successfully.');
    }

    public function removeMember(Organisation $organisation, User $user)
    {
        $organisation->users()->detach($user->id);

        return back()->with('success', 'Member removed successfully.');
    }
}
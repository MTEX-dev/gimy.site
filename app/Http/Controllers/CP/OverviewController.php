<?php

namespace App\Http\Controllers\CP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OverviewController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profiles = $user->profiles()->withCount(['aliases', 'links', 'projects', 'socials'])->get();

        $stats = [
            'profiles' => $profiles->count(),
            'aliases' => $profiles->sum('aliases_count'),
            'links' => $profiles->sum('links_count'),
            'total_link_clicks' => $user->profiles()->withCount('linkClicks')->get()->sum('link_clicks_count'),
            'projects' => $profiles->sum('projects_count'),
            'socials' => $profiles->sum('socials_count'),
            'deeplinks' => $user->deeplinks()->count(),
            'total_deeplink_clicks' => $user->deeplinks()->withCount('clicks')->get()->sum('clicks_count')
        ];

        return view('cp.dashboard', compact('stats'));
    }
}

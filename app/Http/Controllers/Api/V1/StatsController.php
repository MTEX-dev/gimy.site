<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Organisation;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index()
    {
        return response()->json([
            'users' => User::count(),
            'organisations' => Organisation::count(),
            'sites' => Site::count(),
        ]);
    }

    public function admin()
    {
        $users = User::withCount('organisations')->get()->map(function ($user) {
            $siteCount = 0;
            foreach ($user->organisations as $organisation) {
                $siteCount += $organisation->sites()->count();
            }
            $user->sites_count = $siteCount;
            return $user;
        });

        $organisations = Organisation::withCount('sites', 'users')->get();

        $sites = Site::with('organisation.users')->get()->map(function ($site) {
            return [
                'id' => $site->id,
                'name' => $site->name,
                'organisation_name' => $site->organisation->name,
                'organisation_user_count' => $site->organisation->users->count(),
            ];
        });

        return response()->json([
            'users' => $users,
            'organisations' => $organisations,
            'sites' => $sites,
        ]);
    }
}
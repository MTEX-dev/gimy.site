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
}
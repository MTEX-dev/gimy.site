<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation;

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
}

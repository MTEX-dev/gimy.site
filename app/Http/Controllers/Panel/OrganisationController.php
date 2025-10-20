<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Organisation, OrganisationMember, Site};
use Illuminate\Support\Facades\Auth;

class OrganisationController extends Controller
{
    public function overview(Organisation $organisation = null)
    {
        if (!$organisation) {
            $organisation = Auth::user()
                ->organisations()
                ->first();
        }

        if (!$organisation) {
            abort(
                404,
                'No organisation found. Please create one or join an existing one.'
            );
        }

        $organisation->load('sites');

        return view('panel.organisations.overview', compact('organisation'));
    }
}
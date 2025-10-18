<?php

namespace App\Http\Controllers;

use App\Models\{User, Site, SiteVisit};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function lander()
    {
        $stats = [
            'total_users' => User::count(),
            'total_sites' => Site::count(),
            'total_site_visits' => SiteVisit::count(),
            'total_site_files' => 0,
        ];

        return view('pages.lander', compact('stats'));
    }

    public function legal(string $section)
    {
        $validSections = config('app.legal_sections', ['terms', 'privacy', 'cookies', 'imprint']);
    
        if (!in_array($section, $validSections)) {
            abort(404);
        }
    
        return view('pages.legal', compact('section', 'validSections'));
    }

    public function error(string $code)
    {
        return view('pages.error', compact('code'));
    }

    public function setLocale(string $locale)
    {
        if (in_array($locale, array_keys(config('app.locales')))) {
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function sitemap()
    {
        $pages = [
            ['route' => 'pages.lander', 'title' => 'Home'],
            ['route' => 'login', 'title' => 'Login'],
            ['route' => 'register', 'title' => 'Register'],
        ];

        $legalSections = config('app.legal_sections', ['terms', 'privacy', 'cookies', 'imprint']);

        return view('pages.sitemap', compact('pages', 'legalSections'));
    }

    public function sitemapXml()
    {
        $pages = [
            ['route' => 'pages.lander'],
            ['route' => 'login'],
            ['route' => 'register'],
        ];

        $legalSections = config('app.legal_sections', ['terms', 'privacy', 'cookies', 'imprint']);

        return response()->view('pages.sitemap_xml', compact('pages', 'legalSections'))
            ->header('Content-Type', 'application/xml');
    }
}
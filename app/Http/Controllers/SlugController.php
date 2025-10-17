<?php

namespace App\Http\Controllers;

use App\Models\Alias;
use App\Models\Deeplink;
use App\Models\DeeplinkClick;
use App\Models\Link;
use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function resolveProfileAlias(Alias $alias)
    {
        return view('profile.show', ['profile' => $alias->profile]);
    }

    public function resolveDeeplink(Deeplink $deeplink)
    {
        DeeplinkClick::create([
            'deeplink_id' => $deeplink->id,
            'clicked_at' => now(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        
        return redirect()->away($deeplink->target_url);
    }

    public function resolveGenericSlug(string $slug)
    {
        $link = Link::where('slug', $slug)->first();
        if ($link) {
            return redirect()->away($link->url);
        }

        $deeplink = Deeplink::where('short_code', $slug)->first();
        if ($deeplink) {
            return redirect()->away($deeplink->target_url);
        }

        abort(404);
    }
}
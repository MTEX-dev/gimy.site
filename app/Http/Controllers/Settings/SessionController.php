<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function index(Request $request)
    {
        $sessions = DB::table('sessions')
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($session) use ($request) {
                $agent = new \Jenssegers\Agent\Agent();
                $agent->setUserAgent($session->user_agent);

                return (object) [
                    'id' => $session->id,
                    'agent' => $agent,
                    'ip_address' => $session->ip_address,
                    'is_current_device' => $session->id === $request->session()->getId(),
                    'last_active' => \Carbon\Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
                ];
            });


        return view('settings.sessions.index', [
            'sessions' => $sessions,
        ]);
    }

    public function destroy(Request $request, $id)
    {
        DB::table('sessions')->where('id', $id)->where('user_id', Auth::id())->delete();

        return redirect()->route('settings.sessions.index')
            ->with('status', 'Session invalidated successfully.');
    }

    public function destroyAllOthers(Request $request)
    {
        DB::table('sessions')
            ->where('user_id', Auth::id())
            ->where('id', '!=', $request->session()->getId())
            ->delete();

        return redirect()->route('settings.sessions.index')
            ->with('status', 'All other sessions invalidated successfully.');
    }
}
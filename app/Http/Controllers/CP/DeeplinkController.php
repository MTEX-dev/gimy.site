<?php

namespace App\Http\Controllers\CP;

use App\Http\Controllers\Controller;
use App\Models\Deeplink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DeeplinkController extends Controller
{
    public function index()
    {
        $deeplinks = auth()->user()->deeplinks;
        $deeplinks->loadCount('clicks');

        return view('cp.deeplinks.index', compact('deeplinks'));
    }

    public function create()
    {
        return view('cp.deeplinks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'target_url' => ['required', 'url'],
            'short_code' => [
                'nullable',
                'string',
                'max:255',
                'unique:deeplinks,short_code',
            ],
        ]);

        if (empty($validated['short_code'])) {
            $validated['short_code'] = Str::random(6);
            while (Deeplink::where('short_code', $validated['short_code'])->exists()) {
                $validated['short_code'] = Str::random(6);
            }
        }

        auth()->user()->deeplinks()->create($validated);

        return redirect()
            ->route('cp.deeplinks.index')
            ->with('success', __('cp.deeplinks.success.created'));
    }

    public function show(Deeplink $deeplink)
    {
        return view('cp.deeplinks.stats', compact('deeplink'));
    }

    public function edit(Deeplink $deeplink)
    {
        return view('cp.deeplinks.edit', compact('deeplink'));
    }

    public function update(Request $request, Deeplink $deeplink)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'target_url' => ['required', 'url'],
            'short_code' => [
                'required',
                'string',
                'max:255',
                'unique:deeplinks,short_code,' . $deeplink->id,
            ],
        ]);
        $deeplink->update($validated);

        return redirect()
            ->route('cp.deeplinks.index')
            ->with('success', __('cp.deeplinks.success.updated'));
    }

    public function destroy(Deeplink $deeplink)
    {
        $deeplink->delete();

        return redirect()
            ->route('cp.deeplinks.index')
            ->with('success', __('cp.deeplinks.success.deleted'));
    }
}
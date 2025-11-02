<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SitePreviewController extends Controller
{
    public function show(Site $site, $path)
    {
        $fullPath = $site->storage_path . '/' . $path;

        if (!Storage::disk('public')->exists($fullPath)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return Storage::disk('public')->response($fullPath);
    }
}
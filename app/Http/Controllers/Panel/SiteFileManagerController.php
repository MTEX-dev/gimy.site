<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Organisation;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Response;

class SiteFileManagerController extends Controller
{
    use AuthorizesRequests;

    public function uploadFile(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        $request->validateWithBag('uploadFile', [
            'file' => ['required', 'file', 'max:10240'],
        ]);

        $file = $request->file('file');
        $path = $request->query('path', '/');

        $decodedPath = urldecode($path);

        if (Str::contains($decodedPath, '..')) {
            return back()->with('error', __('panel.sites.files.invalid_path'));
        }

        $safeFilename = basename($file->getClientOriginalName());
        $storagePath = rtrim($site->storage_path . '/' . trim($decodedPath, '/'), '/');

        if (Storage::exists($storagePath . '/' . $safeFilename)) {
            return back()->with('error', __('panel.sites.files.file_exists'));
        }

        $file->storeAs($storagePath, $safeFilename);

        return back()->with('success', __('panel.sites.files.upload_success'));
    }

    public function createFolder(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        $request->validateWithBag('createFolder', [
            'folder_name' => ['required', 'string', 'max:255'],
        ]);

        $path = $request->query('path', '/');
        $folderName = $request->input('folder_name');

        Storage::makeDirectory($site->storage_path . $path . $folderName);

        return redirect()
            ->route('panel.sites.files', [$organisation, $site, 'path' => $path])
            ->with('success', __('panel.sites.files.create_folder_success'));
    }

    public function delete(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        $validated = $request->validate([
            'items' => 'required|array',
        ]);

        foreach ($validated['items'] as $item) {
            $path = $site->storage_path . $item['path'];
            if ($item['type'] === 'file') {
                Storage::delete($path);
            } else {
                Storage::deleteDirectory($path);
            }
        }

        return back()->with('success', __('panel.sites.files.delete_success'));
    }

    public function rename(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        // Validation for renaming a file/folder
        // Logic to rename the file/folder using Storage::move
        // Redirect back with success or error message

        return back()->with('success', 'Rename functionality will be implemented here.');
    }

    public function move(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        // Validation for moving files/folders
        // Logic to move files/folders using Storage::move
        // Redirect back with success or error message

        return back()->with('success', 'Move functionality will be implemented here.');
    }

    public function editFile(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        $file = $request->query('file');
        $path = $site->storage_path . $file;

        if (!Storage::exists($path)) {
            abort(Response::HTTP_NOT_FOUND, __('pages.errors.404.message'));
        }

        $content = Storage::get($path);

        return view('panel.sites.edit-file', compact('organisation', 'site', 'file', 'content'));
    }

    public function updateFile(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        $file = $request->query('file');
        $path = $site->storage_path . '/' . $file;

        if (!Storage::exists($path)) {
            abort(Response::HTTP_NOT_FOUND, __('pages.errors.404.message'));
        }

        Storage::put($path, $request->input('content'));

        return redirect()
            ->route('panel.sites.files', [$organisation, $site, 'path' => dirname($file)])
            ->with('success', __('panel.sites.files.update_success'));
    }
}
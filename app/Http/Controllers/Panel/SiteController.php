<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Organisation;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller
{
    use AuthorizesRequests;

    public function create(Organisation $organisation)
    {
        $this->authorize('addSite', $organisation);

        return view('panel.sites.create', compact('organisation'));
    }

    public function store(StoreSiteRequest $request, Organisation $organisation)
    {
        $this->authorize('addSite', $organisation);

        $validatedData = $request->validated();

        $baseSlug = Str::slug($validatedData['name']);
        $slug = $baseSlug;

        $counter = 1;
        while (Site::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . Str::random(5);
        }

        $site = new Site([
            'name' => $validatedData['name'],
            'slug' => $slug,
            'custom_domain' => $validatedData['custom_domain'] ?? null,
            'user_id' => Auth::id(),
            'organisation_id' => $organisation->id,
            'status' => 'pending',
            'storage_path' => 'sites/' . $slug,
        ]);

        $site->save();

        return redirect()
            ->route('panel.overview', $organisation)
            ->with('success', __('panel.sites.create_success'));
    }

    public function overview(Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        return view('panel.sites.overview', compact('organisation', 'site'));
    }

    public function files(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        $path = $request->query('path', '/');
        $fullPath = $site->storage_path . $path;

        $files = Storage::files($fullPath);
        $directories = Storage::directories($fullPath);

        return view('panel.sites.files', compact('organisation', 'site', 'files', 'directories', 'path'));
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
            ->route('panel.sites.files', [$organisation, $site])
            ->with('success', __('panel.sites.files.update_success'));
    }

    public function uploadFile(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        $request->validateWithBag('uploadFile', [
            'file' => ['required', 'file', 'max:10240'],
        ]);

        $file = $request->file('file');
        $path = $request->query('path', '/');

        // Decode and sanitize the path to prevent directory traversal attacks.
        $decodedPath = urldecode($path);

        if (Str::contains($decodedPath, '..')) {
            return redirect()
                ->route('panel.sites.files', [$organisation, $site, 'path' => $path])
                ->with('error', __('panel.sites.files.invalid_path'));
        }

        // Sanitize the filename to prevent security issues.
        $safeFilename = basename($file->getClientOriginalName());

        // Build the final storage path.
        $storagePath = rtrim($site->storage_path . '/' . trim($decodedPath, '/'), '/');

        // Check if a file with the same name already exists.
        if (Storage::exists($storagePath . '/' . $safeFilename)) {
            return redirect()
                ->route('panel.sites.files', [$organisation, $site, 'path' => $path])
                ->with('error', __('panel.sites.files.file_exists'));
        }

        $file->storeAs($storagePath, $safeFilename);

        return redirect()
            ->route('panel.sites.files', [$organisation, $site, 'path' => $path])
            ->with('success', __('panel.sites.files.upload_success'));
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

    public function deleteFileOrFolder(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        $validated = $request->validate([
            'path' => 'required|string',
            'type' => 'required|string|in:file,dir',
        ]);

        $path = $site->storage_path . $validated['path'];

        if ($validated['type'] === 'file') {
            Storage::delete($path);
        } else {
            Storage::deleteDirectory($path);
        }

        return redirect()
            ->route('panel.sites.files', [$organisation, $site, 'path' => dirname($validated['path'])])
            ->with('success', __('panel.sites.files.delete_success'));
    }

    public function backups(Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        $backups = $site->backups()->latest()->get();

        return view('panel.sites.backups', compact('organisation', 'site', 'backups'));
    }

    public function visits(Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        return view('panel.sites.visits', compact('organisation', 'site'));
    }

    public function settings(Organisation $organisation, Site $site)
    {
        $this->authorize('viewSite', $organisation);

        return view('panel.sites.settings', compact('organisation', 'site'));
    }

    public function update(UpdateSiteRequest $request, Organisation $organisation, Site $site)
    {
        $this->authorize('updateSite', $organisation);

        $validated = $request->validated();
        $site->update([
            'name' => $validated['name'],
            'custom_domain' => $validated['custom_domain'] ?? null,
        ]);

        return redirect()
            ->route('panel.sites.settings', [$organisation, $site])
            ->with('success', __('panel.sites.settings.update_success'));
    }

    public function destroy(Request $request, Organisation $organisation, Site $site)
    {
        $this->authorize('deleteSite', $organisation);

        $validated = $request->validate([
            'slug_confirmation' => 'required|string',
            'password' => ['required', 'current_password'],
        ]);

        if ($validated['slug_confirmation'] !== $site->slug) {
            return back()->withErrors([
                'slug_confirmation' => __('panel.sites.settings.slug_mismatch'),
            ]);
        }

        $site->delete();

        return redirect()
            ->route('panel.organisations.sites', $organisation)
            ->with('success', __('panel.sites.settings.delete_success'));
    }
}
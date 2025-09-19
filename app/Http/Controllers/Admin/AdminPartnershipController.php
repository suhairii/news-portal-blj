<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminPartnershipController extends Controller
{
    /**
     * Display a listing of the partnerships.
     */
    public function index(Request $request)
    {
        try {
            $query = Partnership::query();

            // Search functionality
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('website', 'like', "%{$search}%");
                });
            }

            // Status filter (active/deleted)
            if ($request->filled('status')) {
                if ($request->status === 'deleted') {
                    $query->onlyTrashed();
                } else {
                    $query->whereNull('deleted_at');
                }
            }

            // Order by latest
            $partnerships = $query->orderBy('created_at', 'desc')
                ->paginate(12)
                ->withQueryString();

            return view('admin.partnerships.index', compact('partnerships'));

        } catch (\Exception $e) {
            Log::error('Partnership index error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data partnership');
        }
    }

    /**
     * Show the form for creating a new partnership.
     */
    public function create()
    {
        return view('admin.partnerships.create');
    }

    /**
     * Store a newly created partnership in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'nullable|string',
                'website' => 'nullable|url|max:255',
            ], [
                'name.required' => 'Nama partnership wajib diisi',
                'name.max' => 'Nama partnership maksimal 255 karakter',
                'logo.required' => 'Logo partnership wajib diupload',
                'logo.image' => 'File harus berupa gambar',
                'logo.mimes' => 'Logo harus berformat jpeg, png, jpg, gif, atau svg',
                'logo.max' => 'Ukuran logo maksimal 2MB',
                'website.url' => 'Website harus berupa URL yang valid',
                'website.max' => 'URL website maksimal 255 karakter',
            ]);

            // Ensure partnerships directory exists
            $this->ensurePartnershipsDirectoryExists();

            // Handle logo upload
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = 'partnership-' . Str::random(10) . '.' . $logo->getClientOriginalExtension();

                // Store in public/storage/partnerships directly
                $destinationPath = public_path('storage/partnerships');
                $logo->move($destinationPath, $logoName);

                $validated['logo'] = 'partnerships/' . $logoName;
            }

            $partnership = Partnership::create($validated);

            Log::info('Partnership created successfully', ['partnership_id' => $partnership->id]);

            return redirect()->route('admin.partnerships.index')
                ->with('success', 'Partnership berhasil ditambahkan!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            Log::error('Partnership creation error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat membuat partnership: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified partnership.
     */
    public function show(Partnership $partnership)
    {
        return view('admin.partnerships.show', compact('partnership'));
    }

    /**
     * Show the form for editing the specified partnership.
     */
    public function edit(Partnership $partnership)
    {
        return view('admin.partnerships.edit', compact('partnership'));
    }

    /**
     * Update the specified partnership in storage.
     */
    public function update(Request $request, Partnership $partnership)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'nullable|string',
                'website' => 'nullable|url|max:255',
            ], [
                'name.required' => 'Nama partnership wajib diisi',
                'name.max' => 'Nama partnership maksimal 255 karakter',
                'logo.image' => 'File harus berupa gambar',
                'logo.mimes' => 'Logo harus berformat jpeg, png, jpg, gif, atau svg',
                'logo.max' => 'Ukuran logo maksimal 2MB',
                'website.url' => 'Website harus berupa URL yang valid',
                'website.max' => 'URL website maksimal 255 karakter',
            ]);

            // Handle logo upload if new logo is provided
            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($partnership->logo) {
                    $oldLogoPath = public_path('storage/' . $partnership->logo);
                    if (file_exists($oldLogoPath)) {
                        unlink($oldLogoPath);
                    }
                }

                // Ensure partnerships directory exists
                $this->ensurePartnershipsDirectoryExists();

                $logo = $request->file('logo');
                $logoName = 'partnership-' . Str::random(10) . '.' . $logo->getClientOriginalExtension();

                // Store in public/storage/partnerships directly
                $destinationPath = public_path('storage/partnerships');
                $logo->move($destinationPath, $logoName);

                $validated['logo'] = 'partnerships/' . $logoName;
            }

            $partnership->update($validated);

            Log::info('Partnership updated successfully', ['partnership_id' => $partnership->id]);

            return redirect()->route('admin.partnerships.index')
                ->with('success', 'Partnership berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            Log::error('Partnership update error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui partnership: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified partnership from storage (soft delete).
     */
    public function destroy(Partnership $partnership)
    {
        try {
            $partnership->delete();

            Log::info('Partnership soft deleted', ['partnership_id' => $partnership->id]);

            return redirect()->route('admin.partnerships.index')
                ->with('success', 'Partnership berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Partnership deletion error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus partnership');
        }
    }

    /**
     * Restore soft deleted partnership.
     */
    public function restore($id)
    {
        try {
            $partnership = Partnership::onlyTrashed()->findOrFail($id);
            $partnership->restore();

            Log::info('Partnership restored', ['partnership_id' => $partnership->id]);

            return redirect()->route('admin.partnerships.index')
                ->with('success', 'Partnership berhasil dipulihkan!');

        } catch (\Exception $e) {
            Log::error('Partnership restore error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memulihkan partnership');
        }
    }

    /**
     * Permanently delete partnership and its logo.
     */
    public function forceDelete($id)
    {
        try {
            $partnership = Partnership::onlyTrashed()->findOrFail($id);

            // Delete logo file if exists
            if ($partnership->logo) {
                $logoPath = public_path('storage/' . $partnership->logo);
                if (file_exists($logoPath)) {
                    unlink($logoPath);
                }
            }

            $partnership->forceDelete();

            Log::info('Partnership permanently deleted', ['partnership_id' => $id]);

            return redirect()->route('admin.partnerships.index')
                ->with('success', 'Partnership berhasil dihapus secara permanen!');

        } catch (\Exception $e) {
            Log::error('Partnership force delete error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus partnership secara permanen');
        }
    }

    /**
     * Handle bulk actions for partnerships.
     */
    public function bulkAction(Request $request)
    {
        try {
            $validated = $request->validate([
                'action' => 'required|in:delete,restore,force_delete',
                'partnerships' => 'required|array|min:1',
                'partnerships.*' => 'integer|exists:partner_ships,id',
            ]);

            $action = $validated['action'];
            $partnershipIds = $validated['partnerships'];
            $count = count($partnershipIds);

            switch ($action) {
                case 'delete':
                    Partnership::whereIn('id', $partnershipIds)->delete();
                    $message = "{$count} partnership berhasil dihapus!";
                    break;

                case 'restore':
                    Partnership::onlyTrashed()->whereIn('id', $partnershipIds)->restore();
                    $message = "{$count} partnership berhasil dipulihkan!";
                    break;

                case 'force_delete':
                    $partnerships = Partnership::onlyTrashed()->whereIn('id', $partnershipIds)->get();

                    // Delete logo files
                    foreach ($partnerships as $partnership) {
                        if ($partnership->logo) {
                            $logoPath = public_path('storage/' . $partnership->logo);
                            if (file_exists($logoPath)) {
                                unlink($logoPath);
                            }
                        }
                    }

                    Partnership::onlyTrashed()->whereIn('id', $partnershipIds)->forceDelete();
                    $message = "{$count} partnership berhasil dihapus secara permanen!";
                    break;
            }

            Log::info("Partnership bulk {$action}", ['count' => $count, 'ids' => $partnershipIds]);

            return redirect()->route('admin.partnerships.index')->with('success', $message);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator);

        } catch (\Exception $e) {
            Log::error('Partnership bulk action error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat melakukan aksi bulk');
        }
    }

    /**
     * Ensure partnerships directory exists in public/storage
     */
    private function ensurePartnershipsDirectoryExists()
    {
        $partnershipsPath = public_path('storage/partnerships');
        if (!file_exists($partnershipsPath)) {
            mkdir($partnershipsPath, 0755, true);
        }
    }

    /**
     * Upload partnership image (for additional image needs)
     */
    public function uploadImage(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $this->ensurePartnershipsDirectoryExists();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'partnership-img-' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('storage/partnerships');
                $image->move($destinationPath, $imageName);

                return response()->json([
                    'success' => true,
                    'image_url' => asset('storage/partnerships/' . $imageName),
                    'image_path' => 'partnerships/' . $imageName
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No image uploaded'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Partnership image upload error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
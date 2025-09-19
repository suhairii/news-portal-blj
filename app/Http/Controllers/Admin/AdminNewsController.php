<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminNewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::withTrashed();

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        // Status filter
        if ($request->has('status')) {
            if ($request->status === 'published') {
                $query->whereNull('deleted_at');
            } elseif ($request->status === 'deleted') {
                $query->whereNotNull('deleted_at');
            }
        }

        // Order by latest
        $query->orderBy('created_at', 'desc');

        $news = $query->paginate(10);
        $categories = News::distinct()->pluck('category')->filter();

        return view('admin.news.index', compact('news', 'categories'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        // Debug logging
        \Log::info('=== FORM SUBMISSION DEBUG ===');
        \Log::info('Request method: ' . $request->method());
        \Log::info('Content type: ' . $request->header('Content-Type'));
        \Log::info('Has thumbnail file: ' . ($request->hasFile('thumbnail') ? 'YES' : 'NO'));

        // Log individual fields
        \Log::info('Title: ' . ($request->input('title') ?? 'NULL'));
        \Log::info('Content length: ' . strlen($request->input('content', '')));
        \Log::info('Category: ' . ($request->input('category') ?? 'NULL'));
        \Log::info('Published At: ' . ($request->input('published_at') ?? 'NULL'));

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category' => 'required|string|max:255',
            'published_at' => 'required|date',
        ], [
            'title.required' => 'Judul berita harus diisi.',
            'content.required' => 'Konten berita harus diisi.',
            'content.min' => 'Konten berita minimal 10 karakter.',
            'thumbnail.required' => 'Gambar utama harus dipilih.',
            'thumbnail.image' => 'File harus berupa gambar.',
            'thumbnail.mimes' => 'Format gambar harus: jpeg, png, jpg, gif, atau webp.',
            'thumbnail.max' => 'Ukuran gambar maksimal 2MB.',
            'category.required' => 'Kategori harus dipilih.',
            'published_at.required' => 'Tanggal publikasi harus dipilih.',
            'published_at.date' => 'Format tanggal tidak valid.',
        ]);

        try {
            // Generate slug
            $validated['slug'] = $this->generateUniqueSlug($validated['title']);

            // Handle thumbnail upload - langsung ke public
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $this->handleFileUploadDirect($request->file('thumbnail'), 'news/thumbnails');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $news = News::create($validated);

            \Log::info('News created successfully with ID: ' . $news->id);

            return redirect()->route('admin.news.index')
                ->with('success', 'Berita berhasil ditambahkan!');

        } catch (\Exception $e) {
            \Log::error('Error creating news: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category' => 'required|string|max:255',
            'published_at' => 'required|date',
        ], [
            'title.required' => 'Judul berita harus diisi.',
            'content.required' => 'Konten berita harus diisi.',
            'content.min' => 'Konten berita minimal 10 karakter.',
            'thumbnail.image' => 'File harus berupa gambar.',
            'thumbnail.mimes' => 'Format gambar harus: jpeg, png, jpg, gif, atau webp.',
            'thumbnail.max' => 'Ukuran gambar maksimal 2MB.',
            'category.required' => 'Kategori harus dipilih.',
            'published_at.required' => 'Tanggal publikasi harus dipilih.',
            'published_at.date' => 'Format tanggal tidak valid.',
        ]);

        try {
            // Generate new slug if title changed
            if ($news->title !== $validated['title']) {
                $validated['slug'] = $this->generateUniqueSlug($validated['title'], $news->id);
            }

            // Handle thumbnail upload
            if ($request->hasFile('thumbnail')) {
                // Delete old thumbnail
                if ($news->thumbnail) {
                    $this->deleteFileDirect($news->thumbnail);
                }

                $thumbnailPath = $this->handleFileUploadDirect($request->file('thumbnail'), 'news/thumbnails');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $news->update($validated);

            return redirect()->route('admin.news.index')
                ->with('success', 'Berita berhasil diperbarui!');

        } catch (\Exception $e) {
            \Log::error('Error updating news: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(News $news)
    {
        try {
            $news->delete(); // Soft delete
            return redirect()->route('admin.news.index')
                ->with('success', 'Berita berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.news.index')
                ->with('error', 'Gagal menghapus berita: ' . $e->getMessage());
        }
    }

    public function restore($id)
    {
        try {
            $news = News::withTrashed()->findOrFail($id);
            $news->restore();

            return redirect()->route('admin.news.index')
                ->with('success', 'Berita berhasil dipulihkan!');
        } catch (\Exception $e) {
            return redirect()->route('admin.news.index')
                ->with('error', 'Gagal memulihkan berita: ' . $e->getMessage());
        }
    }

    public function forceDelete($id)
    {
        try {
            $news = News::withTrashed()->findOrFail($id);

            // Delete thumbnail file - gunakan metode direct
            if ($news->thumbnail) {
                $this->deleteFileDirect($news->thumbnail);
            }

            $news->forceDelete();

            return redirect()->route('admin.news.index')
                ->with('success', 'Berita berhasil dihapus permanen!');
        } catch (\Exception $e) {
            return redirect()->route('admin.news.index')
                ->with('error', 'Gagal menghapus berita permanen: ' . $e->getMessage());
        }
    }

    public function uploadContentImage(Request $request)
    {
        try {
            $request->validate([
                'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120' // 5MB for content images
            ]);

            if (!$request->hasFile('upload')) {
                return response()->json([
                    'uploaded' => false,
                    'error' => [
                        'message' => 'No file uploaded'
                    ]
                ]);
            }

            $file = $request->file('upload');
            $filePath = $this->handleFileUploadDirect($file, 'news/content-images');

            // Get the full URL - langsung dari public path
            $url = asset('storage/' . $filePath);

            \Log::info('Content image uploaded successfully to: ' . $url);

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'uploaded' => false,
                'error' => [
                    'message' => $e->getMessage()
                ]
            ]);
        } catch (\Exception $e) {
            \Log::error('Content image upload error: ' . $e->getMessage());

            return response()->json([
                'uploaded' => false,
                'error' => [
                    'message' => 'Upload failed: ' . $e->getMessage()
                ]
            ]);
        }
    }

    public function deleteContentImage(Request $request)
    {
        try {
            $imagePath = $request->input('path');

            if ($imagePath && $this->deleteFileDirect($imagePath)) {
                return response()->json(['success' => true]);
            }

            return response()->json(['success' => false, 'message' => 'File not found']);
        } catch (\Exception $e) {
            \Log::error('Content image delete error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    // NEW METHOD: Upload langsung ke public/storage
    private function handleFileUploadDirect($file, $directory)
    {
        try {
            // Create unique filename
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            // Create directory path if not exists
            $publicStoragePath = public_path('storage/' . $directory);
            if (!file_exists($publicStoragePath)) {
                mkdir($publicStoragePath, 0755, true);
            }

            // Full file path
            $filePath = $publicStoragePath . '/' . $filename;

            // Move file directly to public/storage
            if ($file->move($publicStoragePath, $filename)) {
                // Set file permissions (skip di Windows)
                if (PHP_OS_FAMILY !== 'Windows') {
                    chmod($filePath, 0644);
                }

                $relativePath = $directory . '/' . $filename;
                \Log::info('File uploaded successfully to public/storage: ' . $relativePath);

                return $relativePath; // Return relative path from storage
            } else {
                throw new \Exception('Failed to move file to public directory');
            }

        } catch (\Exception $e) {
            \Log::error('File upload error: ' . $e->getMessage());
            throw $e;
        }
    }

    // NEW METHOD: Delete langsung dari public/storage
    private function deleteFileDirect($filePath)
    {
        try {
            $fullPath = public_path('storage/' . $filePath);

            if (file_exists($fullPath)) {
                unlink($fullPath);
                \Log::info('File deleted successfully from public/storage: ' . $filePath);
                return true;
            }

            \Log::warning('File not found for deletion: ' . $fullPath);
            return false;

        } catch (\Exception $e) {
            \Log::error('File delete error: ' . $e->getMessage());
            return false;
        }
    }

    // Keep existing method for backward compatibility (if needed)
    private function handleFileUpload($file, $directory)
    {
        // Redirect to new direct method
        return $this->handleFileUploadDirect($file, $directory);
    }

    // Keep existing method for backward compatibility (if needed)
    private function deleteFile($filePath)
    {
        // Try direct delete first
        if ($this->deleteFileDirect($filePath)) {
            return true;
        }

        // Fallback to storage method
        try {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
                \Log::info('File deleted successfully via Storage: ' . $filePath);
                return true;
            }
            return false;
        } catch (\Exception $e) {
            \Log::error('Storage file delete error: ' . $e->getMessage());
            return false;
        }
    }

    private function generateUniqueSlug($title, $excludeId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (true) {
            $query = News::where('slug', $slug);

            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }

            if (!$query->exists()) {
                break;
            }

            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required',
            'author' => 'required',
            'status' => 'required|in:draft,published',
            'featured' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            // Ubah path dari 'news' ke 'image'
            $validated['image'] = $request->file('image')->store('image', 'public');
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required',
            'author' => 'required',
            'status' => 'required|in:draft,published',
            'featured' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            // Ubah path dari 'news' ke 'image'
            $validated['image'] = $request->file('image')->store('image', 'public');
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
    }

    /**
     * Upload gambar untuk content CKEditor
     * Akan disimpan di public/storage/imagesNews/
     */
    public function uploadContentImage(Request $request)
    {
        try {
            $request->validate([
                'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // Max 5MB
            ]);

            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                
                // Generate unique filename dengan timestamp
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                
                // Simpan ke storage/app/public/imagesNews
                $path = $file->storeAs('imagesNews', $filename, 'public');
                
                // URL yang bisa diakses dari public
                $url = asset('storage/' . $path);
                
                return response()->json([
                    'success' => true,
                    'url' => $url,
                    'path' => $path,
                    'filename' => $filename,
                    'message' => 'Gambar berhasil diupload'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Tidak ada file yang diupload'
            ], 400);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'File tidak valid: ' . implode(', ', $e->validator->errors()->all())
            ], 422);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Upload Content Image Error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengupload gambar'
            ], 500);
        }
    }

    /**
     * Hapus gambar content (optional - jika ingin fitur hapus gambar)
     */
    public function deleteContentImage(Request $request)
    {
        try {
            $request->validate([
                'path' => 'required|string'
            ]);

            $path = $request->input('path');
            
            // Pastikan path dimulai dengan imagesNews/
            if (strpos($path, 'imagesNews/') === 0) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                    
                    return response()->json([
                        'success' => true,
                        'message' => 'Gambar berhasil dihapus'
                    ]);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Gambar tidak ditemukan'
            ], 404);

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Delete Content Image Error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus gambar'
            ], 500);
        }
    }
}
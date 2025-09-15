<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        // Get featured news (3 latest published news)
        $featuredNews = News::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        // Get latest news (6 latest published news)
        $latestNews = News::published()
            ->latest('published_at')
            ->take(6)
            ->get();

        // Get distinct categories from published news
        $categories = News::published()
            ->distinct()
            ->pluck('category')
            ->filter()
            ->sort();

        return view('news.index', compact('featuredNews', 'latestNews', 'categories'));
    }

    // Method for landing page
    public function landing()
    {
        // Get 3 latest published news for preview on landing page
        $featuredNews = News::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('landingpage', compact('featuredNews'));
    }

    public function divisi()
    {
        return view('divisi');
    }

    public function show(News $news)
    {
        // Check if news is published
        if (!$news->isPublished()) {
            abort(404);
        }

        // Get related news from same category
        $relatedNews = News::published()
            ->where('category', $news->category)
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('news.show', compact('news', 'relatedNews'));
    }

    public function category($category)
    {
        $news = News::published()
            ->where('category', $category)
            ->latest('published_at')
            ->paginate(9);

        // Check if category exists
        if ($news->isEmpty() && $news->currentPage() === 1) {
            abort(404);
        }

        return view('news.category', compact('news', 'category'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        if (empty($query)) {
            return redirect()->route('news.index');
        }

        $news = News::published()
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%")
                    ->orWhere('category', 'like', "%{$query}%");
            })
            ->latest('published_at')
            ->paginate(9);

        return view('news.search', compact('news', 'query'));
    }

    /**
     * Handle image upload for CKEditor
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->extension();

            // Store in public/storage/uploads
            $path = $image->storeAs('public/uploads', $imageName);

            return response()->json([
                'url' => asset('storage/uploads/' . $imageName)
            ]);
        }

        return response()->json(['error' => 'Upload failed'], 400);
    }

    /**
     * Handle thumbnail upload
     */
    public function uploadThumbnail(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = 'thumb_' . time() . '_' . Str::random(10) . '.' . $image->extension();

            // Store in public/storage/thumbnails
            $path = $image->storeAs('public/thumbnails', $imageName);

            return response()->json([
                'url' => asset('storage/thumbnails/' . $imageName),
                'path' => 'thumbnails/' . $imageName
            ]);
        }

        return response()->json(['error' => 'Upload failed'], 400);
    }

    /**
     * Get news by date range
     */
    public function getByDateRange(Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $news = News::published();

        if ($startDate) {
            $news->whereDate('published_at', '>=', $startDate);
        }

        if ($endDate) {
            $news->whereDate('published_at', '<=', $endDate);
        }

        return $news->latest('published_at')->paginate(9);
    }

    /**
     * Get popular news (if you add views tracking later)
     */
    public function popular()
    {
        // For now, just return latest news
        // Later you can add views column and sort by views
        $popularNews = News::published()
            ->latest('published_at')
            ->take(10)
            ->get();

        return view('news.popular', compact('popularNews'));
    }

    /**
     * Sanitize HTML content to allow safe HTML tags while preserving external images
     */
    public static function sanitizeContent($content)
    {
        // List of allowed HTML tags
        $allowedTags = [
            'p',
            'br',
            'strong',
            'b',
            'em',
            'i',
            'u',
            'a',
            'img',
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
            'ul',
            'ol',
            'li',
            'blockquote',
            'cite',
            'table',
            'thead',
            'tbody',
            'tr',
            'th',
            'td',
            'figure',
            'figcaption',
            'div',
            'span'
        ];

        // Use strip_tags to remove unwanted tags but keep allowed ones
        $content = strip_tags($content, '<' . implode('><', $allowedTags) . '>');

        return $content;
    }

    /**
     * Validate and process external image URLs
     */
    public static function validateExternalImages($content)
    {
        $pattern = '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i';

        return preg_replace_callback($pattern, function ($matches) {
            $fullTag = $matches[0];
            $src = $matches[1];

            // Check if it's an external URL
            if (
                filter_var($src, FILTER_VALIDATE_URL) &&
                (strpos($src, 'http://') === 0 || strpos($src, 'https://') === 0)
            ) {

                // Add loading="lazy" and error handling attributes
                if (strpos($fullTag, 'loading=') === false) {
                    $fullTag = str_replace('<img ', '<img loading="lazy" ', $fullTag);
                }

                // Add onerror handler for fallback
                if (strpos($fullTag, 'onerror=') === false) {
                    $fullTag = str_replace('<img ', '<img onerror="this.src=\'https://via.placeholder.com/400x300/f3f4f6/9ca3af?text=Image+Not+Found\';this.onerror=null;" ', $fullTag);
                }

                // Ensure responsive styling
                if (strpos($fullTag, 'style=') === false) {
                    $fullTag = str_replace('<img ', '<img style="max-width: 100%; height: auto; border-radius: 8px; margin: 10px 0;" ', $fullTag);
                }
            }

            return $fullTag;
        }, $content);
    }

    /**
     * Process content before saving (used in admin controller)
     */
    public static function processContent($content)
    {
        // Sanitize content
        $content = self::sanitizeContent($content);

        // Validate and enhance external images
        $content = self::validateExternalImages($content);

        return $content;
    }
}
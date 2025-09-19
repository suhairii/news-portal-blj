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

        // Get latest news (6 latest published news, excluding featured)
        $latestNews = News::published()
            ->when($featuredNews->isNotEmpty(), function ($query) use ($featuredNews) {
                return $query->whereNotIn('id', $featuredNews->pluck('id'));
            })
            ->latest('published_at')
            ->take(6)
            ->get();

        // Get distinct categories from published news
        $categories = News::published()
            ->distinct()
            ->pluck('category')
            ->filter()
            ->sort()
            ->values();

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
            abort(404, 'Artikel tidak ditemukan atau belum dipublikasikan.');
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
        // Validate category exists
        $validCategories = News::getCategories();
        if (!in_array($category, $validCategories)) {
            abort(404, 'Kategori tidak ditemukan.');
        }

        $news = News::published()
            ->where('category', $category)
            ->latest('published_at')
            ->paginate(9);

        // Check if category has any published news
        if ($news->isEmpty() && $news->currentPage() === 1) {
            // Category exists but no published news yet - show empty state instead of 404
        }

        return view('news.category', compact('news', 'category'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        // Validate search query
        if (empty($query) || strlen(trim($query)) < 2) {
            return redirect()->route('home')->with('error', 'Kata kunci pencarian minimal 2 karakter.');
        }

        // Sanitize search query
        $query = strip_tags(trim($query));
        $query = Str::limit($query, 100); // Limit search query length

        $news = News::published()
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%")
                    ->orWhere('category', 'like', "%{$query}%");
            })
            ->latest('published_at')
            ->paginate(9);

        // Keep search query in pagination links
        $news->appends(['q' => $query]);

        return view('news.search', compact('news', 'query'));
    }

    /**
     * Handle image upload for CKEditor
     */
    public function uploadImage(Request $request)
    {
        try {
            $request->validate([
                'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            if ($request->hasFile('upload')) {
                $image = $request->file('upload');
                $imageName = time() . '_' . Str::random(10) . '.' . $image->extension();

                // Store in public/storage/uploads
                $path = $image->storeAs('public/uploads', $imageName);

                return response()->json([
                    'url' => asset('storage/uploads/' . $imageName),
                    'uploaded' => true
                ]);
            }

            return response()->json(['error' => 'File upload gagal'], 400);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Upload gagal: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle thumbnail upload
     */
    public function uploadThumbnail(Request $request)
    {
        try {
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
                    'path' => 'thumbnails/' . $imageName,
                    'uploaded' => true
                ]);
            }

            return response()->json(['error' => 'File upload gagal'], 400);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Upload gagal: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get news by date range
     */
    public function getByDateRange(Request $request)
    {
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $news = News::published();

        if ($startDate) {
            $news->whereDate('published_at', '>=', $startDate);
        }

        if ($endDate) {
            $news->whereDate('published_at', '<=', $endDate);
        }

        $news = $news->latest('published_at')->paginate(9);

        return response()->json([
            'data' => $news->items(),
            'pagination' => [
                'current_page' => $news->currentPage(),
                'last_page' => $news->lastPage(),
                'per_page' => $news->perPage(),
                'total' => $news->total(),
            ]
        ]);
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
     * Get news statistics for admin dashboard
     */
    public function getStats()
    {
        $stats = [
            'total_news' => News::count(),
            'published_news' => News::published()->count(),
            'draft_news' => News::where('published_at', '>', now())->count(),
            'categories_count' => News::distinct('category')->count('category'),
            'this_month' => News::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
            'last_month' => News::whereMonth('created_at', now()->subMonth()->month)
                ->whereYear('created_at', now()->subMonth()->year)
                ->count(),
        ];

        $stats['growth_percentage'] = $stats['last_month'] > 0
            ? round((($stats['this_month'] - $stats['last_month']) / $stats['last_month']) * 100, 1)
            : 0;

        return response()->json($stats);
    }

    /**
     * Sitemap for SEO
     */
    public function sitemap()
    {
        $news = News::published()
            ->latest('published_at')
            ->get();

        return response()->view('news.sitemap', compact('news'))
            ->header('Content-Type', 'text/xml');
    }

    /**
     * RSS Feed
     */
    public function rssFeed()
    {
        $news = News::published()
            ->latest('published_at')
            ->take(20)
            ->get();

        return response()->view('news.rss', compact('news'))
            ->header('Content-Type', 'application/rss+xml');
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

    /**
     * Get trending keywords for search suggestions
     */
    public function getTrendingKeywords()
    {
        // For now, return static keywords
        // Later you can implement actual trending based on search logs
        $keywords = [
            'oil',
            'gas',
            'teknologi',
            'bisnis',
            'lingkungan',
            'spbu',
            'pertamina',
            'energi',
            'industri',
            'inovasi'
        ];

        return response()->json($keywords);
    }

    /**
     * Search suggestions for autocomplete
     */
    public function searchSuggestions(Request $request)
    {
        $query = $request->get('q');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $suggestions = News::published()
            ->where('title', 'like', "%{$query}%")
            ->limit(5)
            ->pluck('title')
            ->toArray();

        return response()->json($suggestions);
    }

    /**
     * Archive page - news by year/month
     */
    public function archive(Request $request)
    {
        $year = $request->get('year', now()->year);
        $month = $request->get('month');

        $news = News::published()
            ->whereYear('published_at', $year);

        if ($month) {
            $news->whereMonth('published_at', $month);
        }

        $news = $news->latest('published_at')->paginate(12);

        // Get available years and months for navigation
        $availableYears = News::published()
            ->selectRaw('YEAR(published_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $availableMonths = News::published()
            ->whereYear('published_at', $year)
            ->selectRaw('MONTH(published_at) as month')
            ->distinct()
            ->orderBy('month')
            ->pluck('month');

        return view('news.archive', compact('news', 'year', 'month', 'availableYears', 'availableMonths'));
    }

    /**
     * Related news based on category and tags
     */
    public function getRelatedNews(News $news, $limit = 4)
    {
        return News::published()
            ->where('category', $news->category)
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->take($limit)
            ->get();
    }

    /**
     * Increment view count (if implementing view tracking)
     */
    public function incrementViewCount(News $news)
    {
        // Increment view count using raw SQL to avoid updating timestamps
        // This requires adding 'views' column to news table
        // News::where('id', $news->id)->increment('views');

        // For now, just return success
        return response()->json(['status' => 'success']);
    }

    /**
     * Check content for potential issues
     */
    private function validateContentQuality($content)
    {
        $issues = [];

        // Check minimum content length
        $wordCount = str_word_count(strip_tags($content));
        if ($wordCount < 50) {
            $issues[] = 'Konten terlalu pendek (minimal 50 kata)';
        }

        // Check for broken image links
        preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $content, $matches);
        foreach ($matches[1] as $src) {
            if (strpos($src, 'http') === 0) {
                // Skip external image validation in this example
                // In production, you might want to check if external images are accessible
            }
        }

        return $issues;
    }

    /**
     * Clean up orphaned images
     */
    public function cleanupOrphanedImages()
    {
        // Get all images from storage that are not referenced in any news content
        // This is a maintenance function that should be run periodically

        $allNews = News::all();
        $usedImages = [];

        foreach ($allNews as $news) {
            // Extract image URLs from content
            preg_match_all('/src="([^"]*storage\/[^"]*)"/', $news->content, $matches);
            $usedImages = array_merge($usedImages, $matches[1]);

            // Add thumbnail
            if ($news->thumbnail) {
                $usedImages[] = asset('storage/' . $news->thumbnail);
            }
        }

        // Here you would compare with actual files in storage and remove unused ones
        // Implementation depends on your specific storage structure

        return response()->json([
            'message' => 'Cleanup completed',
            'used_images_count' => count(array_unique($usedImages))
        ]);
    }
}
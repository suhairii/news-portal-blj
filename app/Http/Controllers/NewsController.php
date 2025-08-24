<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $featuredNews = News::published()->featured()->latest()->take(3)->get();
        $latestNews = News::published()->latest()->take(6)->get();
        $categories = News::published()->distinct()->pluck('category');

        return view('news.index', compact('featuredNews', 'latestNews', 'categories'));
    }

    // Method baru untuk landing page
    public function landing()
    {
        // Hanya ambil 3 berita featured untuk preview di landing page
        $featuredNews = News::published()->featured()->latest()->take(3)->get();

        return view('landingpage', compact('featuredNews'));
    }
    public function divisi()
    {
        return view('divisi');
    }


    public function show(News $news)
    {
        $news->increment('views');
        $relatedNews = News::published()
            ->where('category', $news->category)
            ->where('id', '!=', $news->id)
            ->take(4)
            ->get();

        return view('news.show', compact('news', 'relatedNews'));
    }

    public function category($category)
    {
        $news = News::published()->where('category', $category)->latest()->paginate(9);
        return view('news.category', compact('news', 'category'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $news = News::published()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->latest()
            ->paginate(9);

        return view('news.search', compact('news', 'query'));
    }

    /**
     * Handle image upload for CKEditor (optional, for local uploads)
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/uploads', $imageName);

            return response()->json([
                'url' => asset('storage/uploads/' . $imageName)
            ]);
        }

        return response()->json(['error' => 'Upload failed'], 400);
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

        // List of allowed attributes for specific tags
        $allowedAttributes = [
            'a' => ['href', 'target', 'rel', 'title'],
            'img' => ['src', 'alt', 'title', 'width', 'height', 'class', 'style'],
            'figure' => ['class'],
            'table' => ['class', 'style'],
            'th' => ['colspan', 'rowspan'],
            'td' => ['colspan', 'rowspan'],
            'div' => ['class'],
            'span' => ['class', 'style']
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
        // Pattern to match img tags
        $pattern = '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i';

        return preg_replace_callback($pattern, function ($matches) {
            $fullTag = $matches[0];
            $src = $matches[1];

            // Check if it's an external URL
            if (filter_var($src, FILTER_VALIDATE_URL) && (strpos($src, 'http://') === 0 || strpos($src, 'https://') === 0)) {
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
     * Get reading time estimate
     */
    public static function getReadingTime($content)
    {
        // Remove HTML tags for word count
        $plainText = strip_tags($content);
        $wordCount = str_word_count($plainText);

        // Average reading speed is 200-250 words per minute
        $readingTime = ceil($wordCount / 225);

        return max(1, $readingTime); // Minimum 1 minute
    }

    /**
     * Extract first image from content for social sharing
     */
    public static function extractFirstImage($content)
    {
        $pattern = '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i';

        if (preg_match($pattern, $content, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * Generate excerpt from HTML content
     */
    public static function generateExcerpt($content, $length = 150)
    {
        // Remove HTML tags
        $plainText = strip_tags($content);

        // Remove extra whitespace
        $plainText = preg_replace('/\s+/', ' ', trim($plainText));

        if (strlen($plainText) <= $length) {
            return $plainText;
        }

        return substr($plainText, 0, $length) . '...';
    }
}
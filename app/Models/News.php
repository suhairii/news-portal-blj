<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'category',
        'published_at',
    ];

    protected $dates = [
        'published_at',
        'deleted_at',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    /**
     * Accessor for thumbnail URL - Konsisten dengan public storage
     */
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            // Langsung ke asset karena file ada di public/storage
            return asset('storage/' . $this->thumbnail);
        }
        return asset('assets/image/default-news.jpg'); // fallback image
    }

    /**
     * Accessor for excerpt
     */
    public function getExcerptAttribute($length = 150)
    {
        return Str::limit(strip_tags($this->content), $length);
    }

    /**
     * Accessor for processed content - KONTEN YANG SUDAH DIBERSIHKAN
     */
    public function getProcessedContentAttribute()
    {
        return $this->processContent($this->content);
    }

    /**
     * Process content untuk menampilkan teks bersih dan gambar
     */
    public function processContent($content)
    {
        // Hapus div wrapper yang tidak perlu
        $content = preg_replace('/<div[^>]*>/', '', $content);
        $content = str_replace('</div>', '', $content);
        
        // Proses gambar - buat styling yang lebih baik
        $content = preg_replace_callback('/<img[^>]+src="([^"]*)"[^>]*>/i', function($matches) {
            $src = $matches[1];
            
            // Jika gambar dari storage lokal, pastikan path benar
            if (strpos($src, '/storage/') !== false) {
                // Path sudah benar, biarkan saja
            } elseif (strpos($src, 'storage/') === 0) {
                // Tambahkan leading slash jika belum ada
                $src = '/' . $src;
            }
            
            return '<figure class="article-image-wrapper" style="margin: 2rem 0; text-align: center;">
                        <img src="' . $src . '" 
                             alt="Content Image" 
                             style="max-width: 100%; 
                                    height: auto; 
                                    border-radius: 12px; 
                                    box-shadow: 0 8px 30px rgba(0,0,0,0.1);
                                    display: block;
                                    margin: 0 auto;" 
                             loading="lazy" 
                             onerror="this.style.display=\'none\'">
                    </figure>';
        }, $content);
        
        // Bersihkan paragraf kosong
        $content = preg_replace('/<p[^>]*>\s*<\/p>/', '', $content);
        
        // Bersihkan whitespace berlebihan
        $content = preg_replace('/\s+/', ' ', $content);
        $content = trim($content);
        
        // Jika konten kosong atau hanya whitespace, berikan fallback
        if (empty(strip_tags($content))) {
            $content = '<p>Konten artikel sedang dimuat...</p>';
        }
        
        return $content;
    }

    /**
     * Scope for published news
     */
    public function scopePublished($query)
    {
        return $query->whereDate('published_at', '<=', now());
    }

    /**
     * Scope for specific category
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Get route key name for URL
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Format published date for Indonesian locale
     */
    public function getFormattedPublishedDateAttribute()
    {
        return $this->published_at->locale('id')->isoFormat('dddd, D MMMM Y');
    }

    /**
     * Get reading time estimate
     */
    public function getReadingTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = ceil($words / 200); // Average reading speed 200 words per minute
        return $minutes . ' menit baca';
    }

    /**
     * Check if news is published
     */
    public function isPublished()
    {
        return $this->published_at <= now();
    }

    /**
     * Get categories list
     */
    public static function getCategories()
    {
        return [
            'Berita Umum',
            'Oil & Gas',
            'Teknologi',
            'Bisnis',
            'Lingkungan',
            'Pengumuman',
            'Kegiatan',
            'Press Release'
        ];
    }

    /**
     * Boot method untuk auto generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title);

                // Pastikan slug unik
                $originalSlug = $news->slug;
                $count = 1;

                while (static::where('slug', $news->slug)->exists()) {
                    $news->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });

        static::updating(function ($news) {
            if ($news->isDirty('title')) {
                $newSlug = Str::slug($news->title);

                // Hanya update slug jika berbeda dan belum ada yang menggunakan
                if ($newSlug !== $news->getOriginal('slug')) {
                    $originalSlug = $newSlug;
                    $count = 1;

                    while (static::where('slug', $newSlug)->where('id', '!=', $news->id)->exists()) {
                        $newSlug = $originalSlug . '-' . $count;
                        $count++;
                    }

                    $news->slug = $newSlug;
                }
            }
        });
    }

    /**
     * Get thumbnail path untuk keperluan internal
     */
    public function getThumbnailPath()
    {
        if ($this->thumbnail) {
            return public_path('storage/' . $this->thumbnail);
        }
        return null;
    }

    /**
     * Check if thumbnail file exists
     */
    public function thumbnailExists()
    {
        $path = $this->getThumbnailPath();
        return $path && file_exists($path);
    }

    /**
     * Get content images URLs
     */
    public function getContentImages()
    {
        $images = [];
        preg_match_all('/src="([^"]*storage\/news\/content-images\/[^"]*)"/', $this->content, $matches);

        if (!empty($matches[1])) {
            $images = $matches[1];
        }

        return $images;
    }

    /**
     * Extract plain text from content for search
     */
    public function getPlainTextContentAttribute()
    {
        return strip_tags($this->content);
    }

    /**
     * Get first image from content
     */
    public function getFirstContentImageAttribute()
    {
        preg_match('/<img[^>]+src="([^"]*)"[^>]*>/i', $this->content, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }

    /**
     * Count words in content
     */
    public function getWordCountAttribute()
    {
        return str_word_count(strip_tags($this->content));
    }

    /**
     * Get estimated reading time in minutes
     */
    public function getEstimatedReadingTimeAttribute()
    {
        $words = $this->word_count;
        $wpm = 200; // Average words per minute
        $minutes = ceil($words / $wpm);
        
        if ($minutes < 1) {
            return '< 1 menit baca';
        } elseif ($minutes == 1) {
            return '1 menit baca';
        } else {
            return $minutes . ' menit baca';
        }
    }

    /**
     * Clean content for safe display (untuk security)
     */
    public function getSafeContentAttribute()
    {
        $allowedTags = '<p><br><strong><b><em><i><u><a><img><h1><h2><h3><h4><h5><h6><ul><ol><li><blockquote><table><thead><tbody><tr><th><td><figure><figcaption>';
        return strip_tags($this->content, $allowedTags);
    }
}
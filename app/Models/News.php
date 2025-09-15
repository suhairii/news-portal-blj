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
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    protected $dates = [
        'published_at',
        'deleted_at'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function isPublished()
    {
        return $this->published_at && $this->published_at <= now();
    }

    /**
     * Get formatted published date
     */
    public function getFormattedPublishedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('d M Y') : null;
    }

    /**
     * Get excerpt from content
     */
    public function getExcerptAttribute($length = 150)
    {
        $plainText = strip_tags($this->content);
        $plainText = preg_replace('/\s+/', ' ', trim($plainText));

        if (strlen($plainText) <= $length) {
            return $plainText;
        }

        return substr($plainText, 0, $length) . '...';
    }

    /**
     * Get reading time estimate
     */
    public function getReadingTimeAttribute()
    {
        $plainText = strip_tags($this->content);
        $wordCount = str_word_count($plainText);
        $readingTime = ceil($wordCount / 225);

        return max(1, $readingTime);
    }

    /**
     * Get thumbnail URL with fallback
     */
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            // If it's a full URL (external)
            if (filter_var($this->thumbnail, FILTER_VALIDATE_URL)) {
                return $this->thumbnail;
            }
            // If it's a local file
            return asset('storage/' . $this->thumbnail);
        }

        // Extract first image from content as fallback
        $pattern = '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i';
        if (preg_match($pattern, $this->content, $matches)) {
            return $matches[1];
        }

        // Default placeholder
        return 'https://via.placeholder.com/400x300/f3f4f6/9ca3af?text=No+Image';
    }
}
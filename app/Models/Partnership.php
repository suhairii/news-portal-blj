<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Partnership extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partner_ships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'logo',
        'description',
        'website',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the logo URL.
     *
     * @return string
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    /**
     * Get formatted created date.
     *
     * @return string
     */
    public function getFormattedCreatedDateAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    /**
     * Get formatted created date with time.
     *
     * @return string
     */
    public function getFormattedCreatedDateTimeAttribute()
    {
        return $this->created_at->format('d M Y - H:i');
    }

    /**
     * Get shortened description.
     *
     * @param int $limit
     * @return string
     */
    public function getExcerpt($limit = 150)
    {
        if (empty($this->description)) {
            return 'Tidak ada deskripsi';
        }

        if (strlen($this->description) <= $limit) {
            return $this->description;
        }

        return substr($this->description, 0, $limit) . '...';
    }

    /**
     * Get the website domain only.
     *
     * @return string|null
     */
    public function getWebsiteDomainAttribute()
    {
        if (empty($this->website)) {
            return null;
        }

        $parsed = parse_url($this->website);
        return $parsed['host'] ?? $this->website;
    }

    /**
     * Scope to get only active (non-deleted) partnerships.
     */
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    /**
     * Scope to search partnerships.
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
                ->orWhere('description', 'like', "%{$term}%")
                ->orWhere('website', 'like', "%{$term}%");
        });
    }
}
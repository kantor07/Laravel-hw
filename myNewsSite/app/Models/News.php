<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Models\Category;
use App\Models\Source;



class News extends Model
{
    use HasFactory;

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const BLOCKED = 'BLOCKED';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'author',
        'status',
        'source_id',
        'image',
        'description'
    ];

    public function scopeStatus(Builder $query): Builder
    {
        return $query->where('status', News::DRAFT)
            ->orWhere('status', News::ACTIVE);
    }

    //Relations

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }
    
}

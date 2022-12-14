<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Article;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    public static $selectedFields = [
        'id',
        'title',
        'description',
        'created_at'];

    protected $fillable = [
        'title',
        'description'
    ];


    //Relations

    public function news(): HasMany
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}

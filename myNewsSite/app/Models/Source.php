<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\News;


class Source extends Model
{
    use HasFactory;

    protected $table = "sources";

    public static $selectedFields = [
        'id',
        'title',
        'url',
        'created_at'];

    protected $fillable = [
        'title',
        'url'
    ];

    //Relations

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'source_id', 'id');
    }
}

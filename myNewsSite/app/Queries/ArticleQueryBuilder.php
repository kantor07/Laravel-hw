<?php
declare(strict_types=1);

namespace App\Queries;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class ArticleQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Article::query();
    }

    public function getArticles(): LengthAwarePaginator
    {
        return $this->model
            ->with('category')
            ->paginate(config('pagination.admin.news'));
    }

    public function create(array $data): Article|bool
    {
        return Article::create($data);
    }

    public function update(Article $article, array $data): bool
    {
        return $article->update($data);
    }
}

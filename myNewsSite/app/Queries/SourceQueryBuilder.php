<?php
declare(strict_types=1);

namespace App\Queries;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class SourceQueryBuilder
{
    private Builder $model;
    public function __construct()
    {
        $this->model = Source::query();
    }

    public function getSource(): Collection|LengthAwarePaginator
    {
        return $this->model
            ->paginate(config('pagination.admin.sources'));
    }

    public function create(array $data): Category|bool
    {
        return Source::create($data);
    }

    public function update(Source $source, array $data): bool
    {
        return $source->fill($data)->save();
    }
}
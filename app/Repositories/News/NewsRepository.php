<?php

namespace App\Repositories\News;

use App\Models\News;
use App\Repositories\EloquentRepository;
use App\Repositories\BaseRepository;
use App\Repositories\News\NewsRepositoryInterface;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    public function getModel()
    {
        return News::class;
    }

    public function getAllWithUser(int $paginateNumber, $orderBy = 'id', $order = 'desc')
    {
        return $this->model->with("user")->orderBy($orderBy, $order)->paginate($paginateNumber)->withQueryString();
    }

    public function createNews($attributes, $categoryIds, $keywordsIds)
    {
        $song = $this->create($attributes);
        $song->categories()->attach($categoryIds);
        $song->keywords()->attach($keywordsIds);

        return $song;
    }

    public function updateNews($id,$attributes, $categoryIds, $keywordsIds)
    {
        $song = $this->update($id, $attributes);
        $song->categories()->sync($categoryIds);
        $song->keywords()->sync($keywordsIds);

        return $song;
    }

    public function findNewsById($id)
    {
        return $this->find($id)->load("categories")->load("keywords");
    }

}
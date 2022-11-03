<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\EloquentRepository;
use App\Repositories\BaseRepository;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function getCategory()
    {
    	return $this->model->latest()->paginate(8);
    }

    public function getAlbumWithSong($id){ }

    //Delete all song of album by album id
    public function deleteSongOfAlbum($id){ }

    //Get all album and song belong to this album
    public function getAllAlbumWithSong(){}
}
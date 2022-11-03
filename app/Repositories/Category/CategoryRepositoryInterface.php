<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    //Get album and all of song belong to this album by album id
    public function getAlbumWithSong($id);

    //Delete all song of album by album id
    public function deleteSongOfAlbum($id);

    //Get all album and song belong to this album
    public function getAllAlbumWithSong();
}
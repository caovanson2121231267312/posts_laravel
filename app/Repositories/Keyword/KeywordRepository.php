<?php

namespace App\Repositories\Keyword;

use App\Models\Keyword;
use App\Repositories\EloquentRepository;
use App\Repositories\BaseRepository;
use App\Repositories\KeyWord\KeywordRepositoryInterface;

class KeywordRepository extends BaseRepository implements KeywordRepositoryInterface
{
    public function getModel()
    {
        return Keyword::class;
    }

}
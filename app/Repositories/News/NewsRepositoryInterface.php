<?php

namespace App\Repositories\News;

use App\Repositories\BaseRepositoryInterface;

interface NewsRepositoryInterface extends BaseRepositoryInterface
{
	public function findNewsById($id);
}
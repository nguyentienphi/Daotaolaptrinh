<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\BaseService;


class CategoryService extends BaseService
{
    public function getModel()
    {
        return Category::class;
    }

    public function getAll()
    {
        return $this->all();
    }
}

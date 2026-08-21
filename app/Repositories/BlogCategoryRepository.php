<?php

namespace App\Repositories;

use App\Models\BlogCategory;

class BlogCategoryRepository extends BaseRepository
{
    public function __construct(BlogCategory $model)
    {
        parent::__construct($model);
    }
}

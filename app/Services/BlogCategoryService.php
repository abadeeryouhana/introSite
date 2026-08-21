<?php

namespace App\Services;

use App\Repositories\BlogCategoryRepository;

class BlogCategoryService extends BaseService
{
    public function __construct(BlogCategoryRepository $repository)
    {
        parent::__construct($repository);
    }
}

<?php

namespace App\Repositories;

use App\Models\JobPosition;

class JobPositionRepository extends BaseRepository
{
    public function __construct(JobPosition $model)
    {
        parent::__construct($model);
    }

    public function getActive()
    {
        return $this->model->active()->orderBy('order', 'asc')->get();
    }
}

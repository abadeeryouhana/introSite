<?php

namespace App\Services;

use App\Repositories\JobPositionRepository;

class JobPositionService extends BaseService
{
    public function __construct(JobPositionRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getActive()
    {
        return $this->repository->getActive();
    }
}

<?php

namespace App\Services;

use App\Repositories\JobApplicationRepository;

class JobApplicationService extends BaseService
{
    public function __construct(JobApplicationRepository $repository)
    {
        parent::__construct($repository);
    }
}

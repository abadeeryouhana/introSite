<?php

namespace App\Repositories;

use App\Models\CaseStudy;

class CaseStudyRepository extends BaseRepository
{
    public function __construct(CaseStudy $model)
    {
        parent::__construct($model);
    }
}

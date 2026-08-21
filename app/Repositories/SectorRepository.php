<?php

namespace App\Repositories;

use App\Models\Sector;

class SectorRepository extends BaseRepository
{
    public function __construct(Sector $model)
    {
        parent::__construct($model);
    }
}

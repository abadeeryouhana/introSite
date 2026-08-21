<?php

namespace App\Services;

use App\Repositories\SectorRepository;

class SectorService extends BaseService
{
    public function __construct(SectorRepository $repository)
    {
        parent::__construct($repository);
    }

    public function hasBrands($id)
    {
        $sector = $this->getById($id, ['brands']);
        return $sector->brands->count() > 0;
    }
}

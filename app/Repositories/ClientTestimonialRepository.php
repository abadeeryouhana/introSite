<?php

namespace App\Repositories;

use App\Models\ClientTestimonial;

class ClientTestimonialRepository extends BaseRepository
{
    public function __construct(ClientTestimonial $model)
    {
        parent::__construct($model);
    }
}

<?php

namespace App\Repositories;

use App\Models\SocialLink;

class SocialLinkRepository extends BaseRepository
{
    public function __construct(SocialLink $model)
    {
        parent::__construct($model);
    }
}

<?php

namespace App\Services;

use App\Repositories\SocialLinkRepository;

class SocialLinkService extends BaseService
{
    public function __construct(SocialLinkRepository $repository)
    {
        parent::__construct($repository);
    }
}

<?php

namespace App\Repositories;

use App\Models\TeamMember;

class TeamMemberRepository extends BaseRepository
{
    public function __construct(TeamMember $model)
    {
        parent::__construct($model);
    }
}

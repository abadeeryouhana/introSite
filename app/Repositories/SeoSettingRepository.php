<?php

namespace App\Repositories;

use App\Models\SeoSetting;

class SeoSettingRepository extends BaseRepository
{
    public function __construct(SeoSetting $model)
    {
        parent::__construct($model);
    }

    public function getByPageKey(string $pageKey)
    {
        return $this->model->where('page_key', $pageKey)->first();
    }
}

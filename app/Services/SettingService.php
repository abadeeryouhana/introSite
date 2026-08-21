<?php

namespace App\Services;

use App\Repositories\SettingRepository;
use App\Models\Setting;

class SettingService extends BaseService
{
    public function __construct(SettingRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getAllSettings()
    {
        return Setting::pluck('value', 'key')->all();
    }

    public function updateSettings(array $data, $logoFile = null)
    {
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        if ($logoFile) {
            $path = $logoFile->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'site_logo'], ['value' => $path]);
        }
    }
}

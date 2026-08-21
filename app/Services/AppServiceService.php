<?php

namespace App\Services;

use App\Repositories\ServiceRepository;
use Illuminate\Support\Facades\Storage;

class AppServiceService extends BaseService
{
    public function __construct(ServiceRepository $repository)
    {
        parent::__construct($repository);
    }

    public function handleCreate(array $data, $iconFile = null)
    {
        if ($iconFile) {
            $data['icon_path'] = $iconFile->store('services', 'public');
        }
        unset($data['icon']);
        return $this->create($data);
    }

    public function handleUpdate($id, array $data, $iconFile = null)
    {
        $service = $this->getById($id);
        if ($iconFile) {
            if ($service->icon_path) {
                Storage::disk('public')->delete($service->icon_path);
            }
            $data['icon_path'] = $iconFile->store('services', 'public');
        }
        unset($data['icon']);
        return $this->update($id, $data);
    }

    public function handleDelete($id)
    {
        $service = $this->getById($id);
        if ($service->icon_path) {
            Storage::disk('public')->delete($service->icon_path);
        }
        return $this->delete($id);
    }
}

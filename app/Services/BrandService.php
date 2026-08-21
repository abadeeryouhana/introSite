<?php

namespace App\Services;

use App\Repositories\BrandRepository;
use Illuminate\Support\Facades\Storage;

class BrandService extends BaseService
{
    public function __construct(BrandRepository $repository)
    {
        parent::__construct($repository);
    }

    public function handleCreate(array $data, $logoFile = null)
    {
        if ($logoFile) {
            $data['logo_path'] = $logoFile->store('brands', 'public');
        }
        unset($data['logo']);
        return $this->create($data);
    }

    public function handleUpdate($id, array $data, $logoFile = null)
    {
        $brand = $this->getById($id);
        if ($logoFile) {
            if ($brand->logo_path) {
                Storage::disk('public')->delete($brand->logo_path);
            }
            $data['logo_path'] = $logoFile->store('brands', 'public');
        }
        unset($data['logo']);
        return $this->update($id, $data);
    }

    public function handleDelete($id)
    {
        $brand = $this->getById($id);
        if ($brand->logo_path) {
            Storage::disk('public')->delete($brand->logo_path);
        }
        return $this->delete($id);
    }
}

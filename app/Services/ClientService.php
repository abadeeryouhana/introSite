<?php

namespace App\Services;

use App\Repositories\ClientRepository;
use Illuminate\Support\Facades\Storage;

class ClientService extends BaseService
{
    public function __construct(ClientRepository $repository)
    {
        parent::__construct($repository);
    }

    public function handleCreate(array $data, $logoFile = null)
    {
        if ($logoFile) {
            $data['logo_path'] = $logoFile->store('clients', 'public');
        }
        unset($data['logo']);
        return $this->create($data);
    }

    public function handleUpdate($id, array $data, $logoFile = null)
    {
        $client = $this->getById($id);
        if ($logoFile) {
            if ($client->logo_path) {
                Storage::disk('public')->delete($client->logo_path);
            }
            $data['logo_path'] = $logoFile->store('clients', 'public');
        }
        unset($data['logo']);
        return $this->update($id, $data);
    }

    public function handleDelete($id)
    {
        $client = $this->getById($id);
        if ($client->logo_path) {
            Storage::disk('public')->delete($client->logo_path);
        }
        return $this->delete($id);
    }
}

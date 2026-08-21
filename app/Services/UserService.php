<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    public function handleCreate(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->create($data);
    }

    public function handleUpdate($id, array $data, $hasPassword = false)
    {
        if ($hasPassword && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        return $this->update($id, $data);
    }
}

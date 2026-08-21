<?php

namespace App\Services;

use App\Repositories\TeamMemberRepository;
use Illuminate\Support\Facades\Storage;

class TeamMemberService extends BaseService
{
    public function __construct(TeamMemberRepository $repository)
    {
        parent::__construct($repository);
    }

    public function handleCreate(array $data, $imageFile = null)
    {
        if ($imageFile) {
            $data['image_path'] = $imageFile->store('team', 'public');
        }
        unset($data['image']);
        return $this->create($data);
    }

    public function handleUpdate($id, array $data, $imageFile = null)
    {
        $teamMember = $this->getById($id);
        if ($imageFile) {
            if ($teamMember->image_path) {
                Storage::disk('public')->delete($teamMember->image_path);
            }
            $data['image_path'] = $imageFile->store('team', 'public');
        }
        unset($data['image']);
        return $this->update($id, $data);
    }

    public function handleDelete($id)
    {
        $teamMember = $this->getById($id);
        if ($teamMember->image_path) {
            Storage::disk('public')->delete($teamMember->image_path);
        }
        return $this->delete($id);
    }
}

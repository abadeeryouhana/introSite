<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Illuminate\Support\Facades\Storage;

class BlogService extends BaseService
{
    public function __construct(BlogRepository $repository)
    {
        parent::__construct($repository);
    }

    public function handleCreate(array $data, $imageFile = null)
    {
        if ($imageFile) {
            $data['image'] = $imageFile->store('blogs', 'public');
        }
        return $this->create($data);
    }

    public function handleUpdate($id, array $data, $imageFile = null)
    {
        $blog = $this->getById($id);
        if ($imageFile) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $imageFile->store('blogs', 'public');
        }
        return $this->update($id, $data);
    }

    public function handleDelete($id)
    {
        $blog = $this->getById($id);
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        return $this->delete($id);
    }
}

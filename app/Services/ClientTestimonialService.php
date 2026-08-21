<?php

namespace App\Services;

use App\Repositories\ClientTestimonialRepository;
use Illuminate\Support\Facades\Storage;

class ClientTestimonialService extends BaseService
{
    public function __construct(ClientTestimonialRepository $repository)
    {
        parent::__construct($repository);
    }

    public function handleCreate(array $data, $imageFile = null)
    {
        if ($imageFile) {
            $data['image'] = $imageFile->store('client_testimonials', 'public');
        }
        return $this->create($data);
    }

    public function handleUpdate($id, array $data, $imageFile = null)
    {
        $testimonial = $this->getById($id);
        if ($imageFile) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $data['image'] = $imageFile->store('client_testimonials', 'public');
        }
        return $this->update($id, $data);
    }

    public function handleDelete($id)
    {
        $testimonial = $this->getById($id);
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        return $this->delete($id);
    }
}

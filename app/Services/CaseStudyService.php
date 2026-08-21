<?php

namespace App\Services;

use App\Repositories\CaseStudyRepository;
use Illuminate\Support\Facades\Storage;

class CaseStudyService extends BaseService
{
    public function __construct(CaseStudyRepository $repository)
    {
        parent::__construct($repository);
    }

    public function handleCreate(array $data, $imageFile = null)
    {
        if ($imageFile) {
            $data['image'] = $imageFile->store('case_studies', 'public');
        }
        return $this->create($data);
    }

    public function handleUpdate($id, array $data, $imageFile = null)
    {
        $caseStudy = $this->getById($id);
        if ($imageFile) {
            if ($caseStudy->image) {
                Storage::disk('public')->delete($caseStudy->image);
            }
            $data['image'] = $imageFile->store('case_studies', 'public');
        }
        return $this->update($id, $data);
    }

    public function handleDelete($id)
    {
        $caseStudy = $this->getById($id);
        if ($caseStudy->image) {
            Storage::disk('public')->delete($caseStudy->image);
        }
        return $this->delete($id);
    }
}

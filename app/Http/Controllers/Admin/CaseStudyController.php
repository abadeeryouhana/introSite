<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Services\CaseStudyService;
use App\Services\SectorService;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    protected $caseStudyService;
    protected $sectorService;

    public function __construct(CaseStudyService $caseStudyService, SectorService $sectorService)
    {
        $this->caseStudyService = $caseStudyService;
        $this->sectorService = $sectorService;
    }

    public function index()
    {
        $caseStudies = $this->caseStudyService->getOrdered('order', 'asc', null, ['sector']);
        return view('admin.case_studies.index', compact('caseStudies'));
    }

    public function create()
    {
        $sectors = $this->sectorService->getAll();
        return view('admin.case_studies.create', compact('sectors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sector_id' => 'required|exists:sectors,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'delivered' => 'nullable|string',
            'tools' => 'nullable|string',
            'order' => 'integer',
            'image' => 'nullable|image'
        ]);

        $this->caseStudyService->handleCreate($validated, $request->file('image'));
        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study created successfully.');
    }

    public function edit(CaseStudy $caseStudy)
    {
        $sectors = $this->sectorService->getAll();
        return view('admin.case_studies.edit', compact('caseStudy', 'sectors'));
    }

    public function update(Request $request, CaseStudy $caseStudy)
    {
        $validated = $request->validate([
            'sector_id' => 'required|exists:sectors,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'delivered' => 'nullable|string',
            'tools' => 'nullable|string',
            'order' => 'integer',
            'image' => 'nullable|image'
        ]);

        $this->caseStudyService->handleUpdate($caseStudy->id, $validated, $request->file('image'));
        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study updated successfully.');
    }

    public function destroy(CaseStudy $caseStudy)
    {
        $this->caseStudyService->handleDelete($caseStudy->id);
        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudy::with('sector')->orderBy('order')->get();
        return view('admin.case_studies.index', compact('caseStudies'));
    }

    public function create()
    {
        $sectors = Sector::all();
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

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('case_studies', 'public');
        }

        CaseStudy::create($validated);
        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study created successfully.');
    }

    public function edit(CaseStudy $caseStudy)
    {
        $sectors = Sector::all();
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

        if ($request->hasFile('image')) {
            if ($caseStudy->image) {
                Storage::disk('public')->delete($caseStudy->image);
            }
            $validated['image'] = $request->file('image')->store('case_studies', 'public');
        }

        $caseStudy->update($validated);
        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study updated successfully.');
    }

    public function destroy(CaseStudy $caseStudy)
    {
        if ($caseStudy->image) {
            Storage::disk('public')->delete($caseStudy->image);
        }
        $caseStudy->delete();
        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study deleted successfully.');
    }
}

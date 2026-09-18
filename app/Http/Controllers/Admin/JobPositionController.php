<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosition;
use App\Services\JobPositionService;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    protected $jobPositionService;

    public function __construct(JobPositionService $jobPositionService)
    {
        $this->jobPositionService = $jobPositionService;
    }

    public function index()
    {
        $positions = $this->jobPositionService->getOrdered('order', 'asc');
        return view('admin.job-positions.index', compact('positions'));
    }

    protected function getAvailableSectors(): array
    {
        $defaultSectors = [
            'Technology & AI',
            'Translation',
            'Localization',
            'Consulting & Business Mgmt',
            'Education & Training',
        ];
        $dbSectors = JobPosition::whereNotNull('sector')->distinct()->pluck('sector')->toArray();
        return array_values(array_unique(array_merge($defaultSectors, $dbSectors)));
    }

    public function create()
    {
        $sectors = $this->getAvailableSectors();
        return view('admin.job-positions.create', compact('sectors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'company'       => 'nullable|string|max:255',
            'location'      => 'nullable|string|max:255',
            'type'          => 'nullable|string|max:100',
            'sector'        => 'nullable|string|max:255',
            'custom_sector' => 'nullable|string|max:255',
            'is_active'     => 'nullable|boolean',
            'order'         => 'nullable|integer',
        ]);

        if ($request->input('sector') === 'custom' && $request->filled('custom_sector')) {
            $validated['sector'] = $request->input('custom_sector');
        }
        unset($validated['custom_sector']);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['order']     = $request->input('order', 0);

        $this->jobPositionService->create($validated);
        return redirect()->route('admin.job-positions.index')->with('success', 'Job position created successfully.');
    }

    public function edit(JobPosition $job_position)
    {
        $sectors = $this->getAvailableSectors();
        return view('admin.job-positions.edit', compact('job_position', 'sectors'));
    }

    public function update(Request $request, JobPosition $job_position)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'company'       => 'nullable|string|max:255',
            'location'      => 'nullable|string|max:255',
            'type'          => 'nullable|string|max:100',
            'sector'        => 'nullable|string|max:255',
            'custom_sector' => 'nullable|string|max:255',
            'is_active'     => 'nullable|boolean',
            'order'         => 'nullable|integer',
        ]);

        if ($request->input('sector') === 'custom' && $request->filled('custom_sector')) {
            $validated['sector'] = $request->input('custom_sector');
        }
        unset($validated['custom_sector']);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['order']     = $request->input('order', 0);

        $this->jobPositionService->update($job_position->id, $validated);
        return redirect()->route('admin.job-positions.index')->with('success', 'Job position updated successfully.');
    }

    public function destroy(JobPosition $job_position)
    {
        $this->jobPositionService->delete($job_position->id);
        return redirect()->route('admin.job-positions.index')->with('success', 'Job position deleted successfully.');
    }
}

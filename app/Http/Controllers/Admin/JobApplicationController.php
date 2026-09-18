<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Services\JobApplicationService;

class JobApplicationController extends Controller
{
    protected $jobApplicationService;

    public function __construct(JobApplicationService $jobApplicationService)
    {
        $this->jobApplicationService = $jobApplicationService;
    }

    public function index()
    {
        $applications = $this->jobApplicationService->getLatest(null, ['position']);
        return view('admin.job-applications.index', compact('applications'));
    }

    public function show(JobApplication $job_application)
    {
        $job_application->load('position');
        return view('admin.job-applications.show', compact('job_application'));
    }

    public function destroy(JobApplication $job_application)
    {
        // Delete CV file if exists
        if ($job_application->cv_path && \Storage::disk('public')->exists($job_application->cv_path)) {
            \Storage::disk('public')->delete($job_application->cv_path);
        }
        $this->jobApplicationService->delete($job_application->id);
        return redirect()->route('admin.job-applications.index')->with('success', 'Application deleted successfully.');
    }
}

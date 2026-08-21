<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\AppServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $appServiceService;

    public function __construct(AppServiceService $appServiceService)
    {
        $this->appServiceService = $appServiceService;
    }

    public function index()
    {
        $services = $this->appServiceService->getOrdered('order', 'asc');
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'integer',
            'icon' => 'nullable|image'
        ]);

        $this->appServiceService->handleCreate($validated, $request->file('icon'));
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'integer',
            'icon' => 'nullable|image'
        ]);

        $this->appServiceService->handleUpdate($service->id, $validated, $request->file('icon'));
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $this->appServiceService->handleDelete($service->id);
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}

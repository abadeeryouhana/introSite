<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
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

        if ($request->hasFile('icon')) {
            $validated['icon_path'] = $request->file('icon')->store('services', 'public');
        }
        unset($validated['icon']);

        Service::create($validated);
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

        if ($request->hasFile('icon')) {
            if ($service->icon_path) {
                Storage::disk('public')->delete($service->icon_path);
            }
            $validated['icon_path'] = $request->file('icon')->store('services', 'public');
        }
        unset($validated['icon']);

        $service->update($validated);
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->icon_path) {
            Storage::disk('public')->delete($service->icon_path);
        }
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}

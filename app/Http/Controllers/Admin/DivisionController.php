<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('order')->get();
        return view('admin.divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('admin.divisions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url',
            'order' => 'integer',
            'logo' => 'nullable|image'
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo_path'] = $request->file('logo')->store('divisions', 'public');
        }
        unset($validated['logo']);

        Division::create($validated);
        return redirect()->route('admin.divisions.index')->with('success', 'Division created successfully.');
    }

    public function edit(Division $division)
    {
        return view('admin.divisions.edit', compact('division'));
    }

    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url',
            'order' => 'integer',
            'logo' => 'nullable|image'
        ]);

        if ($request->hasFile('logo')) {
            if ($division->logo_path) {
                Storage::disk('public')->delete($division->logo_path);
            }
            $validated['logo_path'] = $request->file('logo')->store('divisions', 'public');
        }
        unset($validated['logo']);

        $division->update($validated);
        return redirect()->route('admin.divisions.index')->with('success', 'Division updated successfully.');
    }

    public function destroy(Division $division)
    {
        if ($division->logo_path) {
            Storage::disk('public')->delete($division->logo_path);
        }
        $division->delete();
        return redirect()->route('admin.divisions.index')->with('success', 'Division deleted successfully.');
    }
}

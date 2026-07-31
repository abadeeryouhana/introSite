<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::all();
        return view('admin.sectors.index', compact('sectors'));
    }

    public function create()
    {
        return view('admin.sectors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Sector::create($validated);
        return redirect()->route('admin.sectors.index')->with('success', 'Sector created successfully.');
    }

    public function edit(Sector $sector)
    {
        return view('admin.sectors.edit', compact('sector'));
    }

    public function update(Request $request, Sector $sector)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $sector->update($validated);
        return redirect()->route('admin.sectors.index')->with('success', 'Sector updated successfully.');
    }

    public function destroy(Sector $sector)
    {
        if ($sector->brands()->count() > 0) {
            return redirect()->route('admin.sectors.index')->with('error', 'Cannot delete sector with associated brands.');
        }
        $sector->delete();
        return redirect()->route('admin.sectors.index')->with('success', 'Sector deleted successfully.');
    }
}

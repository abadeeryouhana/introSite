<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Services\SectorService;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    protected $sectorService;

    public function __construct(SectorService $sectorService)
    {
        $this->sectorService = $sectorService;
    }

    public function index()
    {
        $sectors = $this->sectorService->getAll();
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
        $this->sectorService->create($validated);
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
        $this->sectorService->update($sector->id, $validated);
        return redirect()->route('admin.sectors.index')->with('success', 'Sector updated successfully.');
    }

    public function destroy(Sector $sector)
    {
        if ($this->sectorService->hasBrands($sector->id)) {
            return redirect()->route('admin.sectors.index')->with('error', 'Cannot delete sector with associated brands.');
        }
        $this->sectorService->delete($sector->id);
        return redirect()->route('admin.sectors.index')->with('success', 'Sector deleted successfully.');
    }
}

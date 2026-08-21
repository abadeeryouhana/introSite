<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Services\BrandService;
use App\Services\SectorService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandService;
    protected $sectorService;

    public function __construct(BrandService $brandService, SectorService $sectorService)
    {
        $this->brandService = $brandService;
        $this->sectorService = $sectorService;
    }

    public function index()
    {
        $brands = $this->brandService->getOrdered('order', 'asc', null, ['sector']);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        $sectors = $this->sectorService->getAll();
        return view('admin.brands.create', compact('sectors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sector_id' => 'required|exists:sectors,id',
            'description' => 'nullable|string',
            'status' => 'required|in:Live,Soon',
            'url' => 'nullable|url',
            'order' => 'integer',
            'logo' => 'nullable|image'
        ]);

        $this->brandService->handleCreate($validated, $request->file('logo'));
        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        $sectors = $this->sectorService->getAll();
        return view('admin.brands.edit', compact('brand', 'sectors'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sector_id' => 'required|exists:sectors,id',
            'description' => 'nullable|string',
            'status' => 'required|in:Live,Soon',
            'url' => 'nullable|url',
            'order' => 'integer',
            'logo' => 'nullable|image'
        ]);

        $this->brandService->handleUpdate($brand->id, $validated, $request->file('logo'));
        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $this->brandService->handleDelete($brand->id);
        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}

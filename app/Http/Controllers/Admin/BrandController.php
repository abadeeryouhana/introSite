<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::with('sector')->orderBy('order')->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        $sectors = Sector::all();
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

        if ($request->hasFile('logo')) {
            $validated['logo_path'] = $request->file('logo')->store('brands', 'public');
        }
        unset($validated['logo']);

        Brand::create($validated);
        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        $sectors = Sector::all();
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

        if ($request->hasFile('logo')) {
            if ($brand->logo_path) {
                Storage::disk('public')->delete($brand->logo_path);
            }
            $validated['logo_path'] = $request->file('logo')->store('brands', 'public');
        }
        unset($validated['logo']);

        $brand->update($validated);
        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->logo_path) {
            Storage::disk('public')->delete($brand->logo_path);
        }
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}

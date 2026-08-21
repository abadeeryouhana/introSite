<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Services\BlogCategoryService;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    protected $blogCategoryService;

    public function __construct(BlogCategoryService $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }

    public function index()
    {
        $categories = $this->blogCategoryService->getAll();
        return view('admin.blog_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->blogCategoryService->create($request->all());
        return redirect()->route('admin.blog-categories.index')->with('success', 'Blog Category created successfully.');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog_categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->blogCategoryService->update($blogCategory->id, $request->all());
        return redirect()->route('admin.blog-categories.index')->with('success', 'Blog Category updated successfully.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $this->blogCategoryService->delete($blogCategory->id);
        return redirect()->route('admin.blog-categories.index')->with('success', 'Blog Category deleted successfully.');
    }
}

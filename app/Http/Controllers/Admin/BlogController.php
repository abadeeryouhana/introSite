<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\BlogService;
use App\Services\BlogCategoryService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;
    protected $blogCategoryService;

    public function __construct(BlogService $blogService, BlogCategoryService $blogCategoryService)
    {
        $this->blogService = $blogService;
        $this->blogCategoryService = $blogCategoryService;
    }

    public function index()
    {
        $blogs = $this->blogService->getLatest(null, ['category']);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = $this->blogCategoryService->getAll();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('image');
        $this->blogService->handleCreate($data, $request->file('image'));

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = $this->blogCategoryService->getAll();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('image');
        $this->blogService->handleUpdate($blog->id, $data, $request->file('image'));

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $this->blogService->handleDelete($blog->id);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}

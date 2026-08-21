<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use App\Services\SocialLinkService;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    protected $socialLinkService;

    public function __construct(SocialLinkService $socialLinkService)
    {
        $this->socialLinkService = $socialLinkService;
    }

    public function index()
    {
        $social_links = $this->socialLinkService->getAll();
        return view('admin.social-links.index', compact('social_links'));
    }

    public function create()
    {
        return view('admin.social-links.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url'
        ]);

        $this->socialLinkService->create($validated);
        return redirect()->route('admin.social-links.index')->with('success', 'Link created successfully.');
    }

    public function edit(SocialLink $social_link)
    {
        return view('admin.social-links.edit', compact('social_link'));
    }

    public function update(Request $request, SocialLink $social_link)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url'
        ]);

        $this->socialLinkService->update($social_link->id, $validated);
        return redirect()->route('admin.social-links.index')->with('success', 'Link updated successfully.');
    }

    public function destroy(SocialLink $social_link)
    {
        $this->socialLinkService->delete($social_link->id);
        return redirect()->route('admin.social-links.index')->with('success', 'Link deleted successfully.');
    }
}

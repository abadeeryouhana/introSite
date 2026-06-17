<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $social_links = SocialLink::all();
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

        SocialLink::create($validated);
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

        $social_link->update($validated);
        return redirect()->route('admin.social-links.index')->with('success', 'Link updated successfully.');
    }

    public function destroy(SocialLink $social_link)
    {
        $social_link->delete();
        return redirect()->route('admin.social-links.index')->with('success', 'Link deleted successfully.');
    }
}

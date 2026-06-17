<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $team_members = TeamMember::orderBy('order')->get();
        return view('admin.team-members.index', compact('team_members'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'order' => 'integer',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('team', 'public');
        }
        unset($validated['image']);

        TeamMember::create($validated);
        return redirect()->route('admin.team-members.index')->with('success', 'Team Member created successfully.');
    }

    public function edit(TeamMember $team_member)
    {
        return view('admin.team-members.edit', compact('team_member'));
    }

    public function update(Request $request, TeamMember $team_member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'order' => 'integer',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            if ($team_member->image_path) {
                Storage::disk('public')->delete($team_member->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('team', 'public');
        }
        unset($validated['image']);

        $team_member->update($validated);
        return redirect()->route('admin.team-members.index')->with('success', 'Team Member updated successfully.');
    }

    public function destroy(TeamMember $team_member)
    {
        if ($team_member->image_path) {
            Storage::disk('public')->delete($team_member->image_path);
        }
        $team_member->delete();
        return redirect()->route('admin.team-members.index')->with('success', 'Team Member deleted successfully.');
    }
}

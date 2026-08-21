<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Services\TeamMemberService;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    protected $teamMemberService;

    public function __construct(TeamMemberService $teamMemberService)
    {
        $this->teamMemberService = $teamMemberService;
    }

    public function index()
    {
        $team_members = $this->teamMemberService->getOrdered('order', 'asc');
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

        $this->teamMemberService->handleCreate($validated, $request->file('image'));
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

        $this->teamMemberService->handleUpdate($team_member->id, $validated, $request->file('image'));
        return redirect()->route('admin.team-members.index')->with('success', 'Team Member updated successfully.');
    }

    public function destroy(TeamMember $team_member)
    {
        $this->teamMemberService->handleDelete($team_member->id);
        return redirect()->route('admin.team-members.index')->with('success', 'Team Member deleted successfully.');
    }
}

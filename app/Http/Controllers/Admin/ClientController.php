<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('order')->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url',
            'order' => 'integer',
            'logo' => 'nullable|image'
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo_path'] = $request->file('logo')->store('clients', 'public');
        }
        unset($validated['logo']);

        Client::create($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url',
            'order' => 'integer',
            'logo' => 'nullable|image'
        ]);

        if ($request->hasFile('logo')) {
            if ($client->logo_path) {
                Storage::disk('public')->delete($client->logo_path);
            }
            $validated['logo_path'] = $request->file('logo')->store('clients', 'public');
        }
        unset($validated['logo']);

        $client->update($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        if ($client->logo_path) {
            Storage::disk('public')->delete($client->logo_path);
        }
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientTestimonial;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = ClientTestimonial::with('client')->latest()->get();
        return view('admin.client_testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('admin.client_testimonials.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('client_testimonials', 'public');
        }

        ClientTestimonial::create($validated);
        return redirect()->route('admin.client-testimonials.index')->with('success', 'Client testimonial created successfully.');
    }

    public function edit(ClientTestimonial $clientTestimonial)
    {
        $clients = Client::all();
        return view('admin.client_testimonials.edit', compact('clientTestimonial', 'clients'));
    }

    public function update(Request $request, ClientTestimonial $clientTestimonial)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            if ($clientTestimonial->image) {
                Storage::disk('public')->delete($clientTestimonial->image);
            }
            $validated['image'] = $request->file('image')->store('client_testimonials', 'public');
        }

        $clientTestimonial->update($validated);
        return redirect()->route('admin.client-testimonials.index')->with('success', 'Client testimonial updated successfully.');
    }

    public function destroy(ClientTestimonial $clientTestimonial)
    {
        if ($clientTestimonial->image) {
            Storage::disk('public')->delete($clientTestimonial->image);
        }
        $clientTestimonial->delete();
        return redirect()->route('admin.client-testimonials.index')->with('success', 'Client testimonial deleted successfully.');
    }
}

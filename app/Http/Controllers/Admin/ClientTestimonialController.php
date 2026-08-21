<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientTestimonial;
use App\Services\ClientTestimonialService;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientTestimonialController extends Controller
{
    protected $clientTestimonialService;
    protected $clientService;

    public function __construct(ClientTestimonialService $clientTestimonialService, ClientService $clientService)
    {
        $this->clientTestimonialService = $clientTestimonialService;
        $this->clientService = $clientService;
    }

    public function index()
    {
        $testimonials = $this->clientTestimonialService->getLatest(null, ['client']);
        return view('admin.client_testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $clients = $this->clientService->getAll();
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

        $this->clientTestimonialService->handleCreate($validated, $request->file('image'));
        return redirect()->route('admin.client-testimonials.index')->with('success', 'Client testimonial created successfully.');
    }

    public function edit(ClientTestimonial $clientTestimonial)
    {
        $clients = $this->clientService->getAll();
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

        $this->clientTestimonialService->handleUpdate($clientTestimonial->id, $validated, $request->file('image'));
        return redirect()->route('admin.client-testimonials.index')->with('success', 'Client testimonial updated successfully.');
    }

    public function destroy(ClientTestimonial $clientTestimonial)
    {
        $this->clientTestimonialService->handleDelete($clientTestimonial->id);
        return redirect()->route('admin.client-testimonials.index')->with('success', 'Client testimonial deleted successfully.');
    }
}

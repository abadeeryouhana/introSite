<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Sector;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\ContactMessage;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ClientTestimonial;

class FrontendController extends Controller
{
    public function home()
    {
        $sectors = Sector::with('brands')->take(5)->get();
        $services = Service::orderBy('order')->take(10)->get();
        $clients = Client::orderBy('order')->get();
        $caseStudies = \App\Models\CaseStudy::with('sector')->orderBy('order')->take(4)->get();
        $latestBlogs = Blog::with('category')->latest()->take(4)->get();
        $testimonials = ClientTestimonial::with('client')->latest()->get();
        return view('home', compact('sectors', 'services', 'clients', 'caseStudies', 'latestBlogs', 'testimonials'));
    }

    public function sectorsBrands()
    {
        $sectors = Sector::with('brands')->get();
        return view('sectors_brands', compact('sectors'));
    }

    public function portfolio()
    {
        $sectors = Sector::has('caseStudies')->get();
        $caseStudies = \App\Models\CaseStudy::with('sector')->orderBy('order')->get();
        return view('portfolio', compact('sectors', 'caseStudies'));
    }

    public function about()
    {
        $team = TeamMember::orderBy('order')->get();
        $clients = Client::orderBy('order')->get();
        $testimonials = ClientTestimonial::with('client')->latest()->get();
        return view('about', compact('team', 'clients', 'testimonials'));
    }

    public function services()
    {
        $services = Service::orderBy('order')->get();
        return view('services', compact('services'));
    }

    public function contact()
    {
        $services = Service::orderBy('order')->get();
        return view('contact', compact('services'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:500',
            'title' => 'nullable|string|max:500',
            'service' => 'nullable|string|max:500',
            'message' => 'required|string'
        ]);

        ContactMessage::create($validated);
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully.');
    }

    public function blog()
    {
        $categories = BlogCategory::has('blogs')->get();
        $blogs = Blog::with('category')->latest()->get();
        return view('blog', compact('categories', 'blogs'));
    }

    public function blogDetails($id)
    {
        $blog = Blog::with('category')->findOrFail($id);
        return view('blog_details', compact('blog'));
    }

    public function careers()
    {
        return view('careers');
    }
}

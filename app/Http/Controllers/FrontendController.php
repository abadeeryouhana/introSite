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

class FrontendController extends Controller
{
    public function home()
    {
        $sectors = Sector::with('brands')->take(5)->get();
        $services = Service::orderBy('order')->take(10)->get();
        $clients = Client::orderBy('order')->get();
        $caseStudies = \App\Models\CaseStudy::with('sector')->orderBy('order')->take(4)->get();
        return view('home', compact('sectors', 'services', 'clients', 'caseStudies'));
    }

    public function sectorsBrands()
    {
        $sectors = Sector::with('brands')->get();
        return view('sectors_brands', compact('sectors'));
    }

    public function about()
    {
        $team = TeamMember::orderBy('order')->get();
        return view('about', compact('team'));
    }

    public function services()
    {
        $services = Service::orderBy('order')->get();
        return view('services', compact('services'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string'
        ]);

        ContactMessage::create($validated);
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully.');
    }
}

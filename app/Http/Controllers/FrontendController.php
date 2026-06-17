<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Division;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\ContactMessage;
use App\Models\Setting;
use App\Models\SocialLink;

class FrontendController extends Controller
{
    public function home()
    {
        $clients = Client::orderBy('order')->get();
        $divisions = Division::orderBy('order')->get();
        return view('home', compact('clients', 'divisions'));
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

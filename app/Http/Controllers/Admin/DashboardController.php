<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Client;
use App\Models\ClientTestimonial;
use App\Models\Sector;
use App\Models\CaseStudy;
use App\Models\Brand;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\User;
use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $recentMessages = ContactMessage::latest()->take(5)->get();
        
        $stats = [
            'Clients' => Client::count(),
            'Testimonials' => ClientTestimonial::count(),
            'Sectors' => Sector::count(),
            'Case Studies' => CaseStudy::count(),
            'Brands' => Brand::count(),
            'Services' => Service::count(),
            'Team Members' => TeamMember::count(),
            'Users' => User::count(),
            'Blog Categories' => BlogCategory::count(),
            'Blogs' => Blog::count(),
            'Messages' => ContactMessage::count(),
        ];

        return view('admin.dashboard', compact('recentMessages', 'stats'));
    }
}

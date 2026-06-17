<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $recentMessages = ContactMessage::latest()->take(5)->get();
        return view('admin.dashboard', compact('recentMessages'));
    }
}

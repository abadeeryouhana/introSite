<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $contact_message)
    {
        return view('admin.contact-messages.show', compact('contact_message'));
    }

    public function destroy(ContactMessage $contact_message)
    {
        $contact_message->delete();
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Services\ContactMessageService;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    protected $contactMessageService;

    public function __construct(ContactMessageService $contactMessageService)
    {
        $this->contactMessageService = $contactMessageService;
    }

    public function index()
    {
        $messages = $this->contactMessageService->getLatest();
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $contact_message)
    {
        return view('admin.contact-messages.show', compact('contact_message'));
    }

    public function destroy(ContactMessage $contact_message)
    {
        $this->contactMessageService->delete($contact_message->id);
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatbotQuestion;
use App\Services\ChatbotQuestionService;
use Illuminate\Http\Request;

class ChatbotQuestionController extends Controller
{
    protected $chatbotQuestionService;

    public function __construct(ChatbotQuestionService $chatbotQuestionService)
    {
        $this->chatbotQuestionService = $chatbotQuestionService;
    }

    public function index()
    {
        $questions = $this->chatbotQuestionService->getOrdered('order', 'asc');
        return view('admin.chatbot_questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.chatbot_questions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        $this->chatbotQuestionService->create($validated);
        return redirect()->route('admin.chatbot-questions.index')->with('success', 'Chatbot question created successfully.');
    }

    public function edit(ChatbotQuestion $chatbot_question)
    {
        return view('admin.chatbot_questions.edit', compact('chatbot_question'));
    }

    public function update(Request $request, ChatbotQuestion $chatbot_question)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        $this->chatbotQuestionService->update($chatbot_question->id, $validated);
        return redirect()->route('admin.chatbot-questions.index')->with('success', 'Chatbot question updated successfully.');
    }

    public function destroy(ChatbotQuestion $chatbot_question)
    {
        $this->chatbotQuestionService->delete($chatbot_question->id);
        return redirect()->route('admin.chatbot-questions.index')->with('success', 'Chatbot question deleted successfully.');
    }
}

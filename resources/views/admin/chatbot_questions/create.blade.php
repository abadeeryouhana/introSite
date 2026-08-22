@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Create Chatbot Question</h1>
    <a href="{{ route('admin.chatbot-questions.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red; margin-bottom: 20px;">
            <ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul>
        </div>
    @endif
    <form action="{{ route('admin.chatbot-questions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Question</label>
            <input type="text" name="question" value="{{ old('question') }}" placeholder="e.g. What services do you provide?" required>
        </div>

        <div class="form-group">
            <label>Answer</label>
            <textarea name="answer" rows="5" placeholder="Enter the answer to be displayed to users..." required>{{ old('answer') }}</textarea>
        </div>

        <div class="form-group">
            <label>Display Order</label>
            <input type="number" name="order" value="{{ old('order', 0) }}">
        </div>

        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} style="width: auto;">
            <label for="is_active" style="margin-bottom: 0; cursor: pointer;">Active (Visible in chatbot)</label>
        </div>

        <button type="submit" class="btn" style="margin-top: 15px;">Save Question</button>
    </form>
</div>
@endsection

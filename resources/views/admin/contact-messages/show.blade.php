@extends('admin.layout')
@section('content')
<div class="header">
    <h1>View Message</h1>
    <a href="{{ route('admin.contact-messages.index') }}" class="btn">Back</a>
</div>
<div class="card">
    <p><strong>Name:</strong> {{ $contact_message->first_name }} {{ $contact_message->last_name }}</p>
    <p><strong>Email:</strong> {{ $contact_message->email }}</p>
    <p><strong>Phone:</strong> {{ $contact_message->phone }}</p>
    <p><strong>Company:</strong> {{ $contact_message->company ?? 'N/A' }}</p>
    <p><strong>Title:</strong> {{ $contact_message->title ?? 'N/A' }}</p>
    <p><strong>Service:</strong> {{ $contact_message->service ?? 'N/A' }}</p>
    <p><strong>Date:</strong> {{ $contact_message->created_at }}</p>
    <hr>
    <p><strong>Message:</strong></p>
    <p>{{ $contact_message->message }}</p>
</div>
@endsection
<?php

$basePath = 'd:/Projects Template/introSite/resources/views/admin';

$dirs = [
    '',
    '/clients',
    '/divisions',
    '/services',
    '/social-links',
    '/team-members',
    '/contact-messages',
    '/settings'
];

foreach ($dirs as $dir) {
    if (!is_dir($basePath . $dir)) {
        mkdir($basePath . $dir, 0777, true);
    }
}

// Layout
$layout = <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; display: flex; }
        .sidebar { width: 250px; background: #25231E; color: white; min-height: 100vh; padding: 20px; }
        .sidebar a { color: #ccc; text-decoration: none; display: block; padding: 10px 0; border-bottom: 1px solid #444; }
        .sidebar a:hover { color: white; }
        .content { flex: 1; padding: 20px; background: #F5F7FA; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        .btn { padding: 8px 12px; background: #3D81C3; color: white; text-decoration: none; border: none; cursor: pointer; border-radius: 4px; display: inline-block; }
        .btn-danger { background: #dc3545; }
        .alert { padding: 10px; background: #d4edda; color: #155724; margin-bottom: 20px; border-radius: 4px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold;}
        .form-group input, .form-group textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 style="color: #2BB295;">Admin Panel</h2>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.clients.index') }}">Clients</a>
        <a href="{{ route('admin.divisions.index') }}">Divisions</a>
        <a href="{{ route('admin.services.index') }}">Services</a>
        <a href="{{ route('admin.team-members.index') }}">Team Members</a>
        <a href="{{ route('admin.social-links.index') }}">Social Links</a>
        <a href="{{ route('admin.contact-messages.index') }}">Contact Messages</a>
        <a href="{{ route('admin.settings.index') }}">Settings</a>
        <a href="{{ route('home') }}" target="_blank" style="margin-top: 20px; color: #2BB295;">View Site</a>
    </div>
    <div class="content">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
EOT;
file_put_contents($basePath . '/layout.blade.php', $layout);

// Dashboard
$dashboard = <<<EOT
@extends('admin.layout')

@section('content')
<div class="header">
    <h1>Dashboard</h1>
</div>
<div class="card">
    <h3>Recent Contact Messages</h3>
    @if(isset(\$recentMessages) && \$recentMessages->count())
        <table>
            <tr><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>
            @foreach(\$recentMessages as \$msg)
            <tr>
                <td>{{ \$msg->first_name }} {{ \$msg->last_name }}</td>
                <td>{{ \$msg->email }}</td>
                <td>{{ Str::limit(\$msg->message, 50) }}</td>
                <td>{{ \$msg->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p>No recent messages.</p>
    @endif
</div>
@endsection
EOT;
file_put_contents($basePath . '/dashboard.blade.php', $dashboard);

// Generic function to generate CRUD views
function generateViews($entityName, $routePrefix, $fields, $basePath, $hasImage = false) {
    $plural = strtolower(str_replace('-', '_', $routePrefix));
    $singular = rtrim($plural, 's');
    $title = ucwords(str_replace('-', ' ', $routePrefix));
    $dir = $basePath . '/' . strtolower($routePrefix);

    $indexTh = '';
    $indexTd = '';
    foreach ($fields as $field => $label) {
        if ($field == 'image' || $field == 'logo' || $field == 'icon') {
            $indexTh .= "<th>$label</th>\n";
            $dbField = $field . '_path';
            $indexTd .= "<td>@if(\$$singular->$dbField) <img src=\"{{ asset('storage/' . \$$singular->$dbField) }}\" width=\"50\"> @endif</td>\n";
        } else {
            $indexTh .= "<th>$label</th>\n";
            $indexTd .= "<td>{{ \$$singular->$field }}</td>\n";
        }
    }

    $index = str_replace(
        ['__TITLE__', '__PREFIX__', '__PLURAL__', '__SINGULAR__', '__TH__', '__TD__'],
        [$title, $routePrefix, $plural, $singular, $indexTh, $indexTd],
        <<<'EOT'
@extends('admin.layout')
@section('content')
<div class="header">
    <h1>__TITLE__</h1>
    <a href="{{ route('admin.__PREFIX__.create') }}" class="btn">Add New</a>
</div>
<div class="card">
    <table>
        <tr>
            __TH__
            <th>Actions</th>
        </tr>
        @foreach($__PLURAL__ as $__SINGULAR__)
        <tr>
            __TD__
            <td>
                <a href="{{ route('admin.__PREFIX__.edit', $__SINGULAR__) }}" class="btn">Edit</a>
                <form action="{{ route('admin.__PREFIX__.destroy', $__SINGULAR__) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
EOT
    );
    file_put_contents($dir . '/index.blade.php', $index);

    $formFields = '';
    foreach ($fields as $field => $label) {
        if ($field == 'image' || $field == 'logo' || $field == 'icon') {
            $formFields .= <<<EOT
    <div class="form-group">
        <label>$label</label>
        <input type="file" name="$field">
        @if(isset(\$$singular) && \$$singular->{$field}_path)
            <br><img src="{{ asset('storage/' . \$$singular->{$field}_path) }}" width="100">
        @endif
    </div>

EOT;
        } elseif ($field == 'description' || $field == 'message') {
            $formFields .= <<<EOT
    <div class="form-group">
        <label>$label</label>
        <textarea name="$field" rows="5">{{ old('$field', \$$singular->$field ?? '') }}</textarea>
    </div>

EOT;
        } else {
            $formFields .= <<<EOT
    <div class="form-group">
        <label>$label</label>
        <input type="text" name="$field" value="{{ old('$field', \$$singular->$field ?? '') }}">
    </div>

EOT;
        }
    }

    $enctype = $hasImage ? 'enctype="multipart/form-data"' : '';

    $create = str_replace(
        ['__TITLE__', '__PREFIX__', '__ENCTYPE__', '__FIELDS__'],
        [$title, $routePrefix, $enctype, $formFields],
        <<<'EOT'
@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Create __TITLE__</h1>
    <a href="{{ route('admin.__PREFIX__.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.__PREFIX__.store') }}" method="POST" __ENCTYPE__>
        @csrf
        __FIELDS__
        <button type="submit" class="btn">Save</button>
    </form>
</div>
@endsection
EOT
    );
    file_put_contents($dir . '/create.blade.php', $create);

    $edit = str_replace(
        ['__TITLE__', '__PREFIX__', '__SINGULAR__', '__ENCTYPE__', '__FIELDS__'],
        [$title, $routePrefix, $singular, $enctype, $formFields],
        <<<'EOT'
@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Edit __TITLE__</h1>
    <a href="{{ route('admin.__PREFIX__.index') }}" class="btn">Back</a>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.__PREFIX__.update', $__SINGULAR__) }}" method="POST" __ENCTYPE__>
        @csrf @method('PUT')
        __FIELDS__
        <button type="submit" class="btn">Update</button>
    </form>
</div>
@endsection
EOT
    );
    file_put_contents($dir . '/edit.blade.php', $edit);
}

generateViews('Client', 'clients', ['name' => 'Name', 'url' => 'URL', 'order' => 'Order', 'logo' => 'Logo Image'], $basePath, true);
generateViews('Division', 'divisions', ['name' => 'Name', 'url' => 'URL', 'order' => 'Order', 'logo' => 'Logo Image'], $basePath, true);
generateViews('Service', 'services', ['title' => 'Title', 'description' => 'Description', 'order' => 'Order', 'icon' => 'Icon Image'], $basePath, true);
generateViews('TeamMember', 'team-members', ['name' => 'Name', 'position' => 'Position', 'order' => 'Order', 'image' => 'Image'], $basePath, true);
generateViews('SocialLink', 'social-links', ['platform' => 'Platform', 'url' => 'URL'], $basePath, false);

// Contact messages only needs index and show
$contactIndex = <<<'EOT'
@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Contact Messages</h1>
</div>
<div class="card">
    <table>
        <tr><th>Name</th><th>Email</th><th>Phone</th><th>Date</th><th>Actions</th></tr>
        @foreach($messages as $message)
        <tr>
            <td>{{ $message->first_name }} {{ $message->last_name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->phone }}</td>
            <td>{{ $message->created_at }}</td>
            <td>
                <a href="{{ route('admin.contact-messages.show', $message) }}" class="btn">View</a>
                <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
EOT;
file_put_contents($basePath . '/contact-messages/index.blade.php', $contactIndex);

$contactShow = <<<'EOT'
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
    <p><strong>Date:</strong> {{ $contact_message->created_at }}</p>
    <hr>
    <p><strong>Message:</strong></p>
    <p>{{ $contact_message->message }}</p>
</div>
@endsection
EOT;
file_put_contents($basePath . '/contact-messages/show.blade.php', $contactShow);

// Settings
$settingsIndex = <<<'EOT'
@extends('admin.layout')
@section('content')
<div class="header">
    <h1>Settings</h1>
</div>
<div class="card">
    @if($errors->any())
        <div style="color:red;"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
    @endif
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Site Logo</label>
            <input type="file" name="site_logo">
            @if(isset($settings['site_logo']))
                <br><img src="{{ asset('storage/' . $settings['site_logo']) }}" width="150" style="background:#ccc;">
            @endif
        </div>
        <div class="form-group">
            <label>Contact Email</label>
            <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}">
        </div>
        <div class="form-group">
            <label>Contact Phone</label>
            <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}">
        </div>
        <div class="form-group">
            <label>Contact Address</label>
            <input type="text" name="contact_address" value="{{ $settings['contact_address'] ?? '' }}">
        </div>
        <div class="form-group">
            <label>Primary Color</label>
            <input type="color" name="color_primary" value="{{ $settings['color_primary'] ?? '#3D81C3' }}">
        </div>
        <div class="form-group">
            <label>Secondary Color</label>
            <input type="color" name="color_secondary" value="{{ $settings['color_secondary'] ?? '#2BB295' }}">
        </div>
        <button type="submit" class="btn">Save Settings</button>
    </form>
</div>
@endsection
EOT;
file_put_contents($basePath . '/settings/index.blade.php', $settingsIndex);

echo "Admin views generated successfully.";

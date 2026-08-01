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
        <a href="{{ route('admin.sectors.index') }}">Sectors</a>
        <a href="{{ route('admin.case-studies.index') }}">Case Studies</a>
        <a href="{{ route('admin.brands.index') }}">Brands</a>
        <a href="{{ route('admin.services.index') }}">Services</a>
        <a href="{{ route('admin.team-members.index') }}">Team Members</a>
        <a href="{{ route('admin.users.index') }}">Users</a>
        <a href="{{ route('admin.social-links.index') }}">Social Links</a>
        <a href="{{ route('admin.blog-categories.index') }}">Blog Categories</a>
        <a href="{{ route('admin.blogs.index') }}">Blogs</a>
        <a href="{{ route('admin.contact-messages.index') }}">Contact Messages</a>
        <a href="{{ route('admin.settings.index') }}">Settings</a>
        <a href="{{ route('home') }}" target="_blank" style="margin-top: 20px; color: #2BB295;">View Site</a>
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" style="background: none; border: none; color: #ccc; cursor: pointer; padding: 10px 0; font-size: 16px; text-align: left; width: 100%; border-bottom: 1px solid #444;">Logout</button>
        </form>
    </div>
    <div class="content">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
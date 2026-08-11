<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
    <!-- Custom Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

    <!-- Sidebar -->
    <div class="admin-sidebar">
        <div class="sidebar-header">
            <h2>Bayan Group</h2>
        </div>
        
        <div class="sidebar-search">
            <div class="search-wrapper">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="sidebarSearch" placeholder="Search menu...">
            </div>
        </div>

        <div class="sidebar-menu" id="sidebarMenu">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
            <a href="{{ route('admin.clients.index') }}" class="{{ request()->routeIs('admin.clients.*') ? 'active' : '' }}"><i class="fa-solid fa-users"></i> Clients</a>
            <a href="{{ route('admin.client-testimonials.index') }}" class="{{ request()->routeIs('admin.client-testimonials.*') ? 'active' : '' }}"><i class="fa-solid fa-comment-dots"></i> Testimonials</a>
            <a href="{{ route('admin.sectors.index') }}" class="{{ request()->routeIs('admin.sectors.*') ? 'active' : '' }}"><i class="fa-solid fa-layer-group"></i> Sectors</a>
            <a href="{{ route('admin.case-studies.index') }}" class="{{ request()->routeIs('admin.case-studies.*') ? 'active' : '' }}"><i class="fa-solid fa-briefcase"></i> Case Studies</a>
            <a href="{{ route('admin.brands.index') }}" class="{{ request()->routeIs('admin.brands.*') ? 'active' : '' }}"><i class="fa-solid fa-tags"></i> Brands</a>
            <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}"><i class="fa-solid fa-concierge-bell"></i> Services</a>
            <a href="{{ route('admin.team-members.index') }}" class="{{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}"><i class="fa-solid fa-user-tie"></i> Team Members</a>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}"><i class="fa-solid fa-users-cog"></i> Admin Users</a>
            <a href="{{ route('admin.social-links.index') }}" class="{{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}"><i class="fa-solid fa-share-nodes"></i> Social Links</a>
            <a href="{{ route('admin.blog-categories.index') }}" class="{{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}"><i class="fa-solid fa-list"></i> Blog Categories</a>
            <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}"><i class="fa-solid fa-newspaper"></i> Blogs</a>
            <a href="{{ route('admin.contact-messages.index') }}" class="{{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}"><i class="fa-solid fa-envelope"></i> Messages</a>
            <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><i class="fa-solid fa-gear"></i> Settings</a>
        </div>

        <div class="sidebar-footer">
            <a href="{{ route('home') }}" target="_blank" class="btn-logout" style="margin-bottom: 10px; background: rgba(43, 178, 149, 0.1); color: #2BB295;">
                <i class="fa-solid fa-globe"></i> View Site
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="admin-main">
        <header class="admin-header">
            <div class="admin-header-title">
                Dashboard
            </div>
            <div class="admin-header-actions">
                <span>Welcome, {{ auth()->user()->name ?? 'Admin' }}</span>
                <div style="width: 35px; height: 35px; background: var(--admin-primary); border-radius: 50%; color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                </div>
            </div>
        </header>
        
        <div class="admin-content">
            @yield('content')
        </div>
    </div>

    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    
    <script>
        // Sidebar Search Functionality
        document.getElementById('sidebarSearch').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let links = document.querySelectorAll('#sidebarMenu a');
            
            links.forEach(function(link) {
                let text = link.textContent || link.innerText;
                if (text.toLowerCase().indexOf(filter) > -1) {
                    link.style.display = "";
                } else {
                    link.style.display = "none";
                }
            });
        });

        // Toast Notifications
        @if(session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top", 
                position: "right",
                style: {
                    background: "#50CD89", // Success color
                    borderRadius: "6px",
                    boxShadow: "0 4px 12px rgba(80, 205, 137, 0.2)",
                    fontFamily: "Inter, sans-serif"
                }
            }).showToast();
        @endif

        @if(session('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 4000,
                close: true,
                gravity: "top", 
                position: "right",
                style: {
                    background: "#F1416C", // Danger color
                    borderRadius: "6px",
                    boxShadow: "0 4px 12px rgba(241, 65, 108, 0.2)",
                    fontFamily: "Inter, sans-serif"
                }
            }).showToast();
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                Toastify({
                    text: "{{ $error }}",
                    duration: 5000,
                    close: true,
                    gravity: "top", 
                    position: "right",
                    style: {
                        background: "#F1416C", // Danger color
                        borderRadius: "6px",
                        boxShadow: "0 4px 12px rgba(241, 65, 108, 0.2)",
                        fontFamily: "Inter, sans-serif",
                        marginBottom: "10px"
                    }
                }).showToast();
            @endforeach
        @endif
    </script>
</body>
</html>
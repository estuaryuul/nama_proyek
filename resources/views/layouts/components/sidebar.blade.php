@php
    $menus = [
        (object) [
            'title' => 'Dashboard',
            'path' => '/',
            'icon' => 'fas fa-th',
        ],
        (object) [
            'title' => 'Products',
            'path' => 'products',
            'icon' => 'fas fa-th',
        ],
    ];

    if (auth()->user()->role == 'admin') {
        $menus[] = (object) [
            'title' => 'Register',
            'path' => 'listUser',
            'icon' => 'fas fa-th',
        ];
    }

    $menus = array_filter($menus, function ($menu) {
        return !(auth()->user()->role !== 'admin' && $menu->path === 'addproduct');
    });
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
        <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Andi Mart</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @foreach ($menus as $menu)
                    <li class="nav-item ">
                        <a href='{{ $menu->path[0] !== '/' ? '/' . $menu->path : $menu->path }}'
                            class="nav-link {{ request()->path() === $menu->path ? 'active' : '' }}">
                            <i class="nav-icon {{ $menu->icon }}"></i>
                            <p>
                                {{ $menu->title }}
                            </p>
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <p>Logout</p>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

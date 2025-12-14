<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'To-Do List')</title>

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-link">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">To-Do List</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('todos.index') }}" class="nav-link">

                            <i class="nav-icon fas fa-list"></i>
                            <p>To-Do List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>Categories</p>
                        </a>
                    </li>

                 
                    <li class="nav-item">
                        <a href="{{ route('tasks.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Tasks</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                    <a href="{{ route('priorities.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>Priorities</p>
                    </a>
                </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content -->
    <div class="content-wrapper p-3">
        @yield('content')
    </div>

    <footer class="main-footer text-center">
        <strong>&copy; {{ date('Y') }} To-Do List</strong>
    </footer>

</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

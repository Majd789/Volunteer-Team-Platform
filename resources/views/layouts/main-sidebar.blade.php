<!-- Brand Logo -->
{{--<a href="index3.html" class="brand-link">--}}
{{--    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
<span class=" brand-link brand-text font-weight-light">Volunteer Team</span>
{{--</a>--}}

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel  pb-3 mb-3 d-flex flex-column">
        <div class="allinfo mt-3 pb-3 d-flex">
            <div class="image">
                <img src="{{asset('photos/user.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('profile.edit')}}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <div class="logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-primary" type="submit">Logout</button>

            </form>
        </div>

    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('activities.index')}}" class="nav-link {{ request()->routeIs('activities.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Activities</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('gallery.index')}}" class="nav-link {{ request()->routeIs('gallery.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Gallery</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<!-- /.sidebar -->

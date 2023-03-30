<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none d-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- <h3 class="d-md-none d-block">Dashboard</h3> -->


    <!-- Topbar Search -->
    <x-search :title="$title" />

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        {{-- <x-alerts /> --}}

        <!-- Nav Item - Messages -->
        {{-- <x-messages /> --}}

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            {{-- <x-profile /> --}}

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $employee_name }}</span>
                @php
                    $photo = ($employee_photo) ? 'image?file=' . $employee_photo : asset('img/noprofileimg.jpg');
                @endphp
                <img class="img-profile rounded-circle" src="{{ url( $photo ) }}">
            </a>

            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('user.show',auth()->id()) }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

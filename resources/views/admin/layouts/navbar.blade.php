<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- LEFT -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- RIGHT -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">

                <!-- FOTO -->
                <img src="{{ auth()->user()->photo ? asset('storage/'.auth()->user()->photo) : asset('default.png') }}"
                     style="width:35px;height:35px;border-radius:50%;object-fit:cover;border:2px solid #ddd;"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                <!-- FALLBACK (INITIAL NAME) -->
                <div style="width:35px;height:35px;border-radius:50%;background:#6c757d;color:white;
                            display:none;align-items:center;justify-content:center;font-size:14px;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A',0,1)) }}
                </div>

                <!-- NAMA -->
                <span class="ml-2">{{ auth()->user()->name ?? 'Admin' }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <!-- PROFILE HEADER -->
                <div class="dropdown-item text-center">

                    <img src="{{ auth()->user()->photo ? asset('storage/'.auth()->user()->photo) : asset('default.png') }}"
                         style="width:60px;height:60px;border-radius:50%;object-fit:cover;border:2px solid #ddd;"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <div style="width:60px;height:60px;border-radius:50%;background:#6c757d;color:white;
                                display:none;align-items:center;justify-content:center;font-size:20px;">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A',0,1)) }}
                    </div>

                    <p class="mb-0 mt-2">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <small>User</small>
                </div>

                <div class="dropdown-divider"></div>

                <!-- PROFILE -->
                <a href="{{ route('profile') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>

                <!-- SETTINGS -->
                <a href="{{ route('profile') }}" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Edit Profile
                </a>

                <div class="dropdown-divider"></div>

                <!-- LOGOUT -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>

            </div>
        </li>

    </ul>

</nav>
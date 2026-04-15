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

                <!-- PROFILE IMAGE -->
                <img src="{{ asset('profile.jpg') }}"
                     style="width:35px;height:35px;border-radius:50%;object-fit:cover;border:2px solid #ddd;"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                <!-- FALLBACK (KALAU GAMBAR ERROR) -->
                <div style="width:35px;height:35px;border-radius:50%;background:#6c757d;color:white;
                            display:none;align-items:center;justify-content:center;font-size:14px;">
                    F
                </div>

            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-item text-center">

                    <!-- FOTO BESAR -->
                    <img src="{{ asset('profile.jpg') }}"
                         style="width:60px;height:60px;border-radius:50%;object-fit:cover;border:2px solid #ddd;"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                    <!-- FALLBACK BESAR -->
                    <div style="width:60px;height:60px;border-radius:50%;background:#6c757d;color:white;
                                display:none;align-items:center;justify-content:center;font-size:20px;">
                        F
                    </div>

                    <p class="mb-0 mt-2">Faril Hana</p>
                    <small>Admin</small>
                </div>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Settings
                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>

            </div>
        </li>

    </ul>

</nav>
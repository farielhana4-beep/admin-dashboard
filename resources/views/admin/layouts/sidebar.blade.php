<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- BRAND --}}
    <a href="{{ route('dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" 
                       class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- USERS --}}
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" 
                       class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>

                {{-- PRODUCTS --}}
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" 
                       class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Products</p>
                    </a>
                </li>

                {{-- EXPERIENCE --}}
                <li class="nav-item">
                    <a href="{{ route('experiences.index') }}" 
                       class="nav-link {{ request()->is('experiences*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Experience</p>
                    </a>
                </li>

                {{-- HERO --}}
                <li class="nav-item">
                    <a href="{{ route('hero.index') }}" 
                       class="nav-link {{ request()->is('hero*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-rocket"></i>
                        <p>Hero Section</p>
                    </a>
                </li>

                {{-- ABOUT --}}
                <li class="nav-item has-treeview {{ request()->is('about*') || request()->is('skills*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('about*') || request()->is('skills*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            About Me
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('about.index') }}" 
                               class="nav-link {{ request()->is('about*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Description</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('skills.index') }}" 
                               class="nav-link {{ request()->is('skills*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Skills</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- PROJECT --}}
                <li class="nav-item has-treeview {{ request()->is('portfolios*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('portfolios*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-code"></i>
                        <p>
                            My Projects
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('portfolios.index') }}" 
                               class="nav-link {{ request()->is('portfolios*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- 🔥 CONTACT (SUDAH AKTIF) --}}
                <li class="nav-item">
                    <a href="{{ route('contact.index') }}"
                       class="nav-link {{ request()->is('contact-admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Contact</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

</aside>
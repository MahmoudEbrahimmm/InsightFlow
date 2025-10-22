    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">{{ Auth::user()->name ?? 'Admin-name' }}</div>
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Pages</div>
            <a class="nav-link" href="{{ route('dashboard.users.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Users
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Layouts
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="#">Static Navigation</a>
                    <a class="nav-link" href="#">Light Sidenav</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Authentication"
                aria-expanded="false" aria-controls="Authentication">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Authentication
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="Authentication" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <li><a type="submit" class="nav-link">Logout</a></li>
                    </form>
                </nav>
            </div>

        </div>
    </div>

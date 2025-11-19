    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">{{ Auth::user()->name ?? 'name' }}</div>
            @if(auth()->user()->role === 'admin')
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                {{ __('messages.dashboard') }}
            </a>
            <div class="sb-sidenav-menu-heading">{{ __('messages.pages') }}</div>
            <a class="nav-link" href="{{ route('dashboard.users.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                {{ __('messages.users') }}
            </a>
            <a class="nav-link" href="{{ route('dashboard.categories.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i></div>
                {{ __('messages.categories') }}
            </a>
            @endif
            <a class="nav-link" href="{{ route('dashboard.posts.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-image"></i></div>
                {{ __('messages.posts') }}
            </a>
            
            @if(auth()->user()->role === 'admin')
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Authentication"
                aria-expanded="false" aria-controls="Authentication">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                {{ __('messages.authentication') }}
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="Authentication" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <li><a type="submit" class="nav-link">{{ __('auth.logout') }}</a></li>
                    </form>
                </nav>
            </div>
            <a class="nav-link" href="{{ route('settings') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                {{ __('messages.settings') }}
            </a>
            @endif

        </div>
    </div>

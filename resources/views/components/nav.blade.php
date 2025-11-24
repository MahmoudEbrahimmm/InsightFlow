    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('home') }}">{{ __('messages.home') }}</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Nav-bar left -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">{{ __('messages.home') }}</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="langDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-earth-americas"></i> {{ strtoupper(app()->getLocale()) }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}"
                                href="{{LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>


        </ul>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @if(auth()->user()->role === 'admin')
                    <li><a class="dropdown-item" href="{{ route('dashboard.index') }}"><i
                                class="fas fa-tachometer-alt"></i> {{ __('messages.dashboard') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('settings') }}"><i class="fa-solid fa-gear"></i>
                            {{ __('messages.settings') }}</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <li><button type="submit" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i>
                                {{ __('auth.logout') }}</button></li>
                    </form>
                </ul>
            </li>
        </ul>
    </nav>

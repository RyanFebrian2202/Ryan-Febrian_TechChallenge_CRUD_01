<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="logo">
            <a class="navbar-brand" href="{{route('landingPage')}}"><i class="uil uil-images"></i>Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('landingPage') }}"><i class="uil uil-home me-1"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("contactPage")}}"><i class="uil uil-at"></i> Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('explorePage')}}"><i class="uil uil-search"></i> Explore</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getRegisterPage')}}"><i
                                class="uil uil-user-plus me-1"></i>Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getLoginPage')}}"><i class="uil uil-user me-1"></i>Login</a>
                    </li>
                @else
                    @if (Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('adminPicture')}}">
                                <i class="uil uil-images"></i>
                                Manage Pictures
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('getManageTag')}}">
                                <i class="uil uil-tag"></i>
                                Manage Tags
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('getUserPage')}}">
                                <i class="uil uil-user me-1"></i>
                                Manage Users
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('memberManage')}}">
                                <i class="uil uil-images"></i>
                                Manage Pictures
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="uil uil-user me-1"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

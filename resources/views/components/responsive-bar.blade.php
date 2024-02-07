<nav class="navbar navbar-expand-lg d-lg-none bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">SocialApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <div class="offcanvas-title row" id="offcanvasNavbarLabel">
                    <div class="col-5">
                        <x-img-avatar width="100" height="100" :user="$user" />
                    </div>
                    <div class="col-7 my-auto">
                        <a href="/{{$user->username}}" style="text-decoration: none;color: black;">
                            <div>{{$user->username}}</div>
                            <div>{{$user->fullname}}</div>
                        </a>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-center fs-4 fw-semibold">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/notifications">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/create-post">Create Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/explore">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/settings">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

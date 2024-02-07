<div class="container-fluid">
    <div class="row flex-nowrap">
        <x-responsive-bar :user="Auth::user()" />
        <x-sidenavbar />
        <x-timeline :post="$post" />

        <div class="col-3 d-none d-lg-block">
            <div class="mt-4">
                <div class="row pt-3">
                    <div class="col-2 my-auto">
                        <x-img-avatar width="55" height="55" :user="$user" />
                    </div>
                    <div class="col-6 my-auto mt-2">
                        <a href="/{{ $user->username }}" class="text-decoration-none fw-medium text-body-emphasis" style="font-size:17px;">{{ $user->username }}</a>
                        <p class="text-body-secondary" style="font-size:14px;">{{ $user->fullname }}</p>
                    </div>
                    <div class="col-4 my-auto">
                        <a type="button" class="btn btn-outline-secondary"  href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="row mt-4">
                    {{-- <h6 class="mb-3">Suggested For you "On progess"</h6>
                    @foreach($alluser as $user)
                    <div class="col-2">
                        <x-img-avatar width="40" height="40" :user="$user" />
                    </div>
                    <div class="col-7">
                        <a href="/{{ $user->username }}" class="text-decoration-none fs-5 fw-medium text-body-emphasis">{{ $user->username }}</a>
                        <p class="text-body-secondary">{{ $user->fullname }}</p>
                    </div>
                    <div class="col-3">
                        follow
                    </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>

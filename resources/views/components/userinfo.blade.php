<div class="col-12 col-lg-10">
    <div class="container pt-lg-5" style="padding-top: 80px;">
        <div class="row">
            <div class="col-4">
                <x-img-avatar class="mx-auto my-auto d-block" id="avatar-profile" width="170" height="170" :user="$user" />
            </div>
            <div class="col-8">
                <div class="d-none d-lg-block">
                    <span class="mb-3">{{ $user->username }}</span>
                    @if($user->id == Auth::user()->id)
                    <button type="button" class="btn btn-light">
                        <a href="/settings">Edit Profile</a>
                    </button>
                    @else
                    <button type="button" class="btn btn-light " onclick="follow({{$user->id}}, this)">
                        {{ (Auth::user()->following->contains($user->id) ? 'unfollow' : 'follow') }}
                    </button>
                    <button type="button" class="btn btn-light ">Messages</button>
                    @endif
                </div>
                <span class="user-data-info">{{ $user->posts()->count() }} Post</span>
                <span class="mx-1 mx-md-5 user-data-info" data-bs-toggle="modal" data-bs-target="#userlist-following">{{ $user->following()->count() }} following</span>
                <span data-bs-toggle="modal" data-bs-target="#userlist-follower" class="user-data-info">{{ $user->follower()->count() }} followers</span>
                <x-user-list :user="$user" />
                <div class="d-block d-lg-none mt-md-3 fw-semibold username">{{ $user->username }}</div>
                <div class="mt-md-3 fw-md-semibold fullname">{{ $user->fullname }}</div>
                <div class="user-detail text-body-secondary">Male</div>
                <span class="user-detail fw-medium">{{ $user->address }}</span>
                <p class="user-detail">{{ $user->bio }}</p>
            </div>
            <div class="d-lg-none d-grid col-12 mx-auto">
                @if($user->id == Auth::user()->id)
                <a class="btn btn-dark" href="/settings" role="button">Edit Profile</a>
                @else
                <button type="button" class="btn btn-dark" onclick="follow({{$user->id}}, this)">
                    {{ (Auth::user()->following->contains($user->id) ? 'unfollow' : 'follow') }}
                </button>
                @endif
            </div>
            <div id="post-section">
                <ul class="nav nav-tabs justify-content-center pt-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Post</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Saved</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="row pt-4">
                            @foreach($user->posts as $posts)
                            <x-photo-grid :posts="$posts" />
                            <x-comment-detail :posts="$posts" />
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="row pt-4">
                            @foreach($user->savedposts as $posts)
                            <x-photo-grid :posts="$posts" />
                            <x-comment-detail :posts="$posts" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

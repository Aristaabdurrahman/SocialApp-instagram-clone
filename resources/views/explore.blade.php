<div class="container-fluid">
    <div class="row flex-nowrap">
        <x-responsive-bar :user="Auth::user()" />
        <x-sidenavbar />
        <div class="col-12 col-lg-10">
            <div class="container pt-lg-5" style="padding-top: 80px;">
                <div class="row ">
                    <div class="col-12 col-lg-9 mx-auto">
                        <form action="/search" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="search-explore">
                                <input class="btn btn-outline-secondary" type="submit" value="Search" id="search-explore">
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                @isset($searchQuery)
                Result of <b>{{$searchQuery}}</b>
                @endisset
                <div class="row pt-2">
                    @foreach($post as $posts)
                        <x-photo-grid  :posts="$posts" />
                        <x-comment-detail :posts="$posts" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


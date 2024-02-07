<div class="col-12 col-lg-7">
    <div class="container pt-lg-5" style="padding-top: 80px;">
        <div class="row">
            <div class="col-12 col-lg-9 mx-auto">
                @foreach($post as $posts)
                <div class="card border-light">
                    <div class="card-header my-auto">
                        <x-img-avatar  width="30" height="30" :user="$posts->user"/>
                        <a href="/{{$posts->user->username}}" class="ms-1 me-2" style="text-decoration:none;color:black;">{{$posts->user->username}}</a>
                        <small class="text-body-secondary">{{$posts->created_at->diffForHumans()}}</small>
                        @if($posts->user_id == Auth::user()->id)
                            <div class="float-end">
                                <a href="/edit-post" class="fs-6 fw-bold text-black" style="text-decoration:none;">
                                    <span>.</span>
                                    <span>.</span>
                                    <span>.</span>
                                </a>
                            </div>
                        @else
                            <div class="float-end">
                                <p onclick="follow({{$posts->user_id}}, this)">
                                    {{ (Auth::user()->following->contains($posts->user_id) ? 'unfollow' : 'follow') }}
                                </p>
                            </div>
                        @endif
                    </div>
                    <img src="{{ asset('images/postcontent/'. $posts->content) }}" class="card-img-top" alt="{{$posts->user->username}} Content">
                    <div class="card-body">
                        <h5 class="card-title">
                            <span onclick="like({{$posts->id}}, this, 'POST')">
                                {{ ($posts->is_liked() ? 'unlike' : 'like') }}                 
                            </span>
                            <span onclick="savedPost({{$posts->id}}, this)">
                                {{ (Auth::user()->savedposts->contains($posts->id) ? 'Unsave' : 'Save') }}                
                            </span>
                        </h5>
                        <div class="card-text">
                            <x-like-detail :posts="$posts" />
                            <div class="" style="font-size:14px;">
                                <span class="fw-bolder">{{$posts->user->username}}</span>
                                <span class="captions">{{$posts->caption}}</span>
                            </div>
                        </div>
                        <p class="card-text"><small class="text-body-secondary" data-bs-toggle="modal" data-bs-target="#commentlist-{{$posts->id}}">View All Comment</small></p>
                        <x-comment-detail :posts="$posts" />
                        <form action="/{{$posts->id}}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="timeline">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="body" placeholder="Create a comment..." aria-label="Create a comment..." aria-describedby="submit">
                                <input class="btn btn-outline-secondary" type="submit" value="comment" id="submit">
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
                <script>
                document.querySelectorAll(".captions").forEach(function (el) {
                    let renderText = el.innerHTML.replace(/#(\w+)/g, "<a href='/search?search=%23$1'>#$1</a>");
                    el.innerHTML = renderText;
                });
                </script>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="commentlist-{{$posts->id}}" tabindex="-1" aria-labelledby="commentlis-{{$posts->id}}tLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="commentlist-{{$posts->id}}Label">Post by {{$posts->user->username}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <img src="{{ asset('images/postcontent/'. $posts->content) }}" class="post-detail" alt="{{$posts->user->username}} Content">
                    </div>
                    <div class="col-12 col-lg-5 position-relative">
                        <span class="fw-bolder"><a href="{{$posts->user->username}}">{{$posts->user->username}}</a></span>
                        <span class="captions">{{$posts->caption}}</span>
                        <hr>
                        @foreach($posts->comment as $comments)
                        <p>
                            <span class="fw-bolder"><a href="{{$comments->user->username}}">{{$comments->user->username}}</a></span>
                            {{$comments->body}}
                            <br>
                            <span id="comment-like-count-{{$comments->id}}">
                                {{ $comments->like()->count() }}
                            </span>
                            <span onclick="like({{$comments->id}}, this, 'COMMENT')">
                                {{ ($comments->is_liked() ? 'unlike' : 'like') }}
                            </span>
                            <span>Reply</span>
                            <br>
                            {{$comments->created_at->diffForHumans()}}
                        </p>
                        @endforeach
                        <form action="/{{$posts->id}}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="comment">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="body" placeholder="Create a comment..." aria-label="Create a comment..." aria-describedby="submit">
                                <input class="btn btn-outline-secondary" type="submit" value="comment" id="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll(".captions").forEach(function(el) {
        let renderText = el.innerHTML.replace(/#(\w+)/g, "<a href='/search?search=%23$1'>#$1</a>");
        el.innerHTML = renderText;
    });

</script>

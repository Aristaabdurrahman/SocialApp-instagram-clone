<div class="col-4 padding-photo" data-bs-toggle="modal" data-bs-target="#commentlist-{{$posts->id}}">
    <div class="user-post-wrap position-relative">
        <img src="{{ asset('images/postcontent/'. $posts->content) }}" id="" class="user-post" alt="{{$posts->user->username}} content">
        <span class="position-absolute user-post-detail fw-light">{{ $posts->like()->count() }} Likes {{ $posts->comment()->count() }} Comment</span>
    </div>
</div>
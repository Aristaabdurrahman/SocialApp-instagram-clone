<div id = "post-like-count-{{$posts->id}}" class="like-timeline" style="font-size:13px;" data-bs-toggle="modal" data-bs-target="#likelist-{{$posts->id}}">
    {{ $posts->like()->count() }} likes
</div>
<div class="modal fade" id="likelist-{{$posts->id}}" tabindex="-1" aria-labelledby="likelist-{{$posts->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="likelist-{{$posts->id}}Label">like by</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    {{-- <tbody>
                        @foreach($posts->like as $likes)
                        @php
                            dd($likes->likeable)
                        @endphp
                        <tr>
                            <td class="col-2">
                                <img src="{{ asset('images/avatar/'. $likes->user_id->avatar) }}" id="profile-picture-like" class="rounded-circle" alt="{{ $likes->user_id->username }} Avatar">
                            </td>
                            <td class="col-10">
                                <a href="/{{$likes->user_id->username}}" style="text-decoration:none;color:black;">{{$likes->user_id->username}}</a>
                                <br>
                                <small class="text-body-secondary">{{$likes->user_id->fullname}}</small>
                            </td>
                            <td class="col-3">
                                                            <p onclick="follow({{$posts->user_id}}, this)">
                            {{ (Auth::user()->following->contains($posts->user_id) ? 'unfollow' : 'follow') }}
                            </p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
</div>

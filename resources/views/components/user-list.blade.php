<div class="modal fade" id="userlist-following" tabindex="-1" aria-labelledby="userlist-followingLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="userlist-followingLabel">List Following</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        @foreach($user->following->sortByDesc('id') as $following_list)
                        <tr>
                            <td class="col-2">
                                <img src="{{ asset('images/avatar/'. $following_list->avatar) }}" id="profile-picture-like" class="rounded-circle" alt="{{ $following_list->username }} Avatar">
                            </td>
                            <td class="col-10 pt-3">
                                <a href="/{{$following_list->username}}" style="text-decoration:none;color:black;">{{$following_list->username}}</a>
                                <br>
                                <small class="text-body-secondary">{{$following_list->fullname}}</small>
                            </td>
                            <td class="col-3 pt-4">
                                @if(Auth::user()->id != $following_list->id)
                                <p type="button" class="btn" onclick="follow({{$following_list->id}}, this)">
                                    {{ (Auth::user()->following->contains($following_list->id) ? 'unfollow' : 'follow') }}
                                </p>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userlist-follower" tabindex="-1" aria-labelledby="userlist-followerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="userlist-followerLabel">List Follower</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        @foreach($user->follower as $follower_list)
                        <tr>
                            <td class="col-2">
                                <img src="{{ asset('images/avatar/'. $follower_list->avatar) }}" id="profile-picture-like" class="rounded-circle" alt="{{ $follower_list->username }} Avatar">
                            </td>
                            <td class="col-10 pt-3">
                                <a href="/{{$follower_list->username}}" style="text-decoration:none;color:black;">{{$follower_list->username}}</a>
                                <br>
                                <small class="text-body-secondary">{{$follower_list->fullname}}</small>
                            </td>
                            <td class="col-3">
                                @if(Auth::user()->id != $follower_list->id)
                                <p onclick="follow({{$follower_list->id}}, this)">
                                    {{ (Auth::user()->following->contains($follower_list->id) ? 'unfollow' : 'follow') }}
                                </p>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

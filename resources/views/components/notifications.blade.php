<div class="col-12 col-lg-10 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto pt-5">
                <ul class="list-group list-group-flush">
                    @foreach($notification as $notif)
                        <li class="list-group-item {{ ($notif->seen) ?  '' : 'list-group-item-primary' }}">
                            {{$notif->text}}
                            <img src="{{ asset('images/postcontent/'. $notif->post->content) }}" alt="" class="" width="75" height="50">
                            <br>
                            <small>{{$notif->created_at->diffForHumans()}}</small>                           
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    fetch('/notificationSeen').then(response => response.json())
</script>
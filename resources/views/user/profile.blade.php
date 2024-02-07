<div class="container-fluid">
    <div class="row flex-nowrap">
        <x-responsive-bar :user="Auth::user()" />
        <x-sidenavbar />
        <x-userinfo :user="$user" />
    </div>
</div>
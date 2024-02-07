<div class="container-fluid">
    <div class="row flex-nowrap">
        <x-responsive-bar :user="Auth::user()" />
        <x-sidenavbar />
        <div class="col-12 col-lg-7">
            <div class="container pt-lg-5" style="padding-top: 80px;">
                <div class="row mx-auto ">
                    <h2 class="text-center mb-5">Edit Profile</h2>
                    <form action="/settings/edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-forms.input label="Username" name="username" type="text" :user="$user" />
                        <x-forms.input label="Fullname" name="fullname" type="text" :user="$user" />
                        <x-forms.files label="Avatar" name="avatar" type="file" />
                        <x-forms.input label="Bio" name="bio" type="text" :user="$user" />
                        <x-forms.input label="Address" name="address" type="text" :user="$user" />
                        <div class="d-grid col-12 col-lg-8 mx-auto">
                            <input type="submit" class="btn btn-dark" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <x-sidenavbar />
        <div class="col-7">
            <div class="container pt-5">
                <div class="row mx-auto ">
                    <form action="/home" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <x-forms.files label="Upload Picture" name="content" type="file" />
                            <x-forms.input label="Caption" name="caption" type="text" :user="$user" />
                            <input type="submit" class="btn" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
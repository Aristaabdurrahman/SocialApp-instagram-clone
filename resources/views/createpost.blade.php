<div class="container-fluid">
    <div class="row flex-nowrap">
        <x-responsive-bar :user="Auth::user()" />
        <x-sidenavbar />
        <div class="col-12 col-lg-7">
            <div class="container pt-lg-5" style="padding-top: 80px;">
                <div class="row mx-auto ">
                    <h2 class="text-center mb-5">Create Post</h2>
                    <form action="/" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="" id="preview-img" alt="">
                            </div>
                            <x-forms.files label="Upload Picture" name="content" type="file" />
                            <x-forms.post-input label="Caption" name="caption" type="text" />
                        </div>
                        <div class="modal-footer col-12">
                            <input type="submit" class="btn btn-dark" value="Create Post">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

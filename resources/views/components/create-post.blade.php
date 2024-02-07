<div class="modal fade" id="create-post" tabindex="-1" aria-labelledby="create-postLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create-postLabel">Create Post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="text-center">
                        <img src="" id="preview-img" alt="" >
                    </div>
                    <x-forms.files label="Upload Picture" name="content" type="file" />
                    <x-forms.post-input label="Caption" name="caption" type="text" />
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-dark" value="Create Post">
                </div>
            </form>
        </div>
    </div>
</div>



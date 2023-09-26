<?php

if (isset($_POST["uploadButton"])) {
  $upload = new UploadFunction($_FILES["image"], $_POST["description"]);
}

?>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog p-0">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="modal-body p-0" method="post" enctype="multipart/form-data">
        <section class="px-3 mt-3">
          <div class="mb-3">
            <label for="formFile" class="form-label">Add some photo</label>
            <input class="form-control" type="file" id="formFile" name="image">
          </div>
          <label class="mt-3">Add the description</label>
          <textarea style="resize: none;" rows="5" type="text" class="form-control mt-2" placeholder="Descriptions" name="description"></textarea>
        </section>
        <div class="col-12 modal-footer mt-3">
          <button class="btn btn-warning fw-bold text-light" name="uploadButton">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>
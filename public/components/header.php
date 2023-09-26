<header class="container-fluid bg-warning d-flex justify-content-center align-items-center py-3 position-fixed">
  <section class="container-lg d-flex flex-row justify-content-between align-items-center">
    <a href="#" class="fw-bold text-light m-0 h2 text-decoration-none">Meme</a>
    <div>
      <button class="btn btn-light rounded-2 fw-bolder text-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Upload</button>
      <a class="ms-3" href="">
        <img style="width: 40px;" class="img-fluid rounded-circle" src="<?php AssetFunction::asset("img/unknown.webp"); ?>" alt="">
      </a>
    </div>
  </section>
</header>

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
            <input class="form-control" type="file" id="formFile">
          </div>
          <label class="mt-3">Add the description</label>
          <textarea style="resize: none;" rows="5" type="text" class="form-control mt-2" placeholder="Descriptions"></textarea>
        </section>
        <div class="col-12 modal-footer mt-3">
          <button type="button" class="btn btn-warning fw-bold text-light" name="uploadButton">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>
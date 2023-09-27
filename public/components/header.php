<?php
$data = $datas->fetch_assoc();
?>
<header class="container-fluid bg-warning d-flex justify-content-center align-items-center py-3 position-fixed">
  <section class="container-lg d-flex flex-row justify-content-between align-items-center">
    <a href="http://localhost/meme/" class="fw-bold text-light m-0 h2 text-decoration-none">Meme</a>
    <div>
      <button class="btn btn-light rounded-2 fw-bolder text-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Upload</button>
      <a class="ms-3" href="http://localhost/meme/userprofil">
        <img style="width: 40px;" class="img-fluid rounded-circle" src="<?php AssetFunction::asset("img/post/" . $data["photoProfil"]); ?>" alt="">
      </a>
    </div>
  </section>
</header>
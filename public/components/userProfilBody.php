<main style="padding-top: 100px;" class="container-fluid pb-5">
  <section class="container-lg d-flex flex-column align-items-center">
    <?php foreach ($userData as $data) : ?>
      <img style="width: 150px; height: 150px;" class="img-fluid rounded-circle" src="<?php AssetFunction::asset("img/post/" . $data["photoProfil"]) ?>" alt="">
      <div class="d-flex flex-row align-items-center my-3">
        <p class="fs-5 fw-bold m-0"><?= $data["username"]; ?></p>
        <p class="bg-dark p-2 rounded-2 text-light m-0 ms-2"><?= $data["pronunciation"]; ?></p>
      </div>
    <?php endforeach; ?>
    <div class="row gy-4">
      <?php foreach ($userPosts as $userPost) : ?>
        <img class="col-4" style="object-fit: cover;" src="<?php AssetFunction::asset("img/post/" . $userPost["image"]) ?>" alt="">
      <?php endforeach; ?>
    </div>
  </section>
</main>
<main style="padding-top: 90px;" class="container-fluid row d-flex justify-content-center pb-5">
  <section class="col-5 row gap-5 d-flex justify-content-center">
    <?php foreach ($datas as $data) : ?>
      <div class="col-12 bg-light p-0 p-3 rounded-3 shadow">
        <a href="" class="d-flex flex-row align-items-center text-decoration-none">
          <img style="width: 40px;" class="img-fluid rounded-circle" src="<?php AssetFunction::asset("img/unknown.webp") ?>" alt="">
          <p class="m-0 ms-3 fw-bold text-dark"><?= $data["username"]; ?></p>
        </a>
        <div class="my-3 border border-1 border-secondary-subtle rounded-2 p-3">
          <img class="img-fluid w-100" src="<?php AssetFunction::asset("img/post/" . $data["image"]) ?>" alt="">
        </div>
        <p><?= $data["postDescription"]; ?></p>
        <p class="fw-bold"><?php
                            $date = new DateTime($data["dateTime"]);
                            echo $date->format("l, d F Y");
                            ?></p>
      </div>
    <?php endforeach; ?>
  </section>
</main>
<main style="padding-top: 100px;" class="container-fluid">
  <section class="container-lg d-flex flex-column align-items-center">
    <?php foreach ($detailPosts as $detailPost) : ?>
      <img class="img-fluid col-5" style="object-fit: cover;" src="<?php AssetFunction::asset("img/post/" . $detailPost["image"]) ?>" alt="">
      <form class="col-5 mt-3" action="" method="post">
        <textarea style="resize: none;" type="text" class="form-control w-100" placeholder="Descriptions" rows="2" name="newDescription"><?= $detailPost["postDescription"] ?></textarea>
        <div class="col-12 d-flex flex-row justify-content-between">
          <a href="http://localhost/meme/userprofil" class="col-3 btn btn-secondary rounded-2 py-2 fw-bold text-light mt-3">Batal</a>
          <button class="col-3 btn btn-danger rounded-2 py-2 fw-bold text-light mt-3" name="deleteBtn">Hapus</button>
          <button class="col-3 btn btn-warning rounded-2 py-2 fw-bold text-light mt-3" name="ubahBtn">Ubah</button>
        </div>
      </form>
    <?php endforeach; ?>
  </section>
</main>
<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<div class="top-shadow"></div>
<?php
foreach ($carosel as $value) { ?>

  <div class="inner-page">
    <div class="slider-item" style="background-image: url('images/<?= $value['gambar'] ?>');">
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-md-8 text-center col-sm-12 element-animate pt-5">
            <h1 class="pt-5"><span><?= $value['judul'] ?></span></h1>
            <p class="mb-5 w-75 pl-0"><?= $value['keterangan'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!-- END slider -->
</div>

<section class="section border-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-5 order-2">
        <form action="#" method="post">
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="name">Name</label>
              <input type="text" id="name" class="form-control ">
            </div>
            <div class="col-md-6 form-group">
              <label for="phone">Phone</label>
              <input type="text" id="phone" class="form-control ">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">

            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="email">Email</label>
              <input type="email" id="email" class="form-control ">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="message">Write Message</label>
              <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="submit" value="Send Message" class="btn btn-primary px-3 py-3">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6 order-2 mb-5">
        <div class="row justify-content-right">
          <div class="col-md-8 mx-auto contact-form-contact-info">

            <?php
            foreach ($kontak as $value) { ?>

              <p class="d-flex">
                <span class="ion-ios-location icon mr-5"></span>
                <span><?= $value['alamat'] ?></span>
              </p>

              <p class="d-flex">
                <span class="ion-ios-telephone icon mr-5"></span>
                <span><?= $value['nomor'] ?></span>
              </p>

              <p class="d-flex">
                <span class="ion-android-mail icon mr-5"></span>
                <span><?= $value['email'] ?></span>
              </p>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section bg-light block-11">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8 text-center">
        <h2 class=" heading mb-4">Testimoni</h2>
      </div>
    </div>
    <div class="nonloop-block-11 owl-carousel">
      <?php
      foreach ($testimoni as $value) { ?>

        <div class="item">
          <div class="block-33 h-100">
            <div class="vcard d-flex mb-3">
              <div class="image align-self-center"><img src="<?= '/images/' . $value['gambar']; ?>" alt="Person here"></div>
              <div class="name-text align-self-center">
                <h2 class="heading"><?= $value['nama'] ?></h2>
                <span class="meta"><?= $value['asal'] ?></span>
              </div>
            </div>
            <div class="text">
              <blockquote>
                <p>
                  &rdquo;
                  <?= $value['keterangan'] ?>
                  &ldquo;
                </p>
              </blockquote>
            </div>
          </div>
        </div>

      <?php } ?>
    </div>
  </div>
  </div>
  <!-- END .block-4 -->
</section>
<?= $this->endSection(); ?>
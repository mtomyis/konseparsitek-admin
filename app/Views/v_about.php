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

<section class="section bg-light">
  <div class="container">
    <div class="row">
      <?php
      foreach ($bidang as $value) { ?>

        <div class="col-md-6 col-lg-6 element-animate ">
          <div class="media block-6 d-block text-center">
            <div class="icon mb-3"><span class="ion-bookmark text-primary"></span></div>
            <div class="media-body">
              <h3 class="heading"><?= $value['judul'] ?></h3>
              <p><?= $value['keterangan'] ?></p>
            </div>
          </div>
        </div>

      <?php } ?>
      <!-- <div class="col-md-6 col-lg-4 element-animate ">
            <div class="media block-6 d-block text-center">
              <div class="icon mb-3"><span class="ion-bookmark text-primary"></span></div>
              <div class="media-body">
                <h3 class="heading">Automotive Parts</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>  

          </div>
          <div class="col-md-6 col-lg-4 element-animate ">
            <div class="media block-6 d-block text-center">
              <div class="icon mb-3"><span class="ion-heart text-primary"></span></div>
              <div class="media-body">
                <h3 class="heading">Maintenance Services</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div> 

          </div>
          <div class="col-md-6 col-lg-4 element-animate ">
            <div class="media block-6 d-block text-center">
              <div class="icon mb-3"><span class="ion-leaf text-primary"></span></div>
              <div class="media-body">
                <h3 class="heading">Green Energy</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div> 

          </div> -->
    </div>
  </div>
</section>
<!-- END section -->

<section class="section">
  <div class="container">
    <div class="row justify-content-center mb-5 element-animate">
      <div class="col-md-8 text-center">
        <h2 class="heading mb-4">Meet The Team</h2>
        <p class="mb-5 lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
      </div>
    </div>
    <div class="row">

      <?php
      foreach ($keluarga as $value) { ?>

        <div class="col-lg-3">
          <div class="media d-block media-custom text-center">
            <a target="_blank" rel="noopener noreferrer" href="<?= $value['sosmed'] ?>"><img src="images/<?= $value['gambar'] ?>" alt="Image Placeholder" class="img-fluid"></a>
            <div class="media-body">
              <h3 class="mt-0 text-black"><?= $value['nama'] ?></h3>
            </div>
          </div>
        </div>

      <?php } ?>

      <!-- <div class="col-lg-3">
        <div class="media d-block media-custom text-center">
          <a href="#"><img src="images/person_2.jpg" alt="Image Placeholder" class="img-fluid"></a>
          <div class="media-body">
            <h3 class="mt-0 text-black">Mike Roger</h3>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="media d-block media-custom text-center">
          <a href="#"><img src="images/person_4.jpg" alt="Image Placeholder" class="img-fluid"></a>
          <div class="media-body">
            <h3 class="mt-0 text-black">Jim Smith</h3>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="media d-block media-custom text-center">
          <a href="#"><img src="images/person_3.jpg" alt="Image Placeholder" class="img-fluid"></a>
          <div class="media-body">
            <h3 class="mt-0 text-black">Rich Gold</h3>
          </div>
        </div>
      </div> -->
    </div>

  </div>
</section>
<!-- END section -->

<!-- <section class="section bg-primary">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h2 class="text-white mb-0">Create, Enhance and Sustain</h2>
        <p class="text-white lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. .</p>
      </div>
      <div class="col-lg-4 text-lg-right">
        <a href="https://free-template.co/" class="btn btn-outline-white px-4 py-3">Download This Template</a>
      </div>
    </div>
  </div>
</section> -->

<?= $this->endSection(); ?>
<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<div class="top-shadow"></div>

<section class="home-slider owl-carousel">

    <?php
    foreach ($carosel as $value) { ?>
        <div class="slider-item" style="background-image: url('images/<?= $value['gambar'] ?>');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-lg-7 text-center col-sm-12 element-animate">
                        <div class="btn-play-wrap mx-auto">
                            <p class="mb-4"><a href="<?= $value['video'] ?>" data-fancybox data-ratio="2" class="btn-play"><span class="ion ion-ios-play"></span></a></p>
                        </div>
                        <h1 class="mb-4"><span><?= $value['judul'] ?></h1>
                        <p class="mb-5 w-75"><?= $value['keterangan'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <td><img src="<?= '/images/' . $value['gambar']; ?>" alt="" width="50"></td> -->
    <?php } ?>

    <!-- <div class="slider-item" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
                <div class="col-lg-7 text-center col-sm-12 element-animate">
                    <div class="btn-play-wrap mx-auto">
                        <p class="mb-4"><a href="https://vimeo.com/59256790" data-fancybox data-ratio="2" class="btn-play"><span class="ion ion-ios-play"></span></a></p>
                    </div>
                    <h1 class="mb-4"><span>Concept Design</h1>
                    <p class="mb-5 w-75">Menangani proyek proyek pembangunan mulai dari perencanaan sampai selesai pembangunan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item" style="background-image: url('images/hero_2.jpg');">
        <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
                <div class="col-lg-7 text-center col-sm-12 element-animate">
                    <div class="btn-play-wrap mx-auto">
                        <p class="mb-4"><a href="https://vimeo.com/59256790" data-fancybox data-ratio="2" class="btn-play"><span class="ion ion-ios-play"></span></a></p>
                    </div>
                    <h1><span></span></h1>
                    <p class="mb-5 w-75">
                    </p>
                </div>
            </div>
        </div>
    </div> -->

</section>
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
                    <div class="icon mb-3"><span class="ion-heart text-primary"></span></div>
                    <div class="media-body">
                        <h3 class="heading"></h3>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 element-animate ">
                <div class="media block-6 d-block text-center">
                    <div class="icon mb-3"><span class="ion-leaf text-primary"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Pengawasan</h3>
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
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2>Proyek Terbaru</h2>
            </div>
        </div>
        <div class="row align-items-stretch">
            <div class="col-lg-4 order-lg-1">
                <div class="h-100">
                    <div class="frame h-100">
                        <div class="feature-img-bg h-100" style="background-image: url('images/<?= $gambar_pekerjaan['gambar'] ?>');"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1">

                <?php
                foreach ($pekerjaan as $key => $value) { ?>
                    <?php if ($key == 0) {
                        echo
                            '<div class="feature-1 d-md-flex">
                                <div class="align-self-center">
                                    <span class="ion ion-leaf display-4 text-primary"></span>
                                    <h3>' . $value['judul'] . '</h3>
                                    <p>' . $value['keterangan'] . '</p>
                                </div>
                            </div>';
                    } else {
                        echo "";
                    } ?>
                <?php } ?>

                <?php
                foreach ($pekerjaan as $key => $value) { ?>
                    <?php if ($key == 1) {
                        echo
                            '<div class="feature-1 d-md-flex">
                                <div class="align-self-center">
                                    <span class="ion ion-android-bulb display-4 text-primary"></span>
                                    <h3>' . $value['judul'] . '</h3>
                                    <p>' . $value['keterangan'] . '</p>
                                </div>
                            </div>';
                    } else {
                        echo "";
                    } ?>
                <?php } ?>

            </div>

            <div class="col-md-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3">

                <?php
                foreach ($pekerjaan as $key => $value) { ?>
                    <?php if ($key == 2) {
                        echo
                            '<div class="feature-1 d-md-flex">
                                <div class="align-self-center">
                                    <span class="ion ion-alert-circled display-4 text-primary"></span>
                                    <h3>' . $value['judul'] . '</h3>
                                    <p>' . $value['keterangan'] . '</p>
                                </div>
                            </div>';
                    } else {
                        echo "";
                    } ?>
                <?php } ?>

                <?php
                foreach ($pekerjaan as $key => $value) { ?>
                    <?php if ($key == 3) {
                        echo
                            '<div class="feature-1 d-md-flex">
                                <div class="align-self-center">
                                    <span class="ion ion-android-happy display-4 text-primary"></span>
                                    <h3>' . $value['judul'] . '</h3>
                                    <p>' . $value['keterangan'] . '</p>
                                </div>
                            </div>';
                    } else {
                        echo "";
                    } ?>
                <?php } ?>

            </div>

        </div>
    </div>
</section>

<section class="section element-animate">
    <?php
    foreach ($ringkasan as $value) { ?>
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-7 order-md-2">
                    <div class="">
                        <div class="frame"><img src="<?= '/images/' . $value['gambar']; ?>" alt="Image" class="img-fluid"></div>
                    </div>
                </div>
                <div class="col-md-5 pr-md-5 mb-5">
                    <div class="block-41">
                        <h2 class="block-41-heading mb-5"><?= $value['judul'] ?></h2>
                        <div class="block-41-text">
                            <p><?= $value['keterangan'] ?></p>
                            <p><a href="<?= base_url('/about') ?>" class="readmore">Read More <span class="ion-android-arrow-dropright-circle"></span></a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php } ?>
</section>

<section class="section border-t pb-0">
    <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-8 text-center">
                <h2 class=" heading mb-4">Proyek Lainnya</h2>
                <p class="mb-5 lead"></p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row no-gutters">

            <?php
            foreach ($pekerjaan_lain as $value) { ?>
                <div class="col-md-4 element-animate">
                    <a href="<?= base_url('/detail/'.$value['id']) ?>" class="link-thumbnail">
                        <h3><?= $value['judul']; ?></h3>
                        <span class="ion-plus icon"></span>
                        <img src="<?= '/images/' . $value['gambar']; ?>" alt="Image" class="img-fluid">
                    </a>
                </div>
            <?php } ?>

            <!-- <div class="col-md-4 element-animate">
                <a href="project-single.html" class="link-thumbnail">
                    <h3>Tanks Project In California</h3>
                    <span class="ion-plus icon"></span>
                    <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                </a>
            </div>
            <div class="col-md-4 element-animate">
                <a href="project-single.html" class="link-thumbnail">
                    <h3>Structural Design in New York</h3>
                    <span class="ion-plus icon"></span>
                    <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                </a>
            </div>
            <div class="col-md-4 element-animate">
                <a href="project-single.html" class="link-thumbnail">
                    <h3>Stacks Design</h3>
                    <span class="ion-plus icon"></span>
                    <img src="images/img_4.jpg" alt="Image" class="img-fluid">
                </a>
            </div>
            <div class="col-md-4 element-animate">
                <a href="project-single.html" class="link-thumbnail">
                    <h3>Intercate Custom</h3>
                    <span class="ion-plus icon"></span>
                    <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                </a>
            </div>
            <div class="col-md-4 element-animate">
                <a href="project-single.html" class="link-thumbnail">
                    <h3>Banker Design</h3>
                    <span class="ion-plus icon"></span>
                    <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                </a>
            </div> -->

        </div>

    </div>
</section>
<!-- END section -->

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

            <!-- <div class="item">
                <div class="block-33 h-100">
                    <div class="vcard d-flex mb-3">
                        <div class="image align-self-center"><img src="images/person_2.jpg" alt="Person here"></div>
                        <div class="name-text align-self-center">
                            <h2 class="heading">Joshua Darren</h2>
                            <span class="meta">Companies Client</span>
                        </div>
                    </div>
                    <div class="text">
                        <blockquote>
                            <p>&rdquo; Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. &ldquo;</p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="block-33 h-100">
                    <div class="vcard d-flex mb-3">
                        <div class="image align-self-center"><img src="images/person_3.jpg" alt="Person here"></div>
                        <div class="name-text align-self-center">
                            <h2 class="heading">John Smith</h2>
                            <span class="meta">Companies Client</span>
                        </div>
                    </div>
                    <div class="text">
                        <blockquote>
                            <p>&rdquo; A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. &ldquo;</p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="block-33 h-100">
                    <div class="vcard d-flex mb-3">
                        <div class="image align-self-center"><img src="images/person_3.jpg" alt="Person here"></div>
                        <div class="name-text align-self-center">
                            <h2 class="heading">John Smith</h2>
                            <span class="meta">Companies Client</span>
                        </div>
                    </div>
                    <div class="text">
                        <blockquote>
                            <p>&rdquo; Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. &ldquo;</p>
                        </blockquote>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
    </div>
    <!-- END .block-4 -->
</section>

<!-- <section class="section blog">
    <div class="container">

        <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-8 text-center">
                <h2 class=" heading mb-4">Blog Posts</h2>
                <p class="mb-5 lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">

                <div class="media mb-4 d-md-flex d-block element-animate">
                    <a href="single.html" class="mr-5"><img src="images/img_2.jpg" alt="Free website template by Free-Template.co" class="img-fluid"></a>
                    <div class="media-body">
                        <span class="post-meta">Feb 26th, 2018</span>
                        <h3 class="mt-2 text-black"><a href="single.html">Separated they live in Bookmarksgrove right</a></h3>
                        <p><a href="single.html" class="readmore">Read More <span class="ion-android-arrow-dropright-circle"></span></a></p>
                    </div>
                </div>

                <div class="media mb-4 d-md-flex d-block element-animate">
                    <a href="single.html" class="mr-5"><img src="images/img_3.jpg" alt="Free website template by Free-Template.co" class="img-fluid"></a>
                    <div class="media-body">
                        <span class="post-meta">Feb 26th, 2018</span>
                        <h3 class="mt-2 text-black"><a href="single.html">Separated they live in Bookmarksgrove right</a></h3>
                        <p><a href="single.html" class="readmore">Read More <span class="ion-android-arrow-dropright-circle"></span></a></p>
                    </div>
                </div>


            </div>
            <div class="col-md-6">
                <div class="media mb-4 d-md-flex d-block element-animate">
                    <a href="single.html" class="mr-5"><img src="images/img_2.jpg" alt="Free website template by Free-Template.co" class="img-fluid"></a>
                    <div class="media-body">
                        <span class="post-meta">Feb 26th, 2018</span>
                        <h3 class="mt-2 text-black"><a href="single.html">Separated they live in Bookmarksgrove right</a></h3>
                        <p><a href="single.html" class="readmore">Read More <span class="ion-android-arrow-dropright-circle"></span></a></p>
                    </div>
                </div>

                <div class="media mb-4 d-md-flex d-block element-animate">
                    <a href="single.html" class="mr-5"><img src="images/img_3.jpg" alt="Free website template by Free-Template.co" class="img-fluid"></a>
                    <div class="media-body">
                        <span class="post-meta">Feb 26th, 2018</span>
                        <h3 class="mt-2 text-black"><a href="single.html">Separated they live in Bookmarksgrove right</a></h3>
                        <p><a href="single.html" class="readmore">Read More <span class="ion-android-arrow-dropright-circle"></span></a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="section bg-primary">
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
<?= $this->endSection() ?>
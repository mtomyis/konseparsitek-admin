<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>

<div class="top-shadow"></div>

<?php
foreach ($carosel as $value) { ?>

    <div class="inner-page">
        <div class="slider-item" style="background-image: url('/images/<?= $value['gambar'] ?>');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate pt-5">
                        <h1 class="pt-5">Detail Proyek</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- END slider -->
</div>

<section class="section border-t pb-0">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row justify-content-center element-animate">
                    <div class="col-lg-8 col-sm-12">
                        <!-- <div class="h-80">
                            <div class="frame h-80"> -->
                        <section class="home-slider owl-carousel">
                            <div class="slider-item" style="background-image: url('/images/<?= $pekerjaan['gambar'] ?>');"></div>
                            <div class="slider-item" style="background-image: url('/images/<?= $pekerjaan['gambar2'] ?>');"></div>
                            <div class="slider-item" style="background-image: url('/images/<?= $pekerjaan['gambar3'] ?>');"></div>

                        </section>
                    </div>
                    <!-- </div>
                    </div> -->
                    <div class="col-lg-4 col-sm-12">
                        <div class="project_details_content">
                            <h3><?= $pekerjaan['judul']; ?></h3>
                            <p><?= $pekerjaan['keterangan']; ?></p>
                        </div>
                        <div class="project_details_widget">
                            <div class="single_project_details_widget">
                                <span class="ti-time"></span>
                                <h5>Waktu Pelaksanaan</h5>
                                <?php function tglindo($date)
                                {
                                    if ($date == "0000-00-00") {
                                        $result = 'On Progress';
                                    } else {
                                        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                        $tahun = substr($date, 0, 4);
                                        $bulan = substr($date, 5, 2);
                                        $tgl   = substr($date, 8, 2);
                                        $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
                                    }
                                    return $result;
                                }
                                $tanggal_awal = tglindo($pekerjaan['tanggal_awal']);
                                $tanggal_akhir = tglindo($pekerjaan['tanggal_akhir']);
                                ?>
                                <h6><?= $tanggal_awal ?> Sampai <?= $tanggal_akhir ?></h6>
                            </div>
                            <div class="single_project_details_widget">
                                <span class="ti-check-box"></span>
                                <h5>Nama Client</h5>
                                <h6><?= $pekerjaan['klien']; ?></h6>
                            </div>
                            <div class="single_project_details_widget">
                                <span class="ti-location-pin"></span>
                                <h5>Jenis Pekerjaan</h5>
                                <p><?= $pekerjaan['kategori']; ?></p>
                            </div>
                            <div class="single_project_details_widget">
                                <span class="ti-location-pin"></span>
                                <h5>Lokasi</h5>
                                <p><?= $pekerjaan['lokasi']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        </div>
    </div>
    </div>
    <!-- END .block-4 -->
</section>

<?= $this->endSection(); ?>
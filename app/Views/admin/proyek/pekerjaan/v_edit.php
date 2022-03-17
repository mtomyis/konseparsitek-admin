<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail</h1>
        </div>
        <form method="POST" action="<?= base_url('C_proyek/pekerjaan_saveedit/' . $data['id']) ?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Pekerjaan</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="hidden" name="id" class="form-control" value="<?= $data['id'] ?>">
                                <input type="hidden" name="oldgambar" class="form-control" value="<?= $data['gambar'] ?>">
                                <input type="hidden" name="oldgambar2" class="form-control" value="<?= $data['gambar2'] ?>">
                                <input type="hidden" name="oldgambar3" class="form-control" value="<?= $data['gambar3'] ?>">
                                <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" value="<?= $data['lokasi'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori">
                                    <option value="<?= $data['kategori'] ?>"><?= $data['kategori'] ?></option>
                                    <option value="Perencanaan Jalan">Perencanaan Jalan</option>
                                    <option value="Pengawasan Jalan">Pengawasan Jalan</option>
                                    <option value="Perencanaan Pengairan">Perencanaan Pengairan</option>
                                    <option value="Pengawasan Pengairan">Pengawasan Pengairan</option>
                                    <option value="Perencanaan Gedung">Perencanaan Gedung</option>
                                    <option value="Pengawasan Gedung">Pengawasan Gedung</option>
                                    <option value="Konsultansi Perencanaan Non Konstruksi">Konsultansi Perencanaan Non Konstruksi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Klien</label>
                                <input type="text" name="klien" class="form-control" value="<?= $data['klien'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input name="tanggal_awal" type="date" class="form-control" value="<?= $data['tanggal_awal'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input name="tanggal_akhir" type="date" class="form-control" value="<?= $data['tanggal_akhir'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea rows="4" class="form-control" name="keterangan"><?= $data['keterangan'] ?></textarea>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-sm btn-icon btn-warning" href="<?= base_url('/proyek_pekerjaan') ?>">Kembali</a>
                            <!-- <a class="btn btn-sm btn-icon btn-success" type="submit">Simpan</a> -->

                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div id="lightgallery1">
                                    <a href="/images/<?= $data['gambar'] ?>">
                                        <img src="/images/<?= $data['gambar']; ?>" alt="" width="100%">
                                    </a>
                                </div>
                                <!-- <img src="<?= '/images/' . $data['gambar']; ?>" alt="" width="100%"> -->
                            </div>
                            <div class="custom-file mb-2">
                                <input id="gambar" type="file" name="gambar" class="form-control custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                                <label class="custom-file-label" for="gambar">Ganti gambar 1</label>
                            </div>
                            <div class="form-group">
                                <div id="lightgallery2">
                                    <a href="/images/<?= $data['gambar2'] ?>">
                                        <img src="/images/<?= $data['gambar2']; ?>" alt="" width="100%">
                                    </a>
                                </div>
                                <!-- <img src="<?= '/images/' . $data['gambar2']; ?>" alt="" width="100%"> -->
                            </div>
                            <div class="custom-file mb-2">
                                <input id="gambar2" type="file" name="gambar2" class="form-control custom-file-input <?= ($validation->hasError('gambar2')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar2'); ?>
                                </div>
                                <label class="custom-file-label" for="gambar2">Ganti gambar 2</label>
                            </div>
                            <div class="form-group">
                                <div id="lightgallery3">
                                    <a href="/images/<?= $data['gambar3'] ?>">
                                        <img src="/images/<?= $data['gambar3']; ?>" alt="" width="100%">
                                    </a>
                                </div>
                                <!-- <img src="<?= '/images/' . $data['gambar3']; ?>" alt="" width="100%"> -->
                            </div>
                            <div class="custom-file mb-2">
                                <input id="gambar3" type="file" name="gambar3" class="form-control custom-file-input <?= ($validation->hasError('gambar3')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar3'); ?>
                                </div>
                                <label class="custom-file-label" for="gambar3">Ganti gambar 3</label>
                            </div>
                            <br>
                            <a href="/assets/template_proyek.psd">Unduh template foto proyek</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#lightgallery1").lightGallery({
            thumbnail:true,
            animateThumb: false,
            showThumbByDefault: false
        });
        $("#lightgallery2").lightGallery({
            thumbnail:true,
            animateThumb: false,
            showThumbByDefault: false
        });
        $("#lightgallery3").lightGallery({
            thumbnail:true,
            animateThumb: false,
            showThumbByDefault: false
        });
    });
</script>

<?= $this->endSection() ?>
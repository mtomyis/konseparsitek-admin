<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail</h1>
        </div>
        <form method="POST" action="<?= base_url('C_lain/testimoni_saveedit/' . $data['id']) ?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Testimoni</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="hidden" name="id" class="form-control" value="<?= $data['id'] ?>">
                                <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea rows="4" class="form-control" name="keterangan"><?= $data['keterangan'] ?></textarea>
                            </div>
                            
                            <div class="form-group mb-0">
                                <label>Link Video</label>
                                <input type="text" name="asal" class="form-control" value="<?= $data['asal'] ?>">
                            </div>
                            
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-sm btn-icon btn-warning" href="<?= base_url('/lain_testimoni') ?>">Kembali</a>
                            <!-- <a class="btn btn-sm btn-icon btn-success" type="submit">Simpan</a> -->

                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <img src="<?= '/images/' . $data['gambar']; ?>" alt="" width="100%">
                            </div>
                            <div class="custom-file mb-2">
                                <input id="gambar" type="file" name="gambar" class="form-control custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                                <label class="custom-file-label" for="gambar">Ganti gambar</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
<?= $this->endSection() ?>
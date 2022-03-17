<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail</h1>
        </div>
        <form method="POST" action="<?= base_url('C_kontak/datadiri_saveedit/' . $data['id']) ?>" class="needs-validation" novalidate="">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Datadiri</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tentang</label>
                                <textarea rows="4" class="form-control" name="about_us" required><?= $data['about_us'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="hidden" name="id" class="form-control" required="" value="<?= $data['id'] ?>">
                                <textarea rows="4" class="form-control" name="alamat" required><?= $data['alamat'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor</label>
                                <input type="text" name="nomor" class="form-control" value="<?= $data['nomor'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="<?= $data['email'] ?>" required>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-sm btn-icon btn-warning" href="<?= base_url('/kontak_datadiri') ?>">Kembali</a>
                            <!-- <a class="btn btn-sm btn-icon btn-success" type="submit">Simpan</a> -->

                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
<?= $this->endSection() ?>
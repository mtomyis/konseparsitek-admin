<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail</h1>
        </div>
        <form method="POST" action="<?= base_url('C_dashboard/bidang_saveedit/'.$data['id']) ?>" class="needs-validation" novalidate="">
        <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Bidang</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="hidden" name="id" class="form-control" required="" value="<?= $data['id'] ?>">
                                <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea rows="4" class="form-control" name="keterangan" required><?= $data['keterangan'] ?></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-sm btn-icon btn-warning" href="<?= base_url('/beranda_bidang') ?>">Kembali</a>
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
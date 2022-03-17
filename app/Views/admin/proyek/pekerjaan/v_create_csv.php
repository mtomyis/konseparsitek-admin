<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Proyek Pekerjaan</h1>
        </div>
        <form method="POST" action="<?= base_url('C_proyek/pekerjaan_save_csv') ?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Upload file CSV</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Silahkan Pilih File CSV Data Pekerjaan.</label><a href="<?= base_url('/assets'); ?>/format_pengalaman.csv"> Belum punya ?</a>
                                <div class="custom-file mb-2">
                                    <input id="file" type="file" name="file" class="form-control custom-file-input <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('file'); ?>
                                    </div>
                                    <label class="custom-file-label" for="file">Upload CSV</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a class="btn btn-sm btn-icon btn-warning" href="<?= base_url('/proyek_pekerjaan') ?>">Kembali</a>
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
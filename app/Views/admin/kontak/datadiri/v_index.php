<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kelola Kontak</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Kontak Datadiri</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <!-- <a class="btn btn-sm btn-icon btn-info mb-3" href="<?= base_url('kontak_datadiri/create') ?>">Tambah Data</a> -->
                        <?php if (session()->getFlashdata('pesan')) { ?>
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <table id="example1" class="table table table-hover responsif" style="vertical-align: middle;">
                            <thead>
                                <tr>
                                    <th scope="col">Tentang</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $value) { ?>

                                    <tr>
                                        <td><?= $value['about_us'] ?></td>
                                        <td><?= $value['alamat'] ?></td>
                                        <td><?= $value['nomor'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td>
                                            <div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('/kontak_datadiri/edit/' . $value['id']) ?>';">Edit</button>
                                            </div>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
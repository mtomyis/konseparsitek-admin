<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kelola Lain lain</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Testimoni</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <a class="btn btn-sm btn-icon btn-info mb-3" href="<?= base_url('lain_testimoni/create') ?>">Tambah Testimoni</a>
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
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Asal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $value) { ?>

                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['keterangan'] ?></td>
                                        <td><img src="<?= '/images/' . $value['gambar']; ?>" alt="" width="50"></td>
                                        <td><?= $value['asal'] ?></td>
                                        <td>
                                            <div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('/lain_testimoni/edit/' . $value['id']) ?>';">Edit</button>
                                                <form method="post" action="<?= base_url('/lain_testimoni/delete/' . $value['id']) ?>" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE"> <!-- form method akan diganti dengan input value ini yaitu route delete -->
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');">Delete</button>
                                                </form>
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
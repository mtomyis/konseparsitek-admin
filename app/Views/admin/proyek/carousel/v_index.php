<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kelola Proyek</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Proyek Carousel</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <a class="btn btn-sm btn-icon btn-info mb-3" href="<?= base_url('proyek_carousel/create') ?>">Tambah Data</a>
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
                                    <th scope="col">Judul</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">link_video</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $value) { ?>

                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $value['judul'] ?></td>
                                        <td><?= $value['keterangan'] ?></td>
                                        <td>
                                            <div id="lightgallery<?= $value['id'] ?>">
                                                <a href="/images/<?= $value['gambar'] ?>">
                                                    <img src="/images/<?= $value['gambar']; ?>" alt="" width="50">
                                                </a>
                                            </div>
                                        </td>
                                        <td><a href="<?= $value['video'] ?>"><?= $value['video'] ?></a></td>
                                        <td>
                                            <div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('/proyek_carousel/edit/' . $value['id']) ?>';">Edit</button>
                                                <form method="post" action="<?= base_url('/proyek_carousel/delete/' . $value['id']) ?>" class="d-inline">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        <?php foreach ($data as $value) { ?>

        $("#lightgallery<?php echo $value['id'] ?>").lightGallery({
            thumbnail:true,
            animateThumb: false,
            showThumbByDefault: false
        });

        <?php } ?>
    });
</script>

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
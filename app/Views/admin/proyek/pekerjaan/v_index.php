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
                        <h4>Proyek Pekerjaan</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <a class="btn btn-sm btn-icon btn-info mb-3" href="<?= base_url('proyek_pekerjaan/create') ?>">Tambah Data</a>
                        <a class="btn btn-sm btn-icon btn-success mb-3" href="<?= base_url('proyek_pekerjaan/create_csv') ?>">Upload Data CSV</a>
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
                        <table id="table-1" class="table table table-hover responsif" style="vertical-align: middle;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pekerjaan</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Tanggal Pelaksanaan</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;

                                function tglindo($date)
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

                                foreach ($data as $value) {

                                    $tanggal_awal = tglindo($value['tanggal_awal']);
                                    $tanggal_akhir = tglindo($value['tanggal_akhir']);
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $value['judul'] ?></td>
                                        <td><?= $value['kategori'] ?></td>
                                        <td><?= $tanggal_awal ?> Sampai <?= $tanggal_akhir ?></td>
                                        <td>
                                        <?php if ($value['gambar']!="") { ?>
                                            <img src="/images/<?= $value['gambar']; ?>" alt="" width="50">
                                        <?php } ?>
                                        </td>
                                        <td>
                                            <div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('/proyek_pekerjaan/edit/' . $value['id']) ?>';">Edit</button>
                                                <form method="post" action="<?= base_url('/proyek_pekerjaan/delete/' . $value['id']) ?>" class="d-inline">
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

<!-- <script>
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
</script> -->
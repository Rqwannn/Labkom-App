<?= $this->extend("layout/templateAdmin"); ?>

<?= $this->section("content"); ?>
<!-- * Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- * Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Borrow List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Borrow List</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <!-- * table content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Peminjaman</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataAdmin" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Peminjam</th>
                                                <th>Nama Barang</th>
                                                <th>Banyak Pinjam</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Status</th>
                                                <th>Konfirmasi</th>
                                                <th>Pengembalian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($pinjamAll) : ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($pinjamAll as $key) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $nama_peminjam[$i - 1]; ?></td>
                                                        <td><?= $nama_barang[$i - 1]; ?></td>
                                                        <td><?= $key['banyak_pinjam']; ?></td>
                                                        <td><?= $key['tgl_pinjam']; ?></td>
                                                        <?php
                                                        $status = "belum dikonfirmasi";
                                                        $statusColor = "text-danger";
                                                        if ($key['confirm'] == 1 && $key['tgl_kembali'] == null) {
                                                            $status = "belum dikembalikan";
                                                        } elseif ($key['confirm'] == 1 && $key['tgl_kembali'] != null) {
                                                            $status = "dikembalikan";
                                                            $statusColor = "text-success";
                                                        }
                                                        ?>
                                                        <td class="<?= $statusColor; ?>">
                                                            <?= $status; ?>
                                                        </td>
                                                        <td>
                                                            <form action="/admin/confirm" method="post" class="d-inline">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" class="d-none" name="idPesan" style="display: none;" value="<?= $key['id']; ?>">
                                                                <button type="submit" class="btn-success btn confirm-pinjam-btn" <?= ($key['confirm'] == 1) ? 'disabled' : ''; ?>>
                                                                    Konfirmasi
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="/admin/kembali" method="post" class="d-inline kembali">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" class="d-none" name="idPesan" style="display: none;" value="<?= $key['id']; ?>">
                                                                <button type="submit" class="btn-primary btn kembalikan-btn" <?= ($key['tgl_kembali'] == null && $key['confirm'] == 1) ? '' : 'disabled'; ?>>
                                                                    Kembali
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

                </div>
                <!-- Right content -->
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h3>Data Peminjaman</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <canvas class="hasData" id="pinjamChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            <img src="/img/confused.png" width="250px" class="noData img-fluid">
                                            <h4 class="mt-2 noData">There is no data</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /Right Content -->
            </div>
            <!-- /.row -->
            <div class="peminjaman d-none" style="display: none;">
                <ul>
                    <?php
                    $dikembalikan = 0;
                    $belumDikembalikan = 0;
                    if ($pinjam) {
                        foreach ($pinjam as $key) {
                            if ($key['tgl_kembali'] == null) {
                                $belumDikembalikan += $key['banyak_pinjam'];
                            } else {
                                $dikembalikan += $key['banyak_pinjam'];
                            }
                        }
                    }
                    ?>
                    <li class="barangDikembalikan" data-stok="<?= $dikembalikan; ?>">Dikembalikan</li>
                    <li class="barangBelumDikembalikan" data-stok="<?= $belumDikembalikan; ?>">Belum Dikembalikan</li>
                </ul>
            </div>
        </div>
        <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
<!-- ? /.content-wrapper -->


<?= $this->endSection(); ?>
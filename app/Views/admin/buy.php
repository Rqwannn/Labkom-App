<?= $this->extend("layout/templateAdmin"); ?>

<?= $this->section("content"); ?>
<!-- * Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- * Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buy List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Buy List</li>
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
                                    <h4>Data Pembelian</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataAdmin" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pembeli</th>
                                                <th>Nama Barang</th>
                                                <th>Banyak Beli</th>
                                                <th>Total</th>
                                                <th>Tanggal Beli</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($beli) : ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($beli as $key) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td>
                                                            <?= $namaPembeli[$i - 1]; ?>
                                                        </td>
                                                        <td>
                                                            <?= $barangPembeli[$i - 1]; ?>
                                                        </td>
                                                        <td><?= $key['banyak_beli']; ?></td>
                                                        <td class="totalInAdmin"><?= $key['total']; ?></td>
                                                        <td><?= $key['tgl_beli']; ?></td>
                                                        <td class="<?= ($key['status'] == "0") ? 'text-danger' : 'text-success'; ?>">
                                                            <?= ($key['status'] == "0") ? 'Belum Lunas' : 'Lunas'; ?>
                                                        </td>
                                                        <td>
                                                            <form action="/admin/lunas" method="post">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="idBeli" value="<?= $key['id']; ?>">
                                                                <button type="submit" class="btn btn-primary beliNow" <?= ($key['status'] == "1") ? 'disabled' : ''; ?>>
                                                                    Konfirmasi
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
                                            <h3>Data Pembelian</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <canvas class="hasData" id="beliChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
            <div class="pembelian d-none" style="display: none;">
                <ul>
                    <?php
                    $lunas = 0;
                    $belumLunas = 0;
                    if ($beli) {
                        foreach ($beli as $key) {
                            if ($key['status'] == "0") {
                                $belumLunas += $key['banyak_beli'];
                            } else {
                                $lunas += $key['banyak_beli'];
                            }
                        }
                    }
                    ?>
                    <li class="lunas" data-stok="<?= $lunas; ?>">Lunas</li>
                    <li class="belumLunas" data-stok="<?= $belumLunas; ?>">Belum Lunas</li>
                </ul>
            </div>
        </div>
        <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
<!-- ? /.content-wrapper -->


<?= $this->endSection(); ?>
<?= $this->extend("layout/templateAdmin"); ?>

<?= $this->section("content"); ?>
<!-- * Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- * Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                    <!-- * Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= count($barang); ?></h3>

                                    <p>Data Barang</p>
                                </div>
                                <div class="icon">
                                    <!-- <ion-icon name="ios-train"></ion-icon> -->
                                </div>
                                <a href="/admin/Stuff" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-pink">
                                <div class="inner">
                                    <h3><?= count($pinjam); ?></h3>

                                    <p>Data Peminjaman</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-person"></i> -->
                                </div>
                                <a href="/admin/Borrow" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= count($beli); ?></h3>

                                    <p>Data Pembelian</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-stats-bars"></i> -->
                                </div>
                                <a href="/admin/Buy" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3><?= count($user); ?></h3>

                                    <p>Data User</p>
                                </div>
                                <!-- <div class="icon">
                                    <i class="fa fa-train card-icon"></i>
                                </div> -->
                                <div class="icon">
                                    <!-- <i class="ion ion-stats-bars"></i> -->
                                </div>
                                <a href="/admin/UserList" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= count($barang); ?></h3>

                                    <p>Tambah Barang</p>
                                </div>
                                <div class="icon">
                                    <!-- <i class="ion ion-person-add"></i> -->
                                </div>
                                <a href="/admin/AddStuff" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>

                    <!-- * table content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Guru</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataAdmin" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($guru) : ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($guru as $key) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td>
                                                            <img src="<?= $key['gambar']; ?>" alt="<?= $key['nama']; ?>" class="img-fluid rounded" width="100px">
                                                        </td>
                                                        <td><?= $key['nama']; ?></td>
                                                        <td><?= $key['nip']; ?></td>
                                                        <td><?= $key['level']; ?></td>
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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Siswa</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataAdmin2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Nis</th>
                                                <th>Nisn</th>
                                                <th>Jenis Kelamin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($siswa) : ?>
                                                <?php $k = 1; ?>
                                                <?php foreach ($siswa as $key) : ?>
                                                    <tr>
                                                        <td><?= $k; ?></td>
                                                        <td><?= $key['nama']; ?></td>
                                                        <td><?= $key['kelas']; ?></td>
                                                        <td><?= $key['nis']; ?></td>
                                                        <td><?= $key['nisn']; ?></td>
                                                        <td><?= $key['jk']; ?></td>
                                                    </tr>
                                                    <?php $k++; ?>
                                                <?php endforeach; ?>
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
                                            <h3>Data Stok Barang Tersedia</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <canvas id="barangChart" class="hasData2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            <img src="/img/confused.png" width="250px" class="noData2 img-fluid">
                                            <h4 class="mt-2 noData2">There is no data</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h3>Data Peminjaman Barang</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <canvas id="peminjamanChart" class="hasData" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h3>Data Pembelian Barang</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <canvas id="pembelianChart" class="hasData3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            <img src="/img/confused.png" width="250px" class="noData3 img-fluid">
                                            <h4 class="mt-2 noData3">There is no data</h4>
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="avail d-none" style="display: none;">
        <?php if ($avail) : ?>
            <ul>
                <?php $available = $avail['showOff'];
                $other = $avail['other']; ?>
                <?php if ($available) : ?>
                    <?php foreach ($available as $key) : ?>
                        <li class="availBarang" data-stok="<?= $key['stok']; ?>"><?= $key['nama_barang']; ?></li>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if ($other) : ?>
                    <?php foreach ($other as $key) : ?>
                        <li class="other" data-stok="<?= $key['stok']; ?>"><?= $key['nama_barang']; ?></li>
                    <?php endforeach ?>
                <?php endif ?>
            </ul>
        <?php endif ?>
    </div>

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
<!-- ? /.content-wrapper -->


<?= $this->endSection(); ?>
<?= $this->extend("layout/templateAdmin"); ?>

<?= $this->section("content"); ?>
<!-- * Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- * Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Stuff List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Stuff List</li>
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
                                    <h4>Data Barang</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataAdmin" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama Barang</th>
                                                <th>Stok</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($allBarang) : ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($allBarang as $key) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td>
                                                            <img src="/barang/<?= $key['gambar']; ?>" alt="Labkom <?= $key['nama_barang']; ?>" class="img-fluid rounded" width="100px">
                                                        </td>
                                                        <td><?= $key['nama_barang']; ?></td>
                                                        <td><?= $key['stok']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('/admin/updateBarang/' . $key['id']); ?>" class="btn btn-warning">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form class="d-inline" action="/admin/hapusBarang/<?= $key['id']; ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger btn-hapus">
                                                                    <i class="fa fa-trash-alt"></i>
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
                                            <h3>Data Stok Barang Tersedia</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <canvas id="barangChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
    </section>
    <!-- /.content -->
</div>
<!-- ? /.content-wrapper -->


<?= $this->endSection(); ?>
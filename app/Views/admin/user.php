<?= $this->extend("layout/templateAdmin"); ?>

<?= $this->section("content"); ?>
<!-- * Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- * Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
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
                <div class="col-md-12">
                    <!-- * table content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data User</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataAdmin" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Tanggal Lahir</th>
                                                <th>NIS</th>
                                                <th>NISN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($user) : ?>
                                                <?php $i=1; ?>
                                                <?php foreach ($user as $key) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $key['username']; ?></td>
                                                        <td><?= $key['name']; ?></td>
                                                        <td><?= $key['kelas']; ?></td>
                                                        <td><?= $key['birth']; ?></td>
                                                        <td><?= $key['nis']; ?></td>
                                                        <td><?= $key['nisn']; ?></td>
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
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ? /.content-wrapper -->


<?= $this->endSection(); ?>
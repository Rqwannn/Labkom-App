<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<!-- * Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- * Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Stuff</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Add Stuff</a></li>
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
            <!-- * table content -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data" action="/admin/addStuffProgress">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-dark card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="rounded img-fluid" id="imgPreview" src="/barang/default.png" alt="User profile picture" />
                                </div>
                                <h3 class="profile-username text-center mt-3" id="staffUsername">
                                    Ubah Gambar
                                </h3>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambarBarang" accept="Image/jpg,Image/jpeg,Image/png" name="gambarBarang" />
                                        <label class="custom-file-label" for="gambarBarang">
                                            Chosse Or Drag
                                        </label>
                                    </div>
                                </div>
                                <small class="text-danger">
                                    <?= $validation->getError('gambarBarang'); ?>
                                </small>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <!-- left column -->
                    <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Barang</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="namaBarang">Nama Barang</label>
                                            <input type="text" class="form-control" id="namaBarang" placeholder="Nama Barang" name="namaBarang" autocomplete="off" value="<?= old("namaBarang"); ?>" />
                                            <small class="text-danger" id="namaBarangTextValidate"></small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="jmlBarang">Jumlah Barang / Stok</label>
                                            <input type="text" class="form-control" id="jmlBarang" placeholder="Jumlah Barang" name="jmlBarang" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" value="<?= old("jmlBarang"); ?>" />
                                            <small class="text-danger" id="jmlBarangValidate"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="kategoriBarang">Kategori Barang</label>
                                            <select class="custom-select" id="kategoriBarang" required name="kategoriBarang">
                                                <option selected disabled value="">Choose...</option>
                                                <option value="alat">Alat</option>
                                                <option value="komputer">Komputer</option>
                                                <option value="jualan">Jualan</option>
                                            </select>
                                            <small class="text-danger" id="validateKategori"></small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="hargaBarang">Harga Barang</label>
                                            <input type="text" class="form-control" id="hargaBarang" placeholder="Harga Barang" name="hargaBarang" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" disabled value="<?= old("hargaBarang"); ?>" />
                                            <small class="text-danger" id="hargaBarangValidate"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark" id="submitAddStuff">
                                    Submit
                                </button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </form>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ? /.content-wrapper -->
<?= $this->endSection(); ?>
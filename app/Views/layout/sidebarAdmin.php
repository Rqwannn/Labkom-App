<!-- * Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="<?= base_URL(); ?>/img/rpl.png" alt="Labkom Logo" class="brand-image" style="opacity: 0.8;" />
        <span class="brand-text font-weight-light">Labkom</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_URL(); ?>/img/profile.png" class="img-circle elevation-2" alt="User Image" style="min-width: 35px;min-height:35px" />
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get("name"); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-legacy nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link <?= ($active == "home") ? "active" : ""; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/Stuff" class="nav-link <?= ($active == "stuff") ? "active" : ""; ?><?= ($active == "edit_stuff") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-boxes"></i>
                        <p>Data Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/Borrow" class="nav-link <?= ($active == "borrow") ? "active" : ""; ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Data Peminjaman</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/Buy" class="nav-link <?= ($active == "buy") ? "active" : ""; ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Data Pembelian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/UserList" class="nav-link <?= ($active == "userList") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-user-alt"></i>
                        <p>Data User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/AddStuff" class="nav-link <?= ($active == "add_stuff") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Tambah Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_URL(); ?>/logout" class="nav-link" id="logoutBtnAdmin">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
<!-- ? /.sidebar -->
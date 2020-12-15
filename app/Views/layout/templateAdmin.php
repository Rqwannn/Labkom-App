<?php
if (!session()->get('username')) {
    header('location:' . base_URL() . '/login');
    die;
} else {
    if (session()->get("level") == "user") {
        header('location:' . base_URL());
        die;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title; ?></title>

    <link rel="icon" href="/img/rpl.png" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_URL(); ?>/fontawesome/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_URL(); ?>/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?= base_URL(); ?>/css/responsive.bootstrap4.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_URL(); ?>/css/adminlte.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <style>
        .noData,
        .noData2,
        .noData3 {
            display: none;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">
        <?= $this->include("layout/navbarAdmin"); ?>

        <?= $this->include("layout/sidebarAdmin"); ?>

        <?= $this->renderSection('content'); ?>

        <?= $this->include('layout/footerAdmin'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <script src="<?= base_URL(); ?>/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_URL(); ?>/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_URL(); ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_URL(); ?>/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_URL(); ?>/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_URL(); ?>/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_URL(); ?>/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_URL(); ?>/js/demo.js"></script>
    <!-- Fontawesome -->
    <script src="<?= base_URL(); ?>/fontawesome/js/all.min.js"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Chart -->
    <script src="<?= base_URL(); ?>/js/Chart.min.js"></script>
    <!-- My Script -->
    <script>
        $("#dataAdmin").DataTable({
            responsive: true,
            autoWidth: false,
        });

        $("#dataAdmin2").DataTable({
            responsive: true,
            autoWidth: false,
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });

        $("#logoutBtnAdmin").on("click", function(e) {
            e.preventDefault();
            let href = $(this).attr("href");
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Kamu akan logout dari aplikasi!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Logout",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            });
        });
    </script>
    <?php if ($active == "home") : ?>
        <script src="/js/admin.js"></script>
    <?php elseif ($active == "stuff") : ?>
        <script src="/js/stuff.js"></script>
        <?php if (session()->getFlashData("sukses_tambah")) : ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        Toast.fire({
                            icon: 'success',
                            title: 'Success Add Stuff'
                        })
                    }, 200);
                });
            </script>
        <?php elseif (session()->getFlashData("hapusSukses")) : ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        Toast.fire({
                            icon: 'success',
                            title: 'Success Delete Stuff'
                        })
                    }, 200);
                });
            </script>
        <?php elseif (session()->getFlashData("sukses_update")) : ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        Toast.fire({
                            icon: 'success',
                            title: 'Success Update Stuff'
                        })
                    }, 200);
                });
            </script>
        <?php endif; ?>
    <?php elseif ($active == "edit_stuff") : ?>
        <script src="/js/bs-custom-file-input.min.js"></script>
        <script src="/js/edit_stuff.js"></script>
        <?php if (session()->getFlashData("error_edit")) : ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        Toast.fire({
                            icon: 'error',
                            title: 'Failed To Edit, Check your form or your image'
                        })
                    }, 200);
                });
            </script>
        <?php endif; ?>
    <?php elseif ($active == "add_stuff") : ?>
        <script src="/js/bs-custom-file-input.min.js"></script>
        <script src="/js/add_stuff.js"></script>
    <?php elseif ($active == "buy") : ?>
        <script src="/js/classes.js"></script>
        <script src="/js/buy.js"></script>
        <?php if (session()->getFlashData("suksesLunas")) : ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        Toast.fire({
                            icon: 'success',
                            title: 'Success Paid off'
                        })
                    }, 200);
                });
            </script>
        <?php elseif (session()->getFlashData("failLunas")) : ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        Toast.fire({
                            icon: 'error',
                            title: 'Failed To Paid off'
                        })
                    }, 200);

                });
            </script>
        <?php endif ?>
    <?php elseif ($active == "borrow") : ?>
        <script src="/js/borrow.js"></script>
        <?php if (session()->getFlashData('sukses_confirm')) : ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        Toast.fire({
                            icon: 'success',
                            title: 'Success Confirm'
                        })
                    }, 200);
                });
            </script>
        <?php elseif (session()->getFlashData('fail_confirm')) : ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        Toast.fire({
                            icon: 'error',
                            title: 'Failed To Confirm'
                        })
                    }, 200);

                });
            </script>
        <?php endif ?>
        <?php if (session()->getFlashData('sukses_kembali')) : ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        Toast.fire({
                            icon: 'success',
                            title: 'Success Return'
                        })
                    }, 200);

                });
            </script>
        <?php elseif (session()->getFlashData('fail_kembali')) : ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        Toast.fire({
                            icon: 'error',
                            title: 'Failed to Return'
                        })
                    }, 200);

                });
            </script>
        <?php endif ?>
    <?php endif ?>
</body>

</html>
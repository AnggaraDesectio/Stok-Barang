<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory Barang</title>

    <style>
        /* Sticky Footer */
        footer.sticky-bottom {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: transparent;
        }
    </style>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="datatables/jquery.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <style>
        .sidebar-brand-icon {
            transition: all 0.3s ease;
        }
        .sidebar-brand-icon:hover {
            transform: rotate(360deg);
            color: #ffc107;
        }
        .sidebar-brand-text {
            text-shadow: 1px 1px #343a40;
            transition: all 0.3s ease;
        }
        .sidebar-brand-text:hover {
            color: #ffc107;
        }
        </style>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        Transaksi
        </div>

        <!-- Nav Item - Stok Barang -->
        <li class="nav-item">
        <a class="nav-link" href="stok.php">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Stok Barang</span>
        </a>
        </li>

        <!-- Nav Item - Barang Masuk -->
        <li class="nav-item">
        <a class="nav-link" href="masuk.php">
            <i class="fas fa-fw fa-sign-in-alt"></i>
            <span>Barang Masuk</span>
        </a>
        </li>

        <!-- Nav Item - Barang Keluar -->
        <li class="nav-item">
        <a class="nav-link" href="keluar.php">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Barang Keluar</span>
        </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item d-flex align-items-center justify-content-center">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt text-white"></i>
                <span class="text-white">Logout</span>
            </a>
        </li>

        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <h1 class="h3 mb-2 text-gray-800">Stok Barang</h1>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <a href="tambahstok.php" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered datatable" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                    <tr>
                                            <td>No</td>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Lokasi</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    include 'koneksi.php';
                                    $i = 1;
                                    $data = mysqli_query($koneksi, "SELECT * FROM stokbarang");
                                    while($d = mysqli_fetch_array($data)){
                                      ?>
                                        <tr>
                                            <th><?php echo $i++; ?></th>
                                            <th><?php echo $d['kodebarang'] ?></th>
                                            <th><?php echo $d['namabarang'] ?></th>
                                            <th><?php echo $d['stok'] ?></th>
                                            <th><?php echo $d['satuan'] ?></th>
                                            <th><?php echo $d['lokasi'] ?></th>
                                            <th>
                                                <a href="editstok.php?id=<?php echo $d['id']; ?>" class="btn btn-success">Edit</a>
                                                <a href="hapusstok.php" onclick="confirmDelete('hapusstok.php?id=<?php echo $d['id']; ?>')" class="btn btn-danger">Hapus</a>
                                            </th>
                                            <?php
                                              }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
 

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        function confirmDelete(deleteUrl){
            if(confirm("Apakah Anda yakin ingin menghapus data ini?")){
            window.location.href = deleteUrl;
            }
        }
    </script>

    <script src="datatables/jquery-3.6.3.min.js"></script>
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "searching": true,
            });
        });
    </script>

    
    <script>
        if (typeof jQuery == 'undefined') {
            console.log('jQuery is not loaded');
        } else {
            console.log('jQuery is loaded');
        }
    </script>

</body>

</html>
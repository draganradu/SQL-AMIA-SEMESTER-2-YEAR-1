
<?php 
$pageName = 'InsertClienti';
$pageMetaName = 'Insert Clienti';
$baseLevel = '../';

require('../components/dom.php');

$aNume = 'Ionescu';
$aPrenume = 'Radu';
$aTelefon = '0742056799';
$aEmail = 'radu@dragan.ro';

$sqlQ = "INSERT INTO client (Nume, Prenume, Telefon, email) VALUES ('{$aNume}','{$aPrenume}', '{$aTelefon}', '{$aEmail}')";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="../" target="_blank">

    <title><?= $pageName ?></title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" class='<?= $pageName ?>'>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "{$baseLevel}sidebar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <?php include "{$baseLevel}nav.php" ?>
                    

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row">

                    
                    <div class="mb-4 col-md-12">
                            <?= cardOutput( "Insert Clienti", $sqlQ ) ?>
                    </div>

                        <!-- Content Column -->
                    <!-- DataTales Example -->
                    <div class="col-lg-12">


                            <!-- Illustrations -->
                            <div class="card shadow mb-12">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><?= $pageMetaName ?></h6>
                                </div>
                                <div class="card-body">
                                <form action='insertClienti/insertapi.php' method="post">

                                <div class="form-group">
                                        <label for="Nume">Nume</label>
                                        <input type="text" name="Nume" class="form-control" id="Nume" placeholder="Ionescu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Prenume</label>
                                        <input type="text" name="Prenume" class="form-control" id="exampleInputPassword1" placeholder="Radu / Raluca">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Telefon</label>
                                        <input type="tel" name="Telefon" class="form-control" id="exampleInputPassword1" placeholder="0742XXXX">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" name="Email" class="form-control" id="exampleInputPassword1" placeholder="ionescu@gmail.com">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "{$baseLevel}footer.php" ?>
            <!-- End of Footer -->

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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

<?php 
$pageName = 'listaScule';
$baseLevel = '../';

require('../components/loginCredentials.php');
require('../components/dom.php');


// echo($dbname);
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to connect to '$dbhost'");
$sql = "SELECT IdScula, NumeScula, Stare, Pret, ValRezid, IsRented, DataAchizitie FROM scule ORDER BY NumeScula ASC LIMIT 50";
$result = $connect->query($sql);


$tableHead = '';
$tableBody = '';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //var_dump($row);
      $tableBody .="
        <tr>
            <td>{$row['IdScula']}</td>
            <td>{$row['NumeScula']}</td>
            <td>{$row['Stare']}</td>
            <td>{$row['Pret']}</td>
            <td>{$row['ValRezid']}</td>
            <td>{$row['IsRented']}</td>
            <td>{$row['DataAchizitie']}</td>
        </tr>";
    }
  } else {
    echo "0 results";
  }

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

                        <!-- Content Column -->
                    <!-- DataTales Example -->
                        <div class="mb-4 col-md-12">
                            <?= cardCode( "Toata tabela 'Scule'", $sql) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-4 col-md-12">
                            <div class="card shadow mb-12">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Inventar Scule</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nume Unelte</th>
                                                    <th>Stare</th>
                                                    <th>Pret</th>
                                                    <th>Valoare Reziduala</th>
                                                    <th>Este inchiriata</th>
                                                    <th>Data Inchiriere</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nume Unelte</th>
                                                    <th>Stare</th>
                                                    <th>Pret</th>
                                                    <th>Valoare Reziduala</th>
                                                    <th>Este inchiriata</th>
                                                    <th>Data Inchiriere</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?= $tableBody ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            $sqlTotal = "SELECT SUM(Pret) FROM scule";
                            $result = $connect->query($sqlTotal);
                            $sumaTotala = 0;
                            
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $sumaTotala = $row['SUM(Pret)'];
                            
                                }
                            } else {
                                echo "0 results";
                            }
                        ?>
                        <div class="mb-4 col-md-6">
                            <?= cardOutput( "Valoare investitie Scule", $sumaTotala . ' Euro') ?>
                        </div>

                        <div class="mb-4 col-md-6">
                            <?= cardCode( "Sum total 'Scule'",  $sqlTotal) ?>
                        </div>


                        <?php
                            $sqlAVR = "SELECT AVG(ValRezid) FROM scule";
                            $result = $connect->query($sqlAVR);
                            $valReziduala = 0;

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $valReziduala = $row['AVG(ValRezid)'];

                                }
                            } else {
                                echo "0 results";
                            }
                        ?>

                        <div class="mb-4 col-md-6">
                            <?= cardOutput( "Valoare medie reziduala Scule", $valReziduala . ' Euro') ?>
                        </div>

                        <div class="mb-4 col-md-6">
                            <?= cardCode( "avridge of valRezid from 'Scule'",  $sqlAVR) ?>
                        </div>


                        <?php
                            $sqlSelect = "SELECT COUNT(IdScula) FROM scule WHERE IsRented = 1 ";
                            $result = $connect->query($sqlSelect);
                            $val = 0;
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $val = $row['COUNT(IdScula)'];

                                }
                            } else {
                                echo "0 results";
                            }
                        ?>

                        <div class="mb-4 col-md-6">
                            <?= cardOutput( "Scule inchiriate", $val . ' Euro') ?>
                        </div>

                        <div class="mb-4 col-md-6">
                            <?= cardCode( "where Is Rented = 1'",  $sqlSelect) ?>
                        </div>


                        <?php
                            $sqlSelect = "SELECT SUM(Pret - ValRezid) FROM scule";
                            $result = $connect->query($sqlSelect);
                            $val = 0;

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $val = $row['SUM(Pret - ValRezid)'];

                                }
                            } else {
                                echo "0 results";
                            }
                        ?>

                        <div class="mb-4 col-md-6">
                            <?= cardOutput( "Valoare pierduta in depreciere", $val . ' buc') ?>
                        </div>

                        <div class="mb-4 col-md-6">
                            <?= cardCode( "",  $sqlSelect) ?>
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
<?php $connect->close(); ?>
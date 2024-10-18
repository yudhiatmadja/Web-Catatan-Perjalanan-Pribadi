<?php 
include "../inc/config.php";
session_start();
if (!isset($_SESSION['nik'])){
    header ("location:../index.php");
}else{
    $nik=$_SESSION['nik'];
}$query = mysqli_query($conn, "SELECT * FROM user WHERE nik = '$nik'");
$data = mysqli_fetch_assoc($query);
?>

<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$nik=$_SESSION['nik'];
$tabel = [];

function getData($query){
  global $conn;
  $sql = mysqli_query($conn, $query);
  $tabel =  mysqli_fetch_all($sql, MYSQLI_ASSOC);
  return $tabel;
}

if( isset($_GET['katakunci']) AND isset($_GET['berdasarkan']) AND isset($_GET['aksi'])){

  $katakunci = $_GET['katakunci'];
  $berdasarkan = $_GET['berdasarkan'];
  $aksi = $_GET['aksi'];

  if($katakunci == '' OR $berdasarkan == '' OR $aksi == '' ){
    echo '<script>alert("Lengkapi form pencarian")</script>';
    $query = "SELECT * FROM catatan WHERE nik=$nik";
    $tabel = getData($query);
  }

  if( $berdasarkan == 'jam' ){
    $query = "SELECT * FROM catatan WHERE nik=$nik AND jam LIKE '%$katakunci%' ";
    $tabel = getData($query);
  } elseif( $berdasarkan == 'tanggal' ){
    $query = "SELECT * FROM catatan WHERE nik=$nik AND tanggal LIKE '%$katakunci%' ";
    $tabel = getData($query);
  } elseif( $berdasarkan == 'tujuan' ){
    $query = "SELECT * FROM catatan WHERE nik=$nik AND lokasi LIKE '%$katakunci%' ";
    $tabel = getData($query);
  }elseif( $berdasarkan == 'suhu' ){
    $query = "SELECT * FROM catatan WHERE nik=$nik AND suhu LIKE '%$katakunci%' ";
    $tabel = getData($query);
  }elseif( $berdasarkan == 'kondisi' ){

    if($katakunci == 'Tidak Normal'){
      $query = "SELECT * FROM catatan WHERE nik=$nik AND suhu >= '36' ";
      $tabel = getData($query);
    }
    if($katakunci == 'Normal'){
      $query = "SELECT * FROM catatan WHERE nik=$nik AND suhu < '36' ";
      $tabel = getData($query);
    }
    
  }else{
    $query = "SELECT * FROM catatan WHERE nik=$nik";
    $tabel = getData($query);
  }
}else{
  $query = "SELECT * FROM catatan WHERE nik=$nik";
  $tabel = getData($query);
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

    <title>Sistem Informasi Catatan Perjalanan </title>
    <link rel="icon" type="image/png" href="../asset/img/logo8.jpeg">

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../asset/DataTables-1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../asset/Buttons-2.2.2/css/buttons.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Catatan Perjalanan</div>
            </a>
             <li class="d-flex align-items-center justify-content-center">
        <a class="nav-link" href="editprofil.php">
         <img src="../asset/img/<?php echo $data['foto']?>" class="img-circle" width="80" name="foto"/></a>
          <li class="d-flex align-items-center justify-content-center">
          </li>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="editprofil.php">
            <div class="d-flex align-items-center justify-content-center" class="name">  <?= strtoupper($_SESSION["nama_lengkap"])?></div></font>
            <div class="d-flex align-items-center justify-content-center" class="nik"><strong> <?php echo $data['nik'];?></strong></div>
         </a>
      </li>

             <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="template_catatan.php?aksi=tambah">
                    <i class="fas fa-user-edit"></i>
                    <span>Tulis Catatan Perjalanan</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="template_catatan.php?aksi=awal">
                    <i class="fas fa-th-list"></i>
                    <span>Catatan Perjalanan</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
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

                    <!-- Topbar Search -->
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        
                       

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="mb-4 text-gray-800">
                       <!-- WELCOME-->
                
                        
                          
                        
                    
        <?php ?>
            <!-- END WELCOME-->

                         <?php 
            if(isset($_GET['aksi'])){
                if($_GET['aksi']=="awal"){
                require("catatan_perjalanan.php");
            }else if ($_GET['aksi']=="tambah"){
                require("tulis_catatan.php");
            }else if ($_GET['aksi']=="update"){
                require("update_catatan.php");
            }else if ($_GET['aksi']=="delete"){
                require("catatan_perjalanan.php");
            }else{ 
            echo "content tidak ada";
           }
           }
           ?> 
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Informasi Catatan Perjalanan 2022</span>
                    </div>
                </div>
            </footer>
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
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../asset/datatabel/jquery-3.5.1.js"></script>
    <script src="../asset/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="../asset/buttons-2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../asset/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../asset/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../asset/buttons-2.2.2/js/buttons.html5.min.js"></script>
    <script>

        let msg =  'NIK       : <?= $_SESSION["nik"]?>' +  '\r\n NAMA  : <?= strtoupper($_SESSION["nama_lengkap"])?>';  

        $(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        searching: false,
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
               customize : function (doc) {
                                // Here's where you can control the cell padding
                                doc.styles.tableHeader.margin =
                                doc.styles.tableBodyOdd.margin =
                                doc.styles.tableBodyEven.margin = [28, 8,8 , 8];
                            },
                pageSize: 'LEGAL',
                //download: 'open',
                title: 'LAPORAN CATATAN PERJALANAN DINAS',
                messageTop: msg ,
                text: 'CETAK PDF',
                exportOptions:{
                    columns:[0,1,2,3,4,5],
                }
            },
            'colvis'
        ]
    } );
} );
    </script>

    <!-- Page level custom scripts -->
    <script src="../asset/js/demo/datatables-demo.js"></script>

</body>

</html>
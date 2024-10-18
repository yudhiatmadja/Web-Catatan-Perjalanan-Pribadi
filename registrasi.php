<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="e-development.tech">

    <title>Registrasi Catatan Perjalanan</title>

    <!-- gambar title -->
    <link rel="icon" type="image/png" href="asset/img/logo8.jpeg">

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .img-logo{
            max-height: 160px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="asset/img/logo5.jpeg" alt="Logo Aplikasi" class="img-logo">
                                        <h1 class="h4 text-gray-900">REGISTRASI</h1>
                                        <h1 class="h4 text-gray-900 mb-4"><b>Sistem Informasi Catatan Perjalanan</b></h1>
                                    </div>
                                    <form class="user" action="inc/login_proses.php" enctype="multipart/form-data" method="post">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                            <label for="nik">Username</label>
                                            <input type="text" required id="inputNIK" name="nik" class="form-control" placeholder="Masukkan Username Anda">
                                                
                                        </div>
                                            <div class="col-md-12">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" required name="nama_lengkap" class="form-control"
                                                id="nama_lengkap"
                                                placeholder="Masukkan Nama Lengkap Anda">
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                            <label for="password">Password</label>
                                            <input type="password" required name="password" class="form-control"
                                                id="password"
                                                placeholder="Masukkan Password Anda">
                                                <small class="text-sm-end text-danger" id="password">Gunakan huruf besar, karakter dan angka</small>
                                                 
                                        </div>
                                        <div align="left">
                                            <div class="input-group">
                                            <label for="file-input" class="form-label">File Input Foto</label>
                                             </div>
                                         <div class="col-12 col-md-12" align="left">
                                            <input type="file" id="file-input" name="file" required class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                        <button type="register" class="btn btn-secondary btn-user btn-block" name="registrasi">
                                            Registrasi
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Sudah Punya Akun? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script>
    $(document).ready(function(){

      $('#pesanNIK').hide();
      let inputNIK = $('#inputNIK');
      
      inputNIK.on('keyup', ()=>{
        let panjangIsi = inputNIK.val().length;

        if( panjangIsi == 0){
          $('#pesanNIK').hide();
        } else if ( panjangIsi < 16 || panjangIsi > 16 ){
          $('#pesanNIK').fadeIn(200);
        }else{
          $('#pesanNIK').hide();
        }
      });

    });
  </script>

</body>

</html>
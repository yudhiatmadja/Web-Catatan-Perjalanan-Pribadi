<?php
session_start();

require('config.php');

$nik = $_POST['nik'];
$password = md5($_POST['password']);
$query = mysqli_query($conn, "SELECT * FROM user WHERE nik='$nik' AND password='$password'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['login'])) {
    if ($data) {
        $_SESSION['nik'] = $nik;
         $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
         $_SESSION['role'] = $role; 
        header("Location: ../siswa/dashboard.php");
    } else if($data){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;     
        $_SESSION['role'] = $role; 
        header("Location: ../siswa/dashboard.php");
    }else{

        echo "<script>alert('Username atau nama salah');window.location.href = '../index.php';</script>";
    }
} else if (isset($_POST['registrasi'])) {
    $query = mysqli_query($conn, "SELECT * FROM user WHERE nik = '$nik'");
    $data = mysqli_fetch_assoc($query);
    if ($data) {
        echo "<script>alert('User Sudah terdaftar');window.location.href = '../index.php';</script>";
    } else {
        $nama_lengkap = $_POST['nama_lengkap'];
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $foto = $_FILES['file']['name'];
        $ambil = explode('.', $foto);
        $ekstensi = strtolower(end($ambil));
        $ukuran    = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];


        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
               $query = mysqli_query($conn, "INSERT INTO `user` (`id`, `nik`, `nama_lengkap`, `password`, `foto`) VALUES (NULL, '$nik', '$nama_lengkap','$password' , '$foto')");
                if ($query) {
                    move_uploaded_file($file_tmp, '../asset/img/' . $foto);
                    echo "<script>alert ('Registrasi Berhasil');document.location='../index.php'</script>";
                } else {
                    echo "<script>alert ('Registrasi Gagal');document.location='../registrasi.php'</script>";
                }
            } else {
                echo "<script>alert ('Ukuran file terlalu besar');document.location='../registrasi.php'</script>";
            }
        } else {
            echo "<script>alert ('Ekstensi tidak di perbolehkan');document.location='../registrasi.php'</script>";
        }
    }
}

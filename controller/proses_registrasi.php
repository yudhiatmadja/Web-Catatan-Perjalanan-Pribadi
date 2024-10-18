<?php
require ("../inc/config.php");
if (isset($_POST['registrasi'])){
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_gambar = $_FILES['foto']['name'];
    $password=(addslashes($_POST['password']));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $sql_cek_nik =mysqli_query($conn, "SELECT * FROM user WHERE nik = '$nik'") or die (mysqli_error($conn));
    if (mysqli_num_rows($sql_cek_nik) > 0) {
        echo "<script>alert('Pendaftaran Gagal !!!'); document.location='../registrasi.php'</script>";
        // code...
    }
    // die();
    move_uploaded_file($file_tmp, '../asset/img/'. $nama_gambar);
    
    $save = mysqli_query($conn, "INSERT INTO user VALUES
        (NULL ,'$nik', '$nama_lengkap', '$nama_gambar', '$password')");
    if ($save) {
        echo "<script>alert('Pendaftaran Berhasil !!!'); document.location='../index.php'</script>";
    }
}
?>
<?php
include "../inc/config.php";
session_start(); 
if (isset($_POST['simpan'])) {
    $nik = $_SESSION['nik'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $lokasi = $_POST['lokasi'];
    $suhu = $_POST['suhu'];
    $query = mysqli_query($conn, "INSERT INTO catatan VALUES (NULL,'$nik','$tanggal', '$jam', '$lokasi', '$suhu')");

    if ($query) {
        echo "<script>alert('Data Berhasil Disimpan');document.location.href = '../siswa/template_catatan.php?aksi=awal';</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan');document.location.href = '../siswa/template_catatan.php?aksi=tambah';</script>";

    }
}

function update(){
$id=$_POST['id'];   
$nik = $_SESSION['nik'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $lokasi = $_POST['lokasi'];
    $suhu = $_POST['suhu'];
require ("../inc/config.php");
$update=mysqli_query($conn, "UPDATE catatan SET nik='$nik',tanggal='$tanggal',jam='$jam',lokasi='$lokasi',suhu='$suhu' WHERE id='$id'");
if($update){
    echo "<script>alert('Data Berhasil diupdate, Terimakasih'); document.location='../siswa/template_catatan.php?aksi=awal'</script>";
}else{
echo "<script>alert('Data gagal diupdate, coba lagi'); document.location='../siswa/template_catatan.php?aksi=update'</script>";

}
}
function delete(){
$id=$_REQUEST['id'];
require ("../inc/config.php");
$delete=mysqli_query($conn, "DELETE FROM catatan WHERE id='$id'");
if($delete){
    echo "<script>alert('Data Berhasil dihapus, Terimakasih'); document.location='../siswa/template_catatan.php?aksi=delete'</script>";
}else{
echo "<script>alert('Data gagal dihapus, coba lagi'); document.location='../siswa/template_catatan.php?aksi=delete'</script>";

}
}
?>
<?php 
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM barang_keluar WHERE id='$id'");
 
header("location:keluar.php?pesan=hapus");
?>


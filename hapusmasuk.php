<?php 

include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM barang_masuk WHERE id='$id'");
 
header("location:masuk.php?pesan=hapus");
?>
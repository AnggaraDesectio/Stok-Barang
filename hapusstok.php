<?php 

include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM stokbarang WHERE id='$id'");
 
header("location:stok.php?pesan=hapus");
?>
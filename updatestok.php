<?php

//koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$id = $_POST['id'];
$kodebarang = $_POST['kodebarang'];
$namabarang = $_POST['namabarang'];
$stok = $_POST['stok'];
$satuan = $_POST['satuan'];
$lokasi = $_POST['lokasi'];

// input ke database
mysqli_query($koneksi, "update stokbarang set kodebarang='$kodebarang', namabarang='$namabarang', stok='$stok', satuan='$satuan', lokasi='$lokasi' where id='$id'");

//mengalihkan halaman kembali ke masuk.php
header("location:stok.php");

?>
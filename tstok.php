<?php

//koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$kodebarang = $_POST['kodebarang'];
$namabarang = $_POST['namabarang'];
$stok = $_POST['stok'];
$satuan = $_POST['satuan'];
$lokasi = $_POST['lokasi'];

// input ke database
mysqli_query($koneksi, "insert into stokbarang values('', '$kodebarang', '$namabarang', '$stok', '$satuan', '$lokasi')");

//mengalihkan halaman kembali ke masuk.php
header("location:stok.php");

?>
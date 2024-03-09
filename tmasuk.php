<?php

//koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$kodebarang = $_POST['kodebarang'];
$namabarang = $_POST['namabarang'];
$jumlah = $_POST['jumlah'];
$lokasi = $_POST['lokasi'];
$tanggal = $_POST['tanggal'];

// input ke database
mysqli_query($koneksi, "insert into barang_masuk values('', '$kodebarang', '$namabarang', '$jumlah', '$lokasi', '$tanggal')");

//mengalihkan halaman kembali ke masuk.php
header("location:masuk.php");

?>
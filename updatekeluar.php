<?php

//koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$id = $_POST['id'];
$kodebarang = $_POST['kodebarang'];
$namabarang = $_POST['namabarang'];
$jumlah = $_POST['jumlah'];
$lokasi = $_POST['lokasi'];
$tanggal = $_POST['tanggal'];

// input ke database
mysqli_query($koneksi, "update barang_keluar set kodebarang='$kodebarang', namabarang='$namabarang', jumlah='$jumlah', lokasi='$lokasi', tanggal='$tanggal' where id='$id'");

//mengalihkan halaman kembali ke masuk.php
header("location:keluar.php");

?>
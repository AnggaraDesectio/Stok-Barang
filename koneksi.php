<?php
$koneksi = mysqli_connect("localhost", "root", "", "stokbarang");

// cek koneksi
if (mysqli_connect_errno()){
  echo "koneksi database gagal : ". mysqli_connect_errno();
}

?>
<?php

    if(isset($_POST['kodebarang'])){
        $kodebarang = $_POST['kodebarang'];
        // Buat koneksi ke database
        include 'koneksi.php';	
    
        // Buat query untuk mengambil data namabarang dan lokasi dari tabel stok_barang
        $query = "SELECT namabarang, lokasi FROM stokbarang WHERE kodebarang = '$kodebarang'";
    
        // Jalankan query
        $hasil = mysqli_query($koneksi, $query);
    
        // Ambil data dari hasil query
        $data = mysqli_fetch_assoc($hasil);
    
        // Kirim data sebagai respon AJAX
        echo json_encode($data);
    
        // Tutup koneksi
        mysqli_close($koneksi);
    }else{
        echo "Error: kodebarang tidak ditemukan";
    }
    
?>

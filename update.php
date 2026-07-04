<?php
include "koneksi.php";

if (isset($_POST['ketinggian']) && isset($_POST['status'])) {
    $ketinggian = $_POST['ketinggian'];
    $status = $_POST['status'];
    
    // Pastikan nama kolom 'ketinggian' dan 'status_air' sama dengan di database Anda
    $sql = "INSERT INTO tb_air (ketinggian, status_air) VALUES ('$ketinggian', '$status')";
    
    if (mysqli_query($konek, $sql)) {
        echo "Data berhasil masuk";
    } else {
        echo "Gagal: " . mysqli_error($konek);
    }
}
?>
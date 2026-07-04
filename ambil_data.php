<?php
include "koneksi.php";

// 1. Ambil data terbaru untuk kartu status
$query_terbaru = mysqli_query($konek, "SELECT * FROM tb_air ORDER BY id DESC LIMIT 1");
$data_terbaru = mysqli_fetch_array($query_terbaru);

// 2. Ambil 5 data terakhir untuk tabel
$query_riwayat = mysqli_query($konek, "SELECT waktu, ketinggian FROM tb_air ORDER BY id DESC LIMIT 5");
$rows = [];
while($row = mysqli_fetch_assoc($query_riwayat)) {
    $rows[] = $row;
}

// 3. Kirim semuanya sekaligus
echo json_encode([
    "cm" => $data_terbaru ? $data_terbaru['ketinggian'] : 0,
    "status" => $data_terbaru ? $data_terbaru['status_air'] : "Kosong",
    "riwayat" => $rows
]);
?>
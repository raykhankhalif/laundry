<?php 
include '../koneksi.php';

$pelanggan   = $_POST['pelanggan'];
$berat       = $_POST['berat'];
$tgl_selesai = $_POST['tgl_selesai'];

$tgl_hari_ini = date('Y-m-d');
$status = 0;

// ambil harga per kilo
$h = mysqli_query($koneksi, "SELECT harga_per_kilo FROM harga");
$harga_per_kilo = mysqli_fetch_assoc($h);
$harga = $berat * $harga_per_kilo['harga_per_kilo'];

// simpan transaksi
mysqli_query($koneksi, "INSERT INTO transaksi 
(transaksi_tgl, transaksi_pelanggan, transaksi_harga, transaksi_berat, transaksi_tgl_selesai, transaksi_status)
VALUES
('$tgl_hari_ini', '$pelanggan', '$harga', '$berat', '$tgl_selesai', '$status')");

// ambil id transaksi terakhir
$id_terakhir = mysqli_insert_id($koneksi);

$pakaian_jenis  = $_POST['pakaian_jenis'];
$pakaian_jumlah = $_POST['pakaian_jumlah'];

for($x=0; $x<count($pakaian_jenis); $x++){
    if($pakaian_jenis[$x] != ""){
        mysqli_query($koneksi, "INSERT INTO pakaian VALUES('', '$id_terakhir', '".$pakaian_jenis[$x]."', '".$pakaian_jumlah[$x]."')");
    }
}

header("location:transaksi.php");
?>

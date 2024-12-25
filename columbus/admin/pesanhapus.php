
<?php
include '../koneksi.php';
$koneksi->query("DELETE FROM pesan WHERE idpesan='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script> location ='index.php?halaman=pesan';</script>"; ?>
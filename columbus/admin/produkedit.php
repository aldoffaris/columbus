<?php
$idproduk = $koneksi->query("SELECT * FROM produk WHERE idproduk = '$_GET[id]'");
$data = $idproduk->fetch_assoc();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Edit Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Edit Produk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Produk</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                    <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Nama Produk</label>
                                                <input type="text" class="form-control" name="namaproduk" value="<?= $data['namaproduk'] ?>" required>
                                            </div>
                                        </div>
                                    <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Harga Produk</label>
                                                <input type="number" class="form-control" name="hargaproduk" value="<?= $data['hargaproduk'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" name="deskripsiproduk" id="isi" required><?= $data['deskripsiproduk'] ?></textarea>
                                                <script>
                                                    CKEDITOR.replace('isi');
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <a target="_blank" class="btn btn-primary" href="../foto/<?= htmlspecialchars($data['foto'], ENT_QUOTES) ?>">Lihat Foto</a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" class="form-control" name="foto">
                                                <p>Kosongkan jika tidak ingin mengubah gambar</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right" name="ubah">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($_POST['ubah'])) {
    $namaproduk = $_POST['namaproduk'];
    $hargaproduk = $_POST['hargaproduk'];
    $deskripsiproduk = $_POST['deskripsiproduk'];
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    // Proses file foto jika ada yang diupload
    if (!empty($lokasifoto) && $_FILES['foto']['error'] === 0) {
        $namafoto = time() . "_" . $namafoto; // Mencegah nama file duplikat
        move_uploaded_file($lokasifoto, "../foto/$namafoto");

        // Update data di database termasuk foto
        $koneksi->query("UPDATE produk SET 
            namaproduk = '$namaproduk',
            hargaproduk = '$hargaproduk',
            deskripsiproduk = '$deskripsiproduk',
            foto = '$namafoto' 
            WHERE idproduk = '$_GET[id]'");
    } else {
        // Update data di database tanpa foto jika tidak diupload
        $koneksi->query("UPDATE produk SET 
            namaproduk = '$namaproduk',
            hargaproduk = '$hargaproduk',
            deskripsiproduk = '$deskripsiproduk' 
            WHERE idproduk = '$_GET[id]'");
    }

    // Menampilkan pesan setelah data berhasil diubah
    echo "<script>alert('Data Berhasil Diubah');</script>";
    echo "<script>location='index.php?halaman=produkdaftar';</script>";
}
?>

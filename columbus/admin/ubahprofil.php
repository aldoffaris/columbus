<?php
include_once('../koneksi.php');
$emailadmin = $_SESSION['admin']['email'];
$ambil = $koneksi->query("SELECT * FROM admin WHERE email='$emailadmin'");
$pecah = $ambil->fetch_assoc();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Edit Profil</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Edit Profil</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Profil</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input value="<?= $pecah['nama'] ?>" type="text" required class="form-control" name="nama" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input value="<?= $pecah['email'] ?>" type="text" required class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input value="<?= $pecah['password'] ?>" type="text" required class="form-control" name="password" placeholder="Password">

                                    </div>
                                    <button class="btn btn-primary" type="submit" name="ubah"><i class="glyphicon glyphicon-saved"></i>Simpan</a></button>
                                </form>
                                <?php
                                // echo $_GET['id'];
                                if (isset($_POST['ubah'])) {
                                    $koneksi->query("UPDATE admin SET nama='$_POST[nama]',email='$_POST[email]', password='$_POST[password]' WHERE email='$emailadmin'") or die(mysqli_error($koneksi));
                                    $ambil = $koneksi->query("SELECT * FROM admin
        WHERE email='$_POST[email]' limit 1");
                                    $akun = $ambil->fetch_assoc();
                                    $_SESSION['admin'] = $akun;
                                    echo "<script> alert('Data Berhasil Di Ubah');</script>";
                                    echo "<script> location ='index.php?halaman=ubahprofil';</script>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if (isset($_POST['simpan'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasifoto, "../foto/" . $namafoto);
    $koneksi->query("INSERT INTO galeri
		(foto)
		VALUES('$namafoto')");
    echo "<script>alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='index.php?halaman=galeridaftar';</script>";
}
?>
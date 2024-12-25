<?php
include 'koneksi.php';
include 'header.php'; ?>
<main id="main">

    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets_home/assets/img/bg3.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Login Admin</h2>
            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Login Admin</li>
            </ol>
        </div>
    </div>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 mt-1">
                <div class="col-lg-12">
                    <form method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2" for="email">Email</label>
                                    <input type="email" for="c_email" class="form-control mb-4" id="name" name="email" required placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2" for="password">Password</label>
                                    <input type="password" class="form-control mb-4" id="password" name="password" required placeholder="Password">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary float-end" name="simpan" value="Masuk">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
if (isset($_POST["simpan"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ambil = $koneksi->query("SELECT * FROM admin
		WHERE email='$email' AND password='$password' limit 1");
    $akunyangcocok = $ambil->num_rows;
    if ($akunyangcocok == 1) {
        $akun = $ambil->fetch_assoc();
        $_SESSION['admin'] = $akun;
        echo "<script> alert('Anda sukses login');</script>";
        echo "<script> location ='admin/index.php';</script>";
    } else {
        echo "<script> alert('Anda gagal login, Cek akun anda');</script>";
        echo "<script> location ='login.php';</script>";
    }
}
?>
<?php
include 'footer.php';
?>
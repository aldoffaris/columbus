<?php
include 'koneksi.php';
include 'header.php';
?>

<?php
$idproduk = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM produk WHERE idproduk='$idproduk'");
$detail = $ambil->fetch_assoc();
?>
<main id="main">

    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets_home/assets/img/bg3.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Detail Produk</h2>
            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Detail Produk</li>
            </ol>
        </div>
    </div>

    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">


            <div class=" row gy-5">
                <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class=" position-relative h-100">
                        <img src="foto/<?php echo $detail['foto'] ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="post-title"><?= $detail['namaproduk'] ?></h3>
                    <h5 class="post-title"><?= formatRupiah($detail['hargaproduk']) ?></h5>
                    <p class="post-title"><?= $detail['deskripsiproduk'] ?></p>
                    <hr>
                </div>
                <div class="col-xl-12 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="mb-3 text-center">Form Simulasi</h3>
                    <form id="simulasiKredit">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="jumlahKredit" class="mb-2">Jumlah Kredit <em>(rupiah)</em>: </label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $_GET['id'] ?>">
                                    <input type="number" class="form-control mb-2" id="jumlahKredit" name="jumlahKredit" placeholder="Contoh: 150000000" value="<?= $detail['hargaproduk'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="jangkaWaktu" class="mb-2">Jangka Waktu <em>(bulan)</em>: </label>
                                    <input type="number" class="form-control mb-2" id="jangkaWaktu" name="jangkaWaktu" placeholder="Contoh: 120" value="12">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="bungaPertahun" class="mb-2">Bunga Pertahun <em>(%)</em>: </label>
                                    <input type="number" class="form-control mb-2" id="bungaPertahun" name="bungaPertahun" placeholder="Contoh: 10.5" value="1.5">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group ml-3">
                                    <input type="radio" class="form-check-input" value="1" name="metode" id="Flat" checked>
                                    <label class="form-check-label mb-2" for="Flat">Flat</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group ml-3">
                                    <input type="radio" class="form-check-input" value="2" name="metode" id="Efektif">
                                    <label class="form-check-label mb-2" for="Efektif">Efektif</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group ml-3">
                                    <input type="radio" class="form-check-input" value="3" name="metode" id="Anuitas">
                                    <label class="form-check-label mb-2" for="Anuitas">Anuitas</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-3 float-right pull-right">
                            <button id="btnHitung" type="submit" class="btn btn-primary">Hitung</button>
                            <button id="btnUlangi" type="submit" class="btn btn-primary">Ulangi</button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-12 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="mb-3 text-center">Hasil Simulasi</h3>
                    <div class="row d-flex justify-content-center">
                        <div class="col-3">Total Pinjaman</div>
                        <div class="col-9">: <span id="resultTotalPinjaman"></span></div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-3">Lama Pinjaman</div>
                        <div class="col-9">: <span id="resultLamaPinjaman"></span></div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-3">Bunga Pertahun</div>
                        <div class="col-9">: <span id="resultBungaPertahun"></span></div>
                    </div>
                    <div class="flatOnly">
                        <div class="row d-flex justify-content-center">
                            <div class="col-3">Angsuran Pokok Perbulan</div>
                            <div class="col-9">: <span id="resultAngPokokBulan"></span></div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-3">Angsuran Bunga Perbulan</div>
                            <div class="col-9">: <span id="resultAngBungaBulan"></span></div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-3">Total angsuran per bulan</div>
                            <div class="col-9">: <span id="resultAngBulan"></span></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <br>
                        <table id="tableAngsuran" class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Pokok</th>
                                    <th scope="col">Bunga</th>
                                    <th scope="col">Angsuran</th>
                                    <th scope="col">Sisa Pinjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
<script type='text/javascript'>
    <?php if (!empty($_GET['skrol'])) { ?>
        $('html, body').animate({
            scrollTop: $('#open_here').offset().top
        }, 'slow');
    <?php } ?>
</script>
<?php
include 'koneksi.php';
include 'header.php'; ?>
<main id="main">

    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets_home/assets/img/bg3.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Kontak</h2>
            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Kontak</li>
            </ol>

        </div>
    </div>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-map"></i>
                        <h3>Alamat</h3>
                        <p class="text-center">Jl. Majalengka - Cikijing, Munjul, Talaga, Kabupaten Majalengka, Jawa Barat 45418</p>
                    </div>
                </div>

            </div>

            <div class="row gy-4 mt-1">

                <div class="col-lg-6 ">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.4756125390077!2d108.2110815749957!3d-6.8334365931645555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f2f6e354db6b3%3A0xe8e09bfeb6f48a19!2sPT.%20Columbus%20Majalengka!5e0!3m2!1sid!2sid!4v1734074124642!5m2!1sid!2sid" width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6 ">
                    <h3>Kirim Pesan</h3>
                    <form class="form-contact contact_form" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="mb-2">Nama</label>
                                    <input type="text" class="form-control mb-2" placeholder="Nama" name="nama" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="mb-2">Email</label>
                                    <input type="text" class="form-control mb-2" placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2">Telepon</label>
                                    <input type="number" class="form-control mb-2" placeholder="No. HP" name="nohp" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2">Pesan</label>
                                    <textarea class="form-control mb-2" placeholder="Pesan / Saran Anda" rows="3" name="pesan" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button name="simpan" value="simpan" type="submit" class="btn btn-primary w-100">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</main>
<?php
include_once('koneksi.php');
if (isset($_POST['simpan'])) {
    $koneksi->query("INSERT INTO pesan
		(nama,email,nohp,pesan)
		VALUES('$_POST[nama]','$_POST[email]','$_POST[nohp]','$_POST[pesan]')") or die(mysqli_error($koneksi));
    echo "<script>alert('Pesan / Saran Anda Berhasil Di Kirim');</script>";
    echo "<script>location='kontak.php';</script>";
}
?>
<?php
include 'footer.php';
?>
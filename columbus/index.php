<?php
include 'koneksi.php';
?>
<?php include 'header.php'; ?>
<section id="hero" class="hero">

	<div class="info d-flex align-items-center">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 text-center">
					<h2 data-aos="fade-down" class="mt-3">Selamat Datang Di Website <br> <span>Columbus</span></h2>
				</div>
			</div>
		</div>
	</div>

	<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

		<div class="carousel-item active" style="background-image: url(assets_home/assets/img/bg3.jpg)">
		</div>
		<div class="carousel-item" style="background-image: url(assets_home/assets/img/bg4.jpg)"></div>

		<a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
			<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
		</a>

		<a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
			<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
		</a>

	</div>

</section>

<section id="alt-services" class="alt-services">
	<div class="container" data-aos="fade-up">

		<div class="row justify-content-around gy-4">
			<div class="col-lg-6 img-bg" style="background-image: url(assets_home/assets/img/bg3.jpg)" data-aos="zoom-in" data-aos-delay="100"></div>

			<div class="col-lg-5 d-flex flex-column justify-content-center">
				<h3>Sejarah Singkat</h3>
				<p class="mb-4">Diawali dari sebuah toko di Jalan Letkol Iskandar no 31D
					Palembang, yang didirikan pada tanggal 7 Juli 2001.

					Nama Columbus diambil dari penemu benua Amerika,
					Christopher Columbus. perjuangan dan visi dari Columbus
					sebagai penemu benua Amerika, mengilhami para pendiri
					untuk membentuk suatu bisnis yang dapat memberikan
					kesempatan kepada para tenaga muda untuk mendarat
					dan bergabung bersama Columbus untuk dibentuk dan
					menjadi orang yang sukses dalam hidup dan karirnya.
				</p>
			</div>
		</div>

	</div>
</section>
<section id="alt-services" class="alt-services">
	<div class="container" data-aos="fade-up">

		<div class="row justify-content-around gy-4">
			<div class="col-lg-6 d-flex flex-column justify-content-center">
				<h3>Visi</h3>
				<ol>
					<li>Menjadi perusahaan yang terbaik dan nomor satu dibidangnya, dimana unit bisnis itu berada
					</li>
					<li>Peduli terhadap kebutuhan masyarakat
					</li>
					<li>Menciptakan karyawan berbudaya dan sejahtera
					</li>
				</ol>
			</div>
			<div class="col-lg-6 d-flex flex-column justify-content-center">
				<h3>Misi</h3>
				<ol>
					<li>Membangun jaringan unit bisnis diseluruh kota besar

					</li>
					<li>Menyediakan barang terlengkap, berkualitas dan bergaransi

					</li>
					<li>Meningkatkan kualitas pelayanan, kemudahan dan kepedulian terhadap nasabah sebagai mitra usaha

					</li>
					<li>Meningkatkan kesejahteraan dan keharmonisan karyawan yang berbudaya dan berwawasan luas dengan menanamkan budaya, visi dan 8 Dimensi nilai-nilai perilaku, yaitu Cerdas, Optimis, Loyalitas, Unggul, Mandiri, Berwibawa, Ulet, Sinergik

					</li>
				</ol>
			</div>
		</div>

	</div>
</section>


<section id="recent-blog-posts" class="recent-blog-posts">
	<div class="container" data-aos="fade-up"">

    
  <div class=" section-header">
		<h2>Produk Kami</h2>
	</div>

	<div class="row gy-5">
		<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
		<?php while ($produk = $ambil->fetch_assoc()) { ?>
			<div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
				<div class="post-item position-relative h-100">

					<div class="post-img position-relative overflow-hidden">
						<img style="height: 500px;object-fit:cover" src="foto/<?= $produk['foto'] ?>" class="img-fluid" alt="">
					</div>

					<div class="post-content d-flex flex-column">

						<h3 class="post-title"><?= $produk['namaproduk'] ?></h3>
						<hr>
						<a href="detailproduk.php?id=<?= $produk['idproduk']; ?>" class="readmore stretched-link">
							<span>Lihat Selengkapnya</span><i class="bi bi-arrow-right"></i>
						</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</section>
<section id=" projects" class="projects">
	<div class="container" data-aos="fade-up">

		<div class="section-header">
			<h2>Galeri</h2>
		</div>

		<div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
			data-portfolio-sort="original-order">

			<div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
				<?php $ambil = $koneksi->query("SELECT * FROM galeri limit 3"); ?>
				<?php while ($galeri = $ambil->fetch_assoc()) { ?>
					<div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
						<div class="portfolio-content h-100">
							<img style="height: 500px;object-fit:cover" src="foto/<?= $galeri['foto'] ?>" class="img-fluid" alt="">
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php include_once('footer.php') ?>
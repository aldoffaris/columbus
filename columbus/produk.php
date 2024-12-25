<?php
include 'koneksi.php';
include 'header.php'; ?>
<main id="main">
  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets_home/assets/img/bg3.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2>Produk</h2>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>Produk</li>
      </ol>

    </div>
  </div>
  <section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container" data-aos="fade-up"">

    
    
  <div class=" section-header">
      <h2>Produk</h2>
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
</main>
<?php
include 'footer.php';
?>
<?php
include 'koneksi.php';
include 'header.php'; ?>
<main id="main">
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets_home/assets/img/bg3.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Galeri</h2>
            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Galeri</li>
            </ol>

        </div>
    </div>
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up"">

    
    
        <section id=" projects" class="projects">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Galeri</h2>
                </div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        <?php $ambil = $koneksi->query("SELECT * FROM galeri"); ?>
                        <?php while ($galeri = $ambil->fetch_assoc()) { ?>
                            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                <div class="portfolio-content h-100">
                                    <a href="galeridetail.php?id=<?= $galeri['idgaleri'] ?>">
                                        <img style="height: 500px;object-fit:cover" src="foto/<?= $galeri['foto'] ?>" class="img-fluid" alt="">
                                        <div class="portfolio-info">
                                            <!-- <a href="foto/<?= $galeri['foto'] ?>" title=""
                                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                                            <i class="bi bi-zoom-in"></i>
                                        </a> -->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>

            </div>
    </section>
</main>
<?php
include 'footer.php';
?>
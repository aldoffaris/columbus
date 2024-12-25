<?php
include 'koneksi.php';
include 'header.php';
?>

<?php
$idgaleri = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM galeri WHERE idgaleri='$idgaleri'");
$detail = $ambil->fetch_assoc();
?>
<main id="main">

    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets_home/assets/img/bg3.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Detail</h2>
            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Detail</li>
            </ol>
        </div>
    </div>

    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">

            <div class=" row gy-5">
                <div class="col-xl-6 col-md-6 my-auto" data-aos="fade-up" data-aos-delay="100">
                    <div class=" position-relative h-100">
                        <img src="foto/<?php echo $detail['foto'] ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 my-auto" data-aos="fade-up" data-aos-delay="100">
                    <p class="post-title"><?= $detail['deskripsi'] ?></p>
                </div>
            </div>
    </section>
</main>
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
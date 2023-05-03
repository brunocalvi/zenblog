<?php 
include('./models/ViewPost.php');
include('./includes/function.php');
include('./includes/config.php');

$viewpost = new Postagem($conPDO);

include('./includes/header.php'); 
?>
  <main id="main">

    <?php include('./includes/banners.php'); ?>

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">

          <?php include('./includes/primeiras-noticias.php'); ?>

          <div class="col-lg-8">
            <div class="row g-5">

              <?php include('./includes/lista-noticias.php'); ?>

              <!-- Trending Section -->
              <div class="col-lg-4">
                <div class="trending">

                  <h3>Últimas Notícias</h3>
                  <?php include('./includes/ultimas-noticias.php'); ?>

                </div>
              </div> 
              <!-- End Trending Section -->

            </div>
          </div>

        </div> <!-- End .row -->
      </div>
    </section> <!-- End Post Grid Section -->

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include('./includes/footer.php'); ?>


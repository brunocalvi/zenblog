<?php 
include('models/Banners.php');
$banner = new Banner($conPDO);
?>

<!-- ======= Hero Slider Section ======= -->
<section id="hero-slider" class="hero-slider">
  <div class="container-md" data-aos="fade-in">
    <div class="row">
      <div class="col-12">
        <div class="swiper sliderFeaturedPosts">
          <div class="swiper-wrapper">

          <?php foreach ($banner->listBanners() as $value) { ?>

            <div class="swiper-slide">
              <a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>" class="img-bg d-flex align-items-end" 
                  style="background-image: url('<?php echo PATH_DEFAULT .'assets/img/'. $value['path']; ?>');">

                <div class="img-bg-inner">
                  <h2><?php echo $value['titulo']; ?></h2>
                  <p><?php echo $value['descricao']; ?></p>
                  <p><?php echo horario($value['data_upload']); ?></p>
                </div>
              </a>
            </div>

          <?php } ?>
            
          </div>
          <div class="custom-swiper-button-next">
            <span class="bi-chevron-right"></span>
          </div>
          <div class="custom-swiper-button-prev">
            <span class="bi-chevron-left"></span>
          </div>

          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Hero Slider Section -->

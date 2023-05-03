  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">

          <div class="col-lg-4">
            <h3 class="footer-heading">CalviTech</h3>
            <p>
              Eu espero que vocês encontrem esse blog útil e informativo. Se você tiver alguma pergunta ou comentário, não hesite em entrar em contato com nosco. Estamos sempre dispostos a conversar e ajudar no que pudemos.<br/><br/>
              Se tiver alguma noticia esperial para posta mande para nos pelo formulario de Contato
            </p>
            <p><a href="<?php echo PATH_DEFAULT; ?>about" class="footer-link-more">Saber mais</a></p>
          </div>

          <div class="col-6 col-lg-3">
            <h3 class="footer-heading">Navegação</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="<?php echo PATH_DEFAULT; ?>"><i class="bi bi-chevron-right"></i> Blog</a></li>
              <li><a href="<?php echo PATH_DEFAULT; ?>about"><i class="bi bi-chevron-right"></i> Sobre nós</a></li>
              <li><a href="<?php echo PATH_DEFAULT; ?>contact"><i class="bi bi-chevron-right"></i> Contato</a></li>
            </ul>
          </div>
          
          <div class="col-lg-4">
            <h3 class="footer-heading">Post Recentes</h3>

            <ul class="footer-links footer-blog-entry list-unstyled">

              <?php foreach ($viewpost->listPost() as $value) { ?>
                <li>
                  <a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>" class="d-flex align-items-center">
                    <div>
                      <div class="post-meta d-block">
                        <span class="date"><?php echo $value['tags']; ?></span> 
                        <span class="mx-1">&bullet;</span> 
                        <span><?php echo horario($value['data_upload']); ?></span></div>
                      <span><?php echo $value['titulo']; ?></span>
                    </div>
                  </a>
                </li>
              <?php } ?>

            </ul>

          </div>
        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>CalviTech</span></strong>. <?php echo ' '.DATE('Y'); ?> Todos os direitos reservados
            </div>

            <div class="credits">Desenvolvido por <a href="#">CalviTech</a></div>
          </div>

          <div class="col-md-6">
            <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
              <a href="<?php echo TWITTER; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="<?php echo FACEBOOK; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="<?php echo INSTAGRAM; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="<?php echo SKYPE; ?>" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="<?php echo LINKEDIN; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>

      </div>
    </div>

  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo PATH_DEFAULT; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo PATH_DEFAULT; ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo PATH_DEFAULT; ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo PATH_DEFAULT; ?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo PATH_DEFAULT; ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo PATH_DEFAULT; ?>assets/js/main.js"></script>

</body>

</html>
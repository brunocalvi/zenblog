<?php 
include('./models/Message.php');
include('./models/ViewPost.php');
include('./includes/function.php');
include('./includes/config.php');

$message = new Message();
$viewpost = new Postagem($conPDO);

$alerta_email = $message->getMessage();

include('./includes/header.php'); 
?>

  <main id="main">
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Contate-nos</h1>
          </div>
        </div>

        <div class="row gy-4">

          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-geo-alt"></i>
              <h3>ENDEREÇO</h3>
              <address><?php echo ENDERECO; ?></address>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4">
            <div class="info-item info-item-borders">
              <i class="bi bi-phone"></i>
              <h3>TELEFONE E WHATSAPP</h3>
              <p><a href="<?php echo WHATSAPP; ?>" target="_blank"><?php echo MASCARA_NUMERO; ?></a></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-envelope"></i>
              <h3>E-MAIL</h3>
              <p><a href="mailto:<?php echo EMAIL_VISUAL_NO_SITE; ?>"><?php echo EMAIL_VISUAL_NO_SITE; ?></a></p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="form mt-5">

            <?php if($alerta_email <> null) { ?>
              <div class="container text-center margin">
                <?php if(strstr($alerta_email,"sucesso")) { ?>
                  <div class="alert alert-success" role="alert">
                    <?php echo $alerta_email; ?> 
                  </div>
                <?php } else { ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $alerta_email; ?>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>

          <form action="PHPMailer/envio.php" method="post" class="formulario-contact">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu Nome" required>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Seu E-mail" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="msg" id="msg" rows="5" placeholder="Mensagem" required></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="submit-form">Enviar</button>
            </div>
          </form>
        </div><!-- End Contact Form -->

      </div>
    </section>

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php 
$message->clearMessage();
include('./includes/footer.php'); 
?>
<?php 
include('./models/Message.php');
include('./models/ComentariosPost.php');

$classComentario = new Comentarios($conPDO);
$message = new Message();

if(isset($_POST['comentario'])) {
  $nome           = $_POST['comment-name'];
  $email          = $_POST['comment-email'];
  $mensagem       = $_POST['comment-message'];
  $id_do_post     = $_POST['id_post'];
  $id_respondido  = $_POST['id_respondido'];

  $retorno = $classComentario->insertComentario($id_do_post, $id_respondido, $nome, $email, $mensagem);
  $message->setMessage($retorno); 
}

$cont_coment = count($classComentario->viewComent($id_post));

?>

<!-- ======= Comments Form ======= -->
<div class="row justify-content-center mt-5" id="sec-coments">
  <div class="col-lg-12">
    <h5 class="comment-title">Deixe um comentário</h5>

    <form action="" method="post">
      <input type="hidden" value="<?php echo $id_post; ?>" id="id_post" name="id_post">
      <input type="hidden" value="<?php echo $id_respondido; ?>" id="id_respondido" name="id_respondido">

      <div class="row">
        <div class="col-lg-6 mb-3">
          <label for="comment-name">Nome</label>
          <input type="text" class="form-control" id="comment-name" name="comment-name" placeholder="Digite seu nome" required>
        </div>
        <div class="col-lg-6 mb-3">
          <label for="comment-email">E-mail</label>
          <input type="email" class="form-control" id="comment-email" name="comment-email" placeholder="Digite seu e-mail" required>
        </div>
        <div class="col-12 mb-3">
          <label for="comment-message">Mensagem</label>

          <textarea class="form-control" id="comment-message" name="comment-message" placeholder="Mensagem ..." cols="30" rows="5" required></textarea>
        </div>
        <div class="col-12">
          <input type="submit" class="btn btn-primary" id="comentario" name="comentario" value="Postar Comentário">
        </div>
      </div>
    </form>
  </div>
</div>
<!-- ======= Comments Form ======= -->

<!-- ======= Comments ======= -->
<div class="comments">
  <h5 class="comment-title py-4"><?php echo $cont_coment; ?> Comentarios</h5>

  <div class="comment d-flex mb-4">
    <div class="flex-grow-1">

      <?php 
        if($message->getMessage() <> null) {
          echo alertaMensagem($message->getMessage());
        } 
      ?>

      <?php 
        if($cont_coment <> 0) {
          foreach($classComentario->viewComent($id_post) as $value) { 

            $id_comentario    = $value['id'];
            $data             = $value['data'];
            $nome             = $value['nome'];
            $comentario       = $value['comentario'];
            
      ?>

          <div class="bloco-comentario">

            <div class="comment-meta d-flex align-items-baseline">
              <h6 class="me-2"><?php echo $nome; ?></h6>
              <span class="text-muted"><?php echo horario($data); ?></span>
            </div>

            <div class="comment-body">
              <?php echo $comentario; ?>
            </div>

            <?php
            $count_resp = count($classComentario->viewComentIndiv($id_comentario));
            if($count_resp > 0){ ?>
              <div class="comment-replies bg-light p-3 mt-3 rounded">
                <h6 class="comment-replies-title mb-4 text-muted text-uppercase"><?php echo $count_resp; ?> RESPOSTAS</h6>

                <?php foreach($classComentario->viewComentIndiv($id_comentario) as $resposta) { ?>
                    <div class="reply d-flex mb-4">
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2"><?php echo $resposta['nome']; ?></h6>
                          <span class="text-muted"><?php echo horario($resposta['data']); ?></span>
                        </div>
                        <div class="reply-body">
                          <?php echo $resposta['comentario']; ?>
                        </div>
                      </div>
                    </div>
                <?php } ?>

              </div>
            <?php } ?>

            <div class="accordion accordion-flush" id="accordionFlushExample">
              <div class="accordion-item">

                <h2 class="accordion-header" id="flush-heading<?php echo $id_comentario; ?>">
                  <button class="accordion-button collapsed btn-mostra-responder" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $id_comentario; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $id_comentario; ?>">
                    Responder
                  </button>
                </h2>

                <div id="flush-collapse<?php echo $id_comentario; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $id_comentario; ?>" data-bs-parent="#accordionExample">
                  <div class="accordion-body form-responde-comen">
                  
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $id_post; ?>" id="id_post" name="id_post">
                    <input type="hidden" value="<?php echo $id_comentario; ?>" id="id_respondido" name="id_respondido">

                    <div class="row">
                      <div class="col-lg-6 mb-3">
                        <label for="comment-name">Nome</label>
                        <input type="text" class="form-control" id="comment-name" name="comment-name" placeholder="Digite seu nome" required>
                      </div>
                      <div class="col-lg-6 mb-3">
                        <label for="comment-email">E-mail</label>
                        <input type="email" class="form-control" id="comment-email" name="comment-email" placeholder="Digite seu e-mail" required>
                      </div>
                      <div class="col-12 mb-3">
                        <label for="comment-message">Mensagem</label>

                        <textarea class="form-control" id="comment-message" name="comment-message" placeholder="Mensagem ..." cols="30" rows="5" required></textarea>
                      </div>
                      <div class="col-12">
                        <input type="submit" class="btn btn-primary" id="comentario" name="comentario" value="Responder">
                      </div>
                    </div>
                  </form>

                  </div>
                </div>

              </div>
            </div>

          </div>

      <?php  
          }
        } else {

          echo '<div class="bloco-comentario"><h5 class="text-center">Seja o primeiro a comentar !</h5></div>';

        } 
      ?>

    </div>
  </div>

</div>
<!-- ======= Comments ======= -->



<?php $message->clearMessage(); ?>

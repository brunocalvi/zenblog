<?php
include('./includes/function.php');
include('./includes/config.php');
include('./models/ViewPost.php');

$viewpost = new Postagem($conPDO);

if($_GET['id'] == null) {
  header("location:".PATH_DEFAULT);
} else {
  $id = $_GET['id']; 
}

foreach ($viewpost->postUnique($id) as $post) {
  $id_post        = $post['id'];
  $ativa          = $post['ativa'];
  $titulo         = $post['titulo'];
  $descricao      = $post['descricao'];
  $conteudo       = $post['conteudo'];
  $tags           = $post['tags'];
  $data_upload    = $post['data_upload'];
  $path           = $post['path'];
  $destaque       = $post['destaque'];
  $fonte          = $post['fonte'];
  $video_noticia  = $post['video'];
}

if($ativa == 'N') {
  header("location:".PATH_DEFAULT);
}

$url_previa = PATH_DEFAULT . 'single-post/' . $id;  

include('./includes/header.php'); 
?>

  <main id="main">

    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">

            <!-- ======= Single Post Content ======= -->
            <div class="single-post">

              <?php if($path <> null) { ?>
                <div class="img-single">
                  <img src="<?php echo PATH_DEFAULT; ?>assets/img/<?php echo $path; ?>" alt="<?php echo $titulo; ?>" class="img-fluid">
                </div>
              <?php } ?>

              <div class="post-meta">
                <span class="date"><?php echo $tags; ?></span> 
                <span class="mx-1">&bullet;</span> 
                <span><?php echo ucfirst(utf8_encode(strftime("%d de %B de %Y", strtotime($data_upload)))); ?></span>
              </div>

              <h1 class="mb-5"><?php echo $titulo; ?></h1>
              <p><?php echo $conteudo; ?></p>

            </div><!-- End Single Post Content -->

            <!-- Parte de comentarios -->
            <?php include('./includes/section-coments.php'); ?>
            
          </div>
          <div class="col-md-3">
            
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">
              <!-- opcoes a sidebar no top -->
              <?php include('./includes/sidebar-opcoes-singre.php'); ?>
            </div>

          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('./includes/footer.php'); ?>
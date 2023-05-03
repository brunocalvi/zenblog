<?php 
include('./models/ViewPost.php');
include('./includes/function.php');
include('./includes/config.php');

$viewpost = new Postagem($conPDO);
$resultado = [];


if($_GET['pesquisa'] <> null) {
  $pesquisa = $_GET['pesquisa'];
  $resultado = $viewpost->searchPost($pesquisa);

} else {
  $resultado = $viewpost->postAll(); 
}

include('./includes/header.php'); 
?>

  <main id="main">

    <!-- ======= Search Results ======= -->
    <section id="search-result" class="search-result">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h3 class="category-title">RESULTADOS:</h3>

            <?php 
            if(count($resultado) > 0) {
              foreach ($resultado as $value) {  
              
            ?>

                <div class="d-md-flex post-entry-2 small-img">
                  <a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>" class="me-4 thumbnail">
                    <img src="assets/img/<?php echo $value['path']; ?>" alt="<?php echo $value['titulo']; ?>" class="img-fluid">
                  </a>
                  <div>
                    <div class="post-meta">
                      <span class="date"><?php echo $value['tags']; ?></span> 
                      <span class="mx-1">&bullet;</span> 
                      <span><?php echo horario($value['data_upload']); ?></span>
                    </div>
                    <h3><a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>"><?php echo $value['titulo']; ?></a></h3>
                    <p><?php echo $value['descricao']; ?></p>
                    <div class="d-flex align-items-center author">
                      <div class="name">
                        <h3 class="m-0 p-0"><?php echo $value['fonte'] <> null ? 'FONTE: '.$value['fonte'] : ''; ?></h3>
                      </div>
                    </div>
                  </div>
                </div>

            <?php
              } 

            } else {
            echo '<div class="text-center">Nenhum resultado encontrado.</div>';
            
            } 
            ?>

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
    </section> <!-- End Search Result -->

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include('./includes/footer.php'); ?>
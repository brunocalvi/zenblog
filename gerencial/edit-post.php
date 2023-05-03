<?php
include('./includes/config.php');
include('./processa/time-login.php');
include('./models/Message.php');
include('./models/Post.php');
include('./utils/UploadImage.php');

$id = $_GET['edit'];
$userId = $_SESSION['userId'];
$userLogin = $_SESSION['userLogin'];

$message = new Message();
$postagem = new Post($conPDO);

if($userLogin == null) {
  header('Location: ./login.php');
}

$view = $postagem->viewPost($id);

if(isset($_POST['editPost'])) {
  $arquivo        = $_FILES['bannerPost'];
  $titulo         = $_POST['titulo'];
  $ativo          = $_POST['ativo'];
  $destaque       = $_POST['destaque'];
  $tags           = $_POST['tags'];
  $descricao      = $_POST['descricao'];
  $txtConteudo    = $_POST['txtConteudo'];
  $id             = $_POST['id'];
  $before         = $_POST['before'];
  $fonte          = $_POST['fonte'];

  $respost = $postagem->updatePost($arquivo, $titulo, $ativo, $destaque, $tags, $descricao, $txtConteudo, $id, $before, $fonte);
  header("location:".PATH_DEFAULT."edit-post.php?edit=$id&sucess");
}

if(isset($_GET['sucess'])) {
  $resport = 'Postagem atualizada com sucesso !';
  $message->setMessage($resport);
}

include('./includes/header.php');
?>

<div id="wrapper">
  <div class="container-fluid">
    <div class="container-fluid col-md-10">

      <div class="title-button-page">
        <h1 class="h3 mb-4 text-gray-800">Editar Postagem:</h1>
          <a href="list-post.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
            <span class="text">Voltar</span>
          </a>
      </div>

      <div><?php echo $message->alertMenssage($message->getMessage()); ?></div>

      <div class="card shadow mb-4">
        <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Insira os dados que deseja editar na postagem:</h6></div>
        
        <div class="card-body">

        <?php if($view[0]['path'] <> null) { ?>
          <div class="div-engloba-img">
            <img src="../assets/img/<?php echo $view[0]['path']; ?>" class="img-poup"></td>
          </div>
        <?php } ?>

        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id" value="<?php echo $view[0]['id']; ?>">
          <input type="hidden" name="before" id="before" value="<?php echo $view[0]['path']; ?>">

          <div class="form-row alig-txt">
            <div class="form-group input-new-text col-md-8">
              <label for="titulo">Titulo:</label>
              <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $view[0]['titulo']; ?>" required />
            </div>

            <div class="form-group col-md-2">
              <label for="destaque">Em Destaque:</label>
              <select class="form-control" id="destaque" name="destaque">
                <option value="S" <?php echo $view[0]['destaque'] == 'S'?'selected':''; ?>>SIM</option>
                <option value="N" <?php echo $view[0]['destaque'] == 'N'?'selected':''; ?>>NÃO</option>
                
              </select>
            </div>

            <div class="form-group col-md-2">
              <label for="ativo">Postagem Ativa:</label>
              <select class="form-control" id="ativo" name="ativo">
                <option value="S" <?php echo $view[0]['ativa'] == 'S'?'selected':''; ?>>SIM</option>
                <option value="N" <?php echo $view[0]['ativa'] == 'N'?'selected':''; ?>>NÃO</option>
              </select>
            </div>
          </div>

          <div class="form-row alig-txt">
            <div class="form-group input-new-text col-md-6">
              <label for="tags">Tag:</label>
              <small>Coloque as tags separadas por virgulas</small>
              <input type="text" class="form-control" id="tags" name="tags" value="<?php echo $view[0]['tags']; ?>">
            </div>

            <div class="form-group input-new-text col-md-6">
              <label for="tags">Fontes:</label>
              <small>Coloque da onde foi tirado a infomação</small>
              <input type="text" class="form-control" id="fonte" name="fonte" placeholder="Cameron Williamson - Editor Independe" value="<?php echo $view[0]['fonte']; ?>">
            </div>
          </div>

          <div class="form-group input-new-text col-md-12">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" name="descricao" rows="5" required ><?php echo $view[0]['descricao']; ?></textarea>
          </div>

          <div class="form-group col-md-12">
            <label for="bannerPost">Insira o banner do Post:</label>
            <input type="file" class="form-control-file" id="bannerPost" name="bannerPost">
          </div>

          <div class="form-group input-new-text col-md-12">
            <label for="txtConteudo">Conteudo:</label>
            <textarea id="txtConteudo" name="txtConteudo" required ><?php echo $view[0]['conteudo']; ?></textarea>
          </div>

          <div class="aling-button-txt">
            <button type="submit" name="editPost" id="editPost" class="btn btn-success btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-check"></i>
              </span>
              <span class="text">Editar</span>
            </button>
          </div>

        </form>
        </div>
      </div>    

    </div>
  </div>
</div>

<script>
CKEDITOR.replace('txtDescricao');
CKEDITOR.replace('txtConteudo');
</script>

<?php 
$message->clearMessage();
include('./includes/footer.php'); 
?>
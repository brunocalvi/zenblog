<?php
include('./includes/config.php');
include('./processa/time-login.php');
include('./models/Message.php');
include('./models/Post.php');
include('./utils/UploadImage.php');

$table = 'postagens';
$userId = $_SESSION['userId'];
$userLogin = $_SESSION['userLogin'];

$message = new Message();
$postagem = new Post($conPDO);

if($userLogin == null) {
  header('Location: ./login.php');
}

if(isset($_POST['createPost'])) {
  $arquivo        = $_FILES['bannerPost'];
  $titulo         = $_POST['titulo'];
  $ativo          = $_POST['ativo'];
  $destaque       = $_POST['destaque'];
  $tags           = $_POST['tags'];
  $descricao      = $_POST['descricao'];
  $txtConteudo    = $_POST['txtConteudo'];
  $fonte          = $_POST['fonte'];

  $respost = $postagem->uploadPost($arquivo, $titulo, $ativo, $destaque, $tags, $descricao, $txtConteudo, $fonte);
  $message->setMessage($respost);

}

include('./includes/header.php');
?>

<div id="wrapper">
  <div class="container-fluid">
    <div class="container-fluid col-md-10">

      <div class="title-button-page">
        <h1 class="h3 mb-4 text-gray-800">Nova Postagem:</h1>
          <a href="list-post.php" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
            <span class="text">Voltar</span>
          </a>
      </div>

      <div><?php echo $message->alertMenssage($message->getMessage()); ?></div>

      <div class="card shadow mb-4">
        <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Insira os dados para a nova Postagem:</h6></div>
        
        <div class="card-body">

        <form action="" method="POST" enctype="multipart/form-data">

          <div class="form-row alig-txt">
            <div class="form-group input-new-text col-md-8">
              <label for="titulo">Titulo:</label>
              <input type="text" class="form-control" id="titulo" name="titulo" required />
            </div>

            <div class="form-group col-md-2">
              <label for="destaque">Em Destaque:</label>
              <select class="form-control" id="destaque" name="destaque">
                <option value="S" selected>SIM</option>
                <option value="N" >NÃO</option>
              </select>
            </div>

            <div class="form-group col-md-2">
              <label for="ativo">Postagem Ativa:</label>
              <select class="form-control" id="ativo" name="ativo">
                <option value="S" selected >SIM</option>
                <option value="N" >NÃO</option>
              </select>
            </div>
          </div>

          <div class="form-row alig-txt">
            <div class="form-group input-new-text col-md-6">
              <label for="tags">Tag:</label>
              <small>Coloque as tags separadas por virgulas</small>
              <input type="text" class="form-control" id="tags" name="tags" placeholder="Show, Evento">
            </div>

            <div class="form-group input-new-text col-md-6">
              <label for="tags">Fontes:</label>
              <small>Coloque da onde foi tirado a infomação</small>
              <input type="text" class="form-control" id="fonte" name="fonte" placeholder="Cameron Williamson - Editor Independe">
            </div>
          </div>

          <div class="form-group input-new-text col-md-12">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" name="descricao" rows="5" required ></textarea>
          </div>

          <div class="form-group col-md-12">
            <label for="bannerPost">Insira o banner do Post:</label>
            <input type="file" class="form-control-file" id="bannerPost" name="bannerPost">
          </div>

          <div class="form-group input-new-text col-md-12">
            <label for="txtConteudo">Conteudo:</label>
            <textarea id="txtConteudo" name="txtConteudo" required ></textarea>
          </div>

          <div class="aling-button-txt">
            <button type="submit" name="createPost" id="createPost" class="btn btn-success btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-check"></i>
              </span>
              <span class="text">Postar</span>
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
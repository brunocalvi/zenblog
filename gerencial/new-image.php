<?php
include('./includes/config.php');
include('./processa/time-login.php');
include('./models/Message.php');
include('./utils/UploadImage.php');

$userId = $_SESSION['userId'];
$userLogin = $_SESSION['userLogin'];

$message = new Message();
$upload = new UploadImage($conPDO);


if($userLogin == null) {
  header('Location: ./login.php');
}

if(isset($_POST['buttonFile'])) {

  $image = $_FILES['imgFile'];
  $respost = $upload->image($image);
  $message->setMessage($respost);
}

include('./includes/header.php');
?>

<div class="container-fluid col-md-10">

    <div class="title-button-page">
      <h1 class="h3 mb-4 text-gray-800">Upload de imagem:</h1>
        <a href="image.php" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
          <span class="text">Voltar</span>
        </a>
    </div>

    <div>
      <?php echo $message->alertMenssage($message->getMessage()); ?>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Insira a nova imagem:</h6>
      </div>
      <div class="card-body">

      <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group input-new-text col-md-12">
          <label for="imgFile">Insira a imagem:</label>
          <input type="file" class="form-control-file" id="imgFile" name="imgFile">
        </div>

        <div class="aling-button-txt">
          <button type="submit" name="buttonFile" id="buttonFile" class="btn btn-success btn-icon-split">
              <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
              </span>
              <span class="text">Inserir Imagem</span>
          </button>
        </div>

      </form>
  
      </div>
    </div>    

</div>



<?php 
$message->clearMessage();
include('./includes/footer.php'); 
?>
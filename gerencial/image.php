<?php
include('./includes/config.php');
include('./processa/time-login.php');
include('./models/Message.php');
include('./utils/SiteUtility.php');
include('./utils/UploadImage.php');

$table = 'imagens';
$userId = $_SESSION['userId'];
$userLogin = $_SESSION['userLogin'];

$message = new Message();
$utilit = new Utilit($conPDO);
$upload = new UploadImage($conPDO);


if($userLogin == null) {
  header('Location: ./login.php');
}

if(isset($_POST['del'])) {
    $respost = $upload->delRegisterImg($_POST['del']);
    $message->setMessage($respost);
}

include('./includes/header.php');
?>

<div class="container-fluid col-md-10">
    <div class="title-button-page">
      <h1 class="h3 mb-4 text-gray-800">Imagens:</h1>

       <a href="new-image.php" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
              <i class="fas fa-flag"></i>
          </span>
          <span class="text">Nova</span>
        </a>
    </div>

    <div>
        <?php echo $message->alertMenssage($message->getMessage()); ?>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Imagens Cadastradas:</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Caminho</th>
                            <th>prévia</th>
                            <th class="acoes">Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Caminho</th>
                            <th>prévia</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>

                    <?php foreach($utilit->listData($table) as $imagens){ ?>

                        <tr>
                            <td><?php echo $imagens['id']; ?></td>
                            <td><?php echo PREFIXO .'assets/img/imagens-site/'. $imagens['path']; ?></td>
                            <td class="d-flex justify-content-center">
                                <a href="<?php echo PREFIXO .'assets/img/imagens-site/'. $imagens['path']; ?>" target='_blank'>
                                    <img src="<?php echo PREFIXO .'assets/img/imagens-site/'. $imagens['path']; ?>" class="img-previa">
                                </a>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-grid">
                                    <form action="" method="POST">          
                                        <input type="hidden" name="del" id="del" value="<?php echo $imagens['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-circle" title="Deletar" style="margin-right: 10px;"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>												
                            </td> 
                        </tr>

                    <?php } ?>

                    </tbody>
                </table>
                        
            </div>
        </div>
    </div>

</div>


<?php 
$message->clearMessage();
include('./includes/footer.php'); 
?>
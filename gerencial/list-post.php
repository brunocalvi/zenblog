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

if(isset($_POST['del'])) {
  $respost = $postagem->deletePostagens($_POST['del']);
  $message->setMessage($respost);
}

include('./includes/header.php');
?>

<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div class="container-fluid col-md-10">
      <div class="title-button-page">
        <h1 class="h3 mb-4 text-gray-800">Postagens:</h1>

        <a href="new-post.php" class="btn btn-primary btn-icon-split">
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
        <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Postagens Cadastradas:</h6></div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>cadastrada</th>
                            <th>Destaque</th>
                            <th class="acoes">Ações</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>cadastrada</th>
                            <th>Destaque</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      
                      <?php 
                        foreach($postagem->listPost($table) as $post){ 
                        $date = new DateTime($post['data_upload']);
                      ?>
                        <tr>
                            <td><?php echo $post['id']; ?></td>
                            <td><?php echo $post['titulo']; ?></td>
                            <td><?php echo $date-> format('d/m/Y'); ?></td>
                            <td><?php echo $post['destaque'] == "S" ? 'SIM' : 'NÃO'; ?></td>
                            <td>
                              <div class="d-flex justify-content-center">
                                  <form action="" method="POST">          
                                      <input type="hidden" name="del" id="del" value="<?php echo $post['id']; ?>">
                                      <button type="submit" class="btn btn-danger btn-circle" title="Deletar Usuário" style="margin-right: 10px;"><i class="fas fa-trash"></i></button>
                                  </form>
                                  <form action="edit-post.php" method="GET">          
                                      <input type="hidden" name="edit" id="edit" value="<?php echo $post['id']; ?>">
                                      <button type="submit" class="btn btn-info btn-circle" title="Editar Usuário"><i class="fas fa-info-circle"></i></button>
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

  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->  

<?php 
$message->clearMessage();
include('./includes/footer.php'); 
?>
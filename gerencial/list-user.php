<?php
include('./includes/config.php');
include('./processa/time-login.php');
include('./models/Message.php');
include('./utils/SiteUtility.php');
include('./utils/User.php');

$table = 'login';
$userId = $_SESSION['userId'];
$userLogin = $_SESSION['userLogin'];

$message = new Message();
$utilit = new Utilit($conPDO);
$user = new User($conPDO);


if($userLogin == null) {
  header('Location: ./login.php');
}

if(isset($_POST['del'])) {
  $message->setMessage($user->deleteUser($_POST['del']));
}

include('./includes/header.php');
?>

<div class="container-fluid col-md-10">

  <div class="title-button-page">
    <h1 class="h3 mb-4 text-gray-800">Usuários:</h1>
      <a href="new-user.php" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50"><i class="fas fa-flag"></i></span>
        <span class="text">Novo Usuário</span>
      </a>
  </div>

  <div>
      <?php echo $message->alertMenssage($message->getMessage()); ?>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usuários cadastrados no gerencial:</h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
                 <th>Usuário</th>
                 <th>Senha</th>
                 <th class="acoes">Ações</th>
              </tr>
          </thead>
          <tfoot>
              <tr>
                 <th>Usuário</th>
                 <th>Senha</th>
                 <th>Ações</th>   
              </tr>
          </tfoot>
          <tbody>

          <?php foreach($utilit->listData($table) as $users){ ?>

            <tr>
              <td><?php echo $users['login']; ?></td>
              <td><?php echo $users['senha']; ?></td>          
              <td>
                <div class="d-flex justify-content-center">
                    <form action="" method="POST">          
                        <input type="hidden" name="del" id="del" value="<?php echo $users['id']; ?>">
                        <button type="submit" class="btn btn-danger btn-circle" title="Deletar Usuário" style="margin-right: 10px;"><i class="fas fa-trash"></i></button>
                    </form>
                    <form action="edit-user.php" method="GET">          
                        <input type="hidden" name="edit" id="edit" value="<?php echo $users['id']; ?>">
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

<?php 
$message->clearMessage();
include('./includes/footer.php'); 
?>
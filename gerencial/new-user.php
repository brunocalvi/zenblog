<?php
include('./includes/config.php');
include('./processa/time-login.php');
include('./models/Message.php');
include('./utils/User.php');

$userId = $_SESSION['userId'];
$userLogin = $_SESSION['userLogin'];

$message = new Message();
$user = new User($conPDO);

if($userLogin == null) {
  header('Location: ./login.php');
}

if(isset($_POST['createUser'])) {
  $userLogin     = $_POST['user'];
  $userSenha     = $_POST['password'];

  if($userLogin == null OR $userSenha == null) {
    $resport = 'Precisa de um usuário e senha para cadastrar !';

  } else {
    $resport = $user->insertUser($userLogin, $userSenha);
  }

  $message->setMessage($resport);
}

include('./includes/header.php');
?>

  <div class="container-fluid col-md-10">
    <div class="title-button-page">
      <h1 class="h3 mb-4 text-gray-800">Criar novo Usuário:</h1>
        <a href="list-user.php" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
          <span class="text">Voltar</span>
        </a>
    </div>

    <div>
      <?php echo $message->alertMenssage($message->getMessage()); ?>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Insira os dados do novo usuário:</h6>
      </div>
      <div class="card-body">

        <form action="" method="POST">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="user">Usuário</label>
              <input type="text" class="form-control" id="user" name="user" placeholder="Insira o nome do usuário ..." required>
            </div>

            <div class="form-group col-md-6">
              <label for="password">Senha</label>
              <input type="text" class="form-control" id="password" name="password" placeholder="Senha ..." required>
            </div>

          </div>

          <div class="aling-button-txt">
            <button type="submit" name="createUser" id="createUser" class="btn btn-success btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-check"></i>
              </span>
              <span class="text">Criar Usuário</span>
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
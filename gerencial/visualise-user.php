<?php
include('./includes/config.php');
include('./processa/time-login.php');
include('./models/Message.php');
include('./utils/User.php');

$userId = $_SESSION['userId'];
$userLogin = $_SESSION['userLogin'];
$resport = '';

$message = new Message();
$user = new User($conPDO);

if($userLogin == null) {
  header('Location: ./login.php');

}

$view = $user->viewUser($userId);

$login      = $view[0]['login'];
$senha      = $view[0]['senha'];

if(isset($_POST['editUser'])) {
  $userSenha     = $_POST['password'];
 
  if($userSenha == null) {
    $resport = 'Não pode deixar a senha em branco !';

  } elseif($userSenha === $senha) {
    $resport = 'Senha não foi alterada';

  } else {
    $resport = $user->updateUser($userId, $login, $userSenha, $master, $banner, $texto, $url, $imagem, $parceiros, $pop_up);
  }          
}

$message->setMessage($resport);

include('./includes/header.php');
?>

  <div class="container-fluid col-md-10">
    <div class="title-button-page">
      <h1 class="h3 mb-4 text-gray-800">Usuário:</h1>
        <a href="index.php" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
          <span class="text">Voltar</span>
        </a>
    </div>

    <div>
      <?php echo $message->alertMenssage($message->getMessage()); ?>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Seus dados e permissões:</h6>
      </div>
      <div class="card-body">

        <form action="" method="POST">
          <div class="row">

            <div class="form-group col-md-6">
              <label for="user">Usuário</label>
              <input type="text" class="form-control" id="user" name="user" value="<?php echo $login; ?>" disabled>
            </div>

            <div class="form-group col-md-6">
              <label for="password">Senha</label>
              <input type="text" class="form-control" id="password" name="password" value="<?php echo $senha; ?>">
            </div>

          </div>

          <div class="aling-button-txt">
            <button type="submit" name="editUser" id="editUser" class="btn btn-success btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-check"></i>
              </span>
              <span class="text">Editar Usuário</span>
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
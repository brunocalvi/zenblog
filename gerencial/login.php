<?php
include('./models/Message.php');
$message = new Message();

include('./includes/config.php');
include('./models/LoginUser.php');

if(isset($_POST['logar'])){
    $userLogin = $_POST['username'];
    $userSenha = $_POST['password'];

    $login = new dadosUser($userLogin, $userSenha, $conPDO);
    $valid = $login->validaLogin();

    if(is_numeric($valid)) {
        $_SESSION['userLogin'] = $userLogin;
        $_SESSION['userId'] = $valid;
        $_SESSION["sessiontime"] = time() + 2400;

        header("location:".PATH_DEFAULT."index.php");

    } else {
        $message->setMessage($valid);
    }    
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Gerencial</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 10rem!important;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bem vindo de volta!</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="username" aria-describedby="emailHelp"
                                                placeholder="Insira o usuario...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password">
                                        </div>
                                        
                                        <button type="submit" name="logar" class="btn btn-primary btn-user btn-block">Login</button>
                                        
                                    </form>
                                    <hr>

                                <?php $message->alertMenssage($message->getMessage()); ?>

                                <a href="<?php echo PREFIXO; ?>" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-reply-all" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">Retornar ao site</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php $message->clearMessage(); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
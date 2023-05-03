<?php
include('./models/Message.php');
$message = new Message();

include('./includes/config.php');
include('./processa/time-login.php');
include('./utils/SiteUtility.php');

$userId = $_SESSION['userId'];
$userLogin = $_SESSION['userLogin'];

$utilit = new Utilit($conPDO);

if($userLogin == null OR $userId == null) {
    header('Location: ./login.php');
}

header('Location: '.PATH_DEFAULT.'list-post.php');

include('./includes/header.php'); 
?>
             
<div class="container-fluid">
  <div class="row">

    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Estatísticas:</h6>
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>

  </div>
</div>
    
<?php include('./includes/footer.php'); ?>
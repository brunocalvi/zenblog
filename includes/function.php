<?php 
function horario($data_upload) {
  $publicado = ucfirst(utf8_encode(strftime("%d de %B - %H:%I", strtotime($data_upload))));

  return $publicado;
}

function alertaMensagem($value) {
?>
    <div class="container text-center margin">
      <?php if(strstr($value,"sucesso")) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $value; ?> 
        </div>
      <?php } else { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $value; ?>
        </div>
      <?php } ?>
    </div>

<?php 
}




?>
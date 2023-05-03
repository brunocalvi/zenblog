<?php

class UploadImage {
  protected static $table = "imagens";
  private $conPDO;

  public function __construct($conPDO){
    $this->con = $conPDO;
  }

  public function image($arquivo) {
    if($arquivo['size'] == 0) {
      return "Selecione uma imagem !<br/>";    
    }
  
    if($arquivo['error']) {
      return "Falha ao enviar a imagem, tente novamente !<br/>";
    }
  
    $pasta = "../assets/img/imagens-site/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != 'png' && $extensao != 'jpeg' && $extensao != 'gif') {
      return "Tipo de arquivo não aceito !<br/>";
    }
      
    if($arquivo['size'] > 2097152) {
      return "Arquivo muito grande ! Max: 2MB<br/>";
    }
  
    $novoNome = $novoNomeDoArquivo . '.' . $extensao; 
    $path = $pasta . $novoNomeDoArquivo . '.' . $extensao ;
    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path );
                        
    if ($deu_certo) {
      $query = "INSERT INTO ".self::$table." (path) VALUES (:path)";
      $stmt = $this->con->prepare($query);
        $parans = array(
          "path" => $novoNome
        );

      $stmt->execute($parans);

      return "Imagem enviada com sucesso !<br/>";
    }
  }

  public function delRegisterImg($del) {
    $query = "SELECT * FROM ".self::$table." WHERE id = :id";
    $delete = $this->con->prepare($query);
      $parans = array(
        "id" => $del
      );
    $delete->execute($parans);
    $dados_del = $delete->fetchAll(PDO::FETCH_ASSOC);

    foreach ($dados_del as $del) {
      $path = '../assets/img/imagens-site/' . $del['path'];        
        if(unlink($path)) {
          $query = "DELETE FROM ".self::$table." WHERE id = :id";
          $stmt = $this->con->prepare($query);
            $parans = array(
              "id" => $del['id']
            );
          $stmt->execute($parans);
            if($stmt) {
              return "Arquivo excluido com sucesso !";
            } else {
              return "falha ao excluir o arquivo !";
            }
        }
    }
  }






}

?>
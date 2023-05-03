<?php 

class Comentarios {
  private $conPDO;
  protected static $table = "comentarios";

  public function __construct($conPDO) {
    $this->con = $conPDO;
  }

  public function viewComent($id_do_post) {
    $list = array();
    
    $query = "SELECT * FROM ".self::$table." WHERE id_post = :id_post AND id_respondido = 0 ORDER BY id DESC";
    $select = $this->con->prepare($query);
      $params = array(
        "id_post" => $id_do_post
      );
    $select->execute($params);
    $poup = $select->fetchAll(PDO::FETCH_ASSOC);

      foreach($poup as $register){
        array_push($list, $register);
      }

    return $list;
  }

  public function viewComentIndiv($id_do_comentario) {
    $list = array();
    
    $query = "SELECT * FROM ".self::$table." WHERE id_respondido = :id_respondido ORDER BY id DESC";
    $select = $this->con->prepare($query);
      $params = array(
        "id_respondido" => $id_do_comentario
      );
    $select->execute($params);
    $poup = $select->fetchAll(PDO::FETCH_ASSOC);

      foreach($poup as $register){
        array_push($list, $register);
      }

    return $list;
  }

  public function insertComentario($id_do_post, $id_respondido, $nome, $email, $mensagem) {
    $erro = false;

    if (!isset($nome)) {
      $erro =  'Insira um nome!';
    }

    if ((!isset( $email ) || !filter_var($email, FILTER_VALIDATE_EMAIL))) {
      $erro =  'Envie um email válido!';
    }

    if (!isset($mensagem)) {
      $erro =  'Precisa ter um comentário!';
    }

    if($erro == false) {
      $insert = "INSERT INTO ".self::$table." (id_post, id_respondido, nome, email, comentario) VALUES (:id_post, :id_respondido, :nome, :email, :comentario)";
      $stmt = $this->con->prepare($insert);
        $parans = array(
          "id_post" => $id_do_post, 
          "id_respondido" => $id_respondido, 
          "nome" => $nome, 
          "email" => $email, 
          "comentario" => $mensagem
        );
      $stmt->execute($parans);

      return 'Comentário postado com sucesso!';

    } else {
      return $erro;
    }
  }

















}
?>
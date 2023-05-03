<?php 

class User {
  protected static $table = "login";
  private $conPDO;

  public function __construct($conPDO){
    $this->con = $conPDO;
  }

  public function viewUser($id) {
    $list = [];
    
    $query = "SELECT * FROM ".self::$table." WHERE id = :id";
    $select = $this->con->prepare($query);
      $parans = array(
        "id" => $id
      );

    $select->execute($parans);
    $banner = $select->fetchAll(PDO::FETCH_ASSOC);

      foreach($banner as $register){
        array_push($list, $register);
      }

    return $list;
  }

  public function deleteUser($id) {
    $query = "DELETE FROM ".self::$table." WHERE id = :id";
    $stmt = $this->con->prepare($query);
      $parans = array(
        "id" => $id
      );
    $stmt->execute($parans);

    return "Usuário deletado com sucesso !";
  }

  public function insertUser($userLogin, $userSenha) {
    $query = "INSERT INTO ".self::$table." (login, senha) 
              VALUES (:login, :senha)";
    $stmt = $this->con->prepare($query);
      $params = array(
        "login" => $userLogin,
        "senha" => $userSenha
      );
    $stmt->execute($params);

    return 'Usuário cadastrado com sucesso !';

  }

  public function updateUser($id, $userLogin, $userSenha) {
    $query = "UPDATE ".self::$table." SET login = :login, senha = :senha WHERE id = :id";
    $stmt = $this->con->prepare($query);
      $params = array(
        "id" => $id,
        "login" => $userLogin,
        "senha" => $userSenha
      );
    $stmt->execute($params);

    return 'Usuário atualizado com sucesso !';
  }






}

?>
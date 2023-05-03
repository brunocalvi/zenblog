<?php
class dadosUser {

  private $username;
  private $password;
  private $conPDO;

    public function __construct($username, $password, $conPDO){
      $this->username = $username;
      $this->password = $password;
      $this->con = $conPDO;
    }

    public function validaLogin(){
      $query = "SELECT * FROM login WHERE login = :login or senha = :senha"; 
      $select = $this->con->prepare($query);
        $params = array(
          "login" => $this->username,
          "senha" => $this->password
        );  
      $select->execute($params);
      $acessos = $select->fetchAll(PDO::FETCH_ASSOC);
      $count_acessos = count($acessos);

      if ($count_acessos > 0) { 
        foreach($acessos as $acesso){
          if($this->username <> $acesso["login"]) {
            return "Usuário invalido !";

          } elseif($this->password <> $acesso["senha"]) {
            return "Senha invalida !";

          } else {
              $this->insertLog($acesso["id"]);
              return $acesso["id"];   
          }
        }

      } else {
          return "Usuário e senha inválidos !"; 
      }    
    }

    public function insertLog($id) {
      $descricao = 'Fez Login';
      $ip = $_SERVER['REMOTE_ADDR'];

      $query = "INSERT INTO logs (id_user, ip, descricao) VALUES (:id_user, :ip, :descricao)";
      $stmnt = $this->con->prepare($query);
      $params = array(
          "id_user" => $id,
          "ip" => $ip,
          "descricao" => $descricao
      );
      $stmnt->execute($params);

    }

    public function getUserName(){
      return $this->username;
    }

}

?>
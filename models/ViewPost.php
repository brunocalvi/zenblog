<?php 
class Postagem {
  private $conPDO;
  protected static $table = "postagens";
  
  public function __construct($conPDO){
    $this->con = $conPDO;
  }

  public function postAll() {
    $list = [];

    $query = "SELECT * FROM " . self::$table . " WHERE ativa = 'S' ORDER BY id DESC";
    $select = $this->con->prepare($query);
    $select->execute();
    $dices = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach($dices as $data){
        array_push($list, $data);
      }

    return $list;  
  } 

  public function postMaster() {
    $list = [];

    $query = "SELECT * FROM " . self::$table . " WHERE destaque = 'N' AND  ativa = 'S' LIMIT 1";
    $select = $this->con->prepare($query);
    $select->execute();
    $dices = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach($dices as $data){
        array_push($list, $data);
      }

    return $list;  
  } 
  
  public function listPost() {
    $list = [];

    $query = "SELECT * FROM " . self::$table . " WHERE ativa = 'S' ORDER BY id DESC LIMIT 5";
    $select = $this->con->prepare($query);
    $select->execute();
    $dices = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach($dices as $data){
        array_push($list, $data);
      }

    return $list;  
  }

  public function postImpares() {
    $list = [];

    $query = "SELECT * FROM " . self::$table . " WHERE ativa = 'S' AND id % 2 = 1 ORDER BY id DESC LIMIT 10";
    $select = $this->con->prepare($query);
    $select->execute();
    $dices = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach($dices as $data){
        array_push($list, $data);
      }

    return $list;  
  }  
  
  public function postPares() {
    $list = [];

    $query = "SELECT * FROM " . self::$table . " WHERE ativa = 'S' AND id % 2 = 0 ORDER BY id DESC LIMIT 10";
    $select = $this->con->prepare($query);
    $select->execute();
    $dices = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach($dices as $data){
        array_push($list, $data);
      }

    return $list;  
  }

  public function incrementCounter($id){
    $query = "UPDATE " . self::$table . " SET hits = hits + 1 WHERE id = :id";
    $update = $this->con->prepare($query);
      $params = array(
        'id' => $id
      );
    $update->execute($params);
  }

  public function postUnique($id) {
    $list = [];

    $query = "SELECT * FROM " . self::$table . " WHERE ativa = 'S' AND id = :id";
    $select = $this->con->prepare($query);
      $params = array(
        'id' => $id
      );
    $select->execute($params);
    $dices = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach($dices as $data){
        array_push($list, $data);
      }

    $this->incrementCounter($id);

    return $list;  
  }

  public function listHits() {
    $list = [];

    $query = "SELECT * FROM " . self::$table . " WHERE ativa = 'S' ORDER BY hits DESC LIMIT 5";
    $select = $this->con->prepare($query);
    $select->execute();
    $dices = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach($dices as $data){
        array_push($list, $data);
      }

    return $list;  
  }

  public function listPopu() {
    $list = [];

    $query = "SELECT id_post, count(id_post) AS total_por_post 
              FROM  comentarios 
              WHERE id_post
              GROUP BY id_post
              ORDER BY count(id_post) DESC LIMIT 5";
    $select = $this->con->prepare($query);
    $select->execute();
    $dices = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach($dices as $data){
        array_push($list, $data);
      }

      return $list;
  }

  public function searchPost($value) {
    $list = [];

    $tratamento = strtolower($value);
    $pesquisa = '%'.$tratamento.'%';

    $query = "SELECT * FROM " . self::$table . " WHERE ativa = 'S' AND titulo LIKE :titulo";
    $select = $this->con->prepare($query);
      $params = array(
        'titulo' => $pesquisa
      );
    $select->execute($params);
    $dices = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach($dices as $data){
        array_push($list, $data);
      }

    return $list;   
  } 

}
?>
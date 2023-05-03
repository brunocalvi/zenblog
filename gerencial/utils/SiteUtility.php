<?php 

class Utilit {
  private $conPDO;
  
  public function __construct($conPDO){
    $this->con = $conPDO;
  }

  public function listData($table) {
    $list = [];

    $query = "SELECT * FROM " . $table;
    $select = $this->con->prepare($query);
    $select->execute();
    $dices = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach($dices as $data){
        array_push($list, $data);
      }
    return $list;  
  }




}

?>
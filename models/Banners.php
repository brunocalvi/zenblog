<?php
class Banner {
  private $conPDO;
  
  public function __construct($conPDO){
    $this->con = $conPDO;
  }

  public function listBanners() {
    $list = [];

    $query = "SELECT * FROM postagens WHERE destaque = 'S'";
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
<?php
class Post {
  protected static $table = "postagens";
  private $conPDO;

  public function __construct($conPDO){
    $this->con = $conPDO;
  }

  public function deletePostagens($del) {
    $query = "SELECT * FROM ".self::$table." WHERE id = :id";
    $delete = $this->con->prepare($query);
      $parans = array(
        "id" => $del
      );
    $delete->execute($parans);
    $dados_del = $delete->fetchAll(PDO::FETCH_ASSOC);

    
    foreach ($dados_del as $del) {
      if($del['path'] <> null) { 
        $path = '../assets/img/' . $del['path'];  

        if(unlink($path)) {
          $query = "DELETE FROM ".self::$table." WHERE id = :id";
          $stmt = $this->con->prepare($query);
            $parans = array(
              "id" => $del['id']
            );
          $stmt->execute($parans);
        }

      } else {

        $query = "DELETE FROM ".self::$table." WHERE id = :id";
          $stmt = $this->con->prepare($query);
            $parans = array(
              "id" => $del['id']
            );
          $stmt->execute($parans);

      }
    }

    if($stmt) {
      // Deleta os comentarios relacionado a postagem
      $this->deleteComentarios($del['id']);
      return "Postagem deletada com sucesso !";

    } else {
      return "Falha ao deletar a postagem !";
    }
    
  }

  public function deleteComentarios($value) {
    $delete = "DELETE FROM comentarios WHERE id_post = :id_post";
    $stmt = $this->con->prepare($delete);
      $parans = array(
        "id_post" => $value
      );
    $stmt->execute($parans);

  }

  public function listPost($table) {
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

  public function viewPost($id) {
    $list = array();
    
    $query = "SELECT * FROM ".self::$table." WHERE id = :id ORDER BY id ASC";
    $select = $this->con->prepare($query);
      $params = array(
        "id" => $id
      );
    $select->execute($params);
    $poup = $select->fetchAll(PDO::FETCH_ASSOC);

      foreach($poup as $register){
        array_push($list, $register);
      }

    return $list;
  }

  public function uploadPost($arquivo, $titulo, $ativo, $destaque, $tags, $descricao, $txtConteudo, $fonte) {

    if($arquivo['size'] <> 0 && $arquivo['error'] <> 4 && $arquivo['tmp_name'] <> null) {

      if($arquivo['size'] == 0) {
        return "Selecione uma imagem !<br/>";    
      }
    
      if($arquivo['error']) {
        return "Falha ao enviar a imagem, tente novamente !<br/>";
      }
    
      $pasta = "../assets/img/";
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
      $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);

    } else {
      $deu_certo = true;
      $novoNome = '';
    }

    if ($deu_certo) {
      $query = "INSERT INTO ".self::$table." (path, titulo, ativa, destaque, tags, descricao, conteudo, fonte) VALUES (:path, :titulo, :ativa, :destaque, :tags, :descricao, :conteudo, :fonte)";
      $stmt = $this->con->prepare($query);
        $parans = array(
          "path" => $novoNome, 
          "titulo" => $titulo, 
          "ativa" => $ativo, 
          "destaque" => $destaque, 
          "tags" => $tags, 
          "descricao" => $descricao, 
          "conteudo" => $txtConteudo,
          "fonte" => $fonte
        );

      $stmt->execute($parans);

      return "Postagem cadastrada com sucesso !<br/>";
    }
  }

  public function updatePost($arquivo, $titulo, $ativo, $destaque, $tags, $descricao, $txtConteudo, $id, $before, $fonte) {
    $novoNome = '';

    if($arquivo['type'] <> null) {
      if($arquivo['size'] == 0) {
        return "Selecione uma imagem !<br/>";    
      }
      if($arquivo['error']) {
        return "Falha ao enviar a imagem, tente novamente !<br/>";
      }
      $pasta = "../assets/img/";
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

    } else {
      $deu_certo = true;
    }

    if ($deu_certo) {
      if($arquivo['type'] <> null){
        unlink('../assets/img/' . $before);
      }

      if($novoNome == null){
        $novoNome = $before;
      }
        
      $query = "UPDATE ".self::$table." SET path = :path, titulo = :titulo, ativa = :ativa, destaque = :destaque, tags = :tags, descricao = :descricao, conteudo = :conteudo, fonte = :fonte WHERE id = :id";
      $stmt = $this->con->prepare($query);
        $params = array(
          "id" => $id,
          "path" => $novoNome, 
          "titulo" => $titulo, 
          "ativa" => $ativo, 
          "destaque" => $destaque, 
          "tags" => $tags, 
          "descricao" => $descricao, 
          "conteudo" => $txtConteudo,
          "fonte" => $fonte 
        );
      $stmt->execute($params);

      return "Postagem Atualizada com sucesso !<br/>";
    }

  }

} 

?>
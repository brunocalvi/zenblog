<?php 
session_start();

ini_set('display_errors',               0);
ini_set('display_startup_errors',       0);

define('PATH_DEFAULT', 			            'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
define('PREFIXO',                       'http://localhost/zenblog/');


//Banco de Dados Gerencial		
define('DB_SERVER',                     'localhost');
define('DB_USERNAME',                   'root');
define('DB_PASSWORD',                   '');
define('DB_NAME',                       'blog');
 
try{
    $conPDO = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
  $message->setMessage("ERROR: Não foi possível conectar ao BD." . $e->getMessage());
  header("location:".PATH_DEFAULT."404.php"); 
}
?>
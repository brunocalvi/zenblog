<?php
// start SESSAO todas paginas
session_start();

ini_set('display_errors',           0);
ini_set('display_startup_errors',   0);

define('TITLE',                     'BLOG - CALVITECH');
define('PATH_DEFAULT',              'http://localhost/zenblog/');

define('WHATSAPP',                  'https://web.whatsapp.com/');
define('MASCARA_NUMERO',            '+1 5589 55488 55');
define('EMAIL_VISUAL_NO_SITE',      'tech@blog.com');
define('ENDERECO',                  'A108 Adam Street, NY 535022, USA');

//Redes sociais
define('TWITTER',                   '#');
define('FACEBOOK',                  '#');
define('INSTAGRAM',                 '#');
define('SKYPE',                     '#');
define('LINKEDIN',                  '#');

// dados do e-mail do formulario
define('DISPARA_MAIL', 			    	  ''); // e-mail que vai receber os dados do contato
define('DISPARA_NAME', 			    	  ''); // nome no e-mail que vai receber os dados do contato
define('PASSWORD_MAIL',             ''); // senha do email que vai receber os dados do contato
define('ASSUNTO_EMAIL',             'Contato pelo BLOG'); //assunto do e-mail
define('HOST_EMAIL',                'smtp.gmail.com'); // Servidor
define('PORT_SERVE',                465); // porta do servidor de e-mail

//Banco de Dados Gerencial		
define('DB_SERVER',                 'localhost');
define('DB_USERNAME',               'root');
define('DB_PASSWORD',               '');
define('DB_NAME',                   'blog');
 
try{
    $conPDO = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
  echo "ERROR: Não foi possível conectar ao BD." . $e->getMessage();
  exit();
}

?>
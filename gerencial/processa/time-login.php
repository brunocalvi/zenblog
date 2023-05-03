<?php
if ( isset( $_SESSION["sessiontime"])) { 
    if ($_SESSION["sessiontime"] < time()) {
        session_destroy();
        header ("location:./login.php");
       #se session for menor que o time ele destroi a session e redireciona pra login

    } else {
        $_SESSION["sessiontime"] = time() + 600;
       #se session for maior que o o time ele adiciona mais 600 na sessiontime 

    }

} else { 
    header ("location:./login.php");
    #se sessiontime tiver vazia ele vai direto pra login.php
}

//echo '<pre>';  print_r($_SESSION); echo '</pre>';

?>
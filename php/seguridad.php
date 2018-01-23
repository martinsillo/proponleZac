<?php

session_start();
// para propositos de desarrollo, se crea de forma temporal la variable de sesion key_page
$_SESSION['key_page'] = md5('secret word');

if(!isset($_SESSION['key_page'])){
    session_destroy();
}else{
    // declaramos las variables de sesion
    $_SESSION['user_id'] = 1;
    $_SESSION['perfil'] = 2;
}

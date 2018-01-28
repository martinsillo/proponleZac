<?php
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_httponly', 1);
    session_start();
    session_regenerate_id(true);

   function getRealIP() {

        if (!empty($_SERVER['HTTP_HOST']))
            return $_SERVER['HTTP_HOST'];

       if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
           return $_SERVER['HTTP_X_FORWARDED_FOR'];

       return $_SERVER['REMOTE_ADDR'];
   }



    $_SESSION['key'] = md5(sha1("LaborVincitOmnia-%SCDWEF)WET=AWFEUJF)R)WUF)PEFUDP)RTUSERIji"));
    $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
    $_SESSION['IPaddress'] = getRealIP();
    $_SESSION['fingerprint'] = md5($_SERVER['HTTP_USER_AGENT']);
    header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");





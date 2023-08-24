<?php
    session_start();

    session_destroy();
    
    // delete cookie when user logout
    setcookie('login_id', '', time() - 2600);
    setcookie('nickname', '', time() - 2600);
    
    header('Location: index.php');
?>
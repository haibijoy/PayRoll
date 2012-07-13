<?php
session_start();
unset($_SESSION['user']);
session_unset();
session_destroy();
//setcookie ("user", "",time()-60*60*24*100, "/");
//echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php\">" ;
header('Location: index.php');
?>
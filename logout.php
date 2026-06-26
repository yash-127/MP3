<?php

if(isset($_COOKIE["login"])) {
    $email=$_COOKIE["login"];
    setcookie("login",$email,time()-1);
    header("location:index.php");
}
else{
    header("location:index.php?error=1");
}
?>
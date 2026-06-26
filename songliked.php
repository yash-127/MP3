<?php

if(isset($_COOKIE["login"])){
    $email = $_COOKIE["login"];

    if(empty($_POST["sn"]) || empty($_POST["scode"]) || empty($_POST["action"])){
        header("location:index.php?empty=1");
        exit();
    }
    else{
        $conn = mysqli_connect("127.0.0.1","root","","mp3");

        $sn = mysqli_real_escape_string($conn, $_POST["sn"]);
        $scode = mysqli_real_escape_string($conn, $_POST["scode"]);
        $action = mysqli_real_escape_string($conn, $_POST["action"]);

        $ccode = "";
        $rs = mysqli_query($conn, "select * from clients where email='$email'");
        if($r = mysqli_fetch_array($rs)){
            $ccode = $r["code"];
        }

        if($action == "like"){
            if(mysqli_query($conn, "insert ignore into clliked(sn, scode, client) values('$sn', '$scode', '$ccode')") > 0){
                echo "liked";
                exit();
            }
            else{
                header("location:index.php?again=1");
            }
        }
        else if($action == "unlike"){
            if(mysqli_query($conn, "delete from clliked where sn='$sn' and scode='$scode' and client='$ccode'") > 0){
                echo "unliked";
                exit();
            }
            else{
                header("location:index.php?again=1");
            }
        }
        else{
            header("location:index.php?invalid=1");
        }
    }
}
else{
    header("location:index.php?nope=1");
}

?>

<?php

if(isset($_COOKIE["login"])){
    $email = $_COOKIE["login"];

    if(empty($_POST["acode"]) || empty($_POST["action"])){
        header("location:index.php?empty=1");
        exit();
    }
    else{
        $conn = mysqli_connect("127.0.0.1","root","","mp3");

        $acode = mysqli_real_escape_string($conn, $_POST["acode"]);
        $action = mysqli_real_escape_string($conn, $_POST["action"]);

        $ccode = "";
        $rs = mysqli_query($conn, "select * from clients where email='$email'");
        if($r = mysqli_fetch_array($rs)){
            $client = $r["code"];
        }

        if($action == "like"){
            if(mysqli_query($conn, "insert ignore into clalbliked(code, client) values('$acode', '$client')") > 0){
                echo "liked";
                exit();
            }
            else{
                header("location:index.php?again=1");
            }
        }
        else if($action == "unlike"){
            if(mysqli_query($conn, "delete from clalbliked where code='$acode' and client='$client'") > 0){
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

<?php

if(isset($_COOKIE["login"])){
    $email = $_COOKIE["login"];

    $conn = mysqli_connect("127.0.0.1","root","","mp3");

    $rs = mysqli_query($conn, "select * from clients where email='$email'");
    if($r = mysqli_fetch_array($rs)){
        $ccode = $r["code"];
    }

    $liked = array();
    $rs = mysqli_query($conn, "select code from clalbliked where client='$ccode'");
    while($r = mysqli_fetch_array($rs)){
        $liked[] = $r["code"];
    }

    echo json_encode($liked);
}
else{
    
}

?>

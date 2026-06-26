<?php
       $conn=mysqli_connect("127.0.0.1","root","","mp3");
       if( strlen(trim($_REQUEST["id"]))>0 ){
        $roll=intval($_REQUEST["id"]);
        $code=$_REQUEST["code"];
        if(mysqli_query($conn,"delete from category where sn='$roll'")>0){
            $conn=mysqli_connect("127.0.0.1","root","","mp3");
            if(mysqli_query($conn,"delete from album where ccode='$code'")>0){
                echo "success";
            }
        }
    }
    ?>

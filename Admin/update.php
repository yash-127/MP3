<?php

$conn = mysqli_connect("127.0.0.1","root","","mp3");
    if(strlen(trim($_REQUEST["id"]))>0  && strlen(trim($_REQUEST["col"]))>0  && strlen(trim($_REQUEST["rec"]))>0 ){
        $sn=$_REQUEST["id"]; 
        $col=$_REQUEST["col"];  
         $val=$_REQUEST["rec"];

             
         
         if(mysqli_query($conn,"update category set category='$val' where sn=$sn")>0){
            echo "success";
         }
        }
    ?>



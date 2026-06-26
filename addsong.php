<?php

// Protect page
if (!isset($_COOKIE["login"])) {
    header("Location: index.php");
    exit();
}



       $conn=mysqli_connect("127.0.0.1","root","","mp3");
    
        $sn=$_REQUEST["snt"];
        $scode=$_REQUEST["code"];
        $albcode=$_REQUEST["id"];

        
        $way=0;
        $rs=mysqli_query($conn,"select MAX(way) from clsongs");
        if($r=mysqli_fetch_array($rs)){
            $way=$r[0];
        }
        $way++;
       
        if(mysqli_query($conn,"insert into clsongs values($sn,'$scode','$albcode',$way)")>0){
          
            echo "success";
        }
         else{
            header("location:index.php?error=1");
         }
    ?>
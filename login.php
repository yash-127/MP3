<?php
    if(empty($_POST ["email"]) || empty($_POST ["pass"])) {
        header("location:index.php?empty=1");
    }
    else{
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $conn = mysqli_connect("127.0.0.1","root","","mp3");
        $rs=mysqli_query($conn,"select * from clients where email='$email' and pass='$pass'");
        if($r=mysqli_fetch_array($rs)){
            if($r["pass"] == $pass){
                setcookie("login",$email,time()+3600*7);
                header("location:index.php");
            }
            else{
                header("location:index.php?invalid_pass=1");
            }
        }
        else{
            header("location:index.php?invalid=1");
        }
        
    }
?>
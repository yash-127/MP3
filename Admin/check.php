<?php
    if(empty($_POST ["email"]) || empty($_POST ["password"])) {
        header("location:index.php?empty=1");
    }
    else{
        $email = $_POST["email"];
        $password = $_POST["password"];
        $conn = mysqli_connect("127.0.0.1","root","","mp3");
        $rs=mysqli_query($conn,"select * from admin where email='$email'");
        if($r=mysqli_fetch_array($rs)){
            if($r["password"] == $password){
                setcookie("login",$email,time()+3600);
                header("location:dashboard.php");
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
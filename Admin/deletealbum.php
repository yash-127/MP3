<?php
if(isset($_COOKIE["login"])){
    $conn = mysqli_connect("127.0.0.1","root","","mp3");
	$code=$_GET["id"];
    $rs=mysqli_query($conn,"select * from album where code='$code'");
	if($r=mysqli_fetch_array($rs)){
	
     

	if(mysqli_query($conn," delete from album where code='$code'")>0){
        $deleteImage =  getcwd() . "../album/$code";

        unlink($deleteImage);
        
        unlink("../album/$code.jpg");

    }
    else{
        header("location:dashboard.php");
    }
   
 
     if(mysqli_query($conn,"delete from songs where code='$code'")>0){
        
                    $id=$r["ccode"];
                    header('location:add_album.php?id='.$id);
    }
   
    }
    else{
        header("location:index.php");
    }
}
else{
	header("location:index.php");
}
?>
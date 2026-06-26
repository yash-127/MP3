<?php
if(isset($_COOKIE["login"])){
    $conn = mysqli_connect("127.0.0.1","root","","mp3");

	
	if(empty($_POST["title"]) || empty($_POST["description"])){
		header("location:edit_album.php?empty=1");
	}
	else{
		$code=$_GET["id"];
		$title=$_POST["title"];
        $des=$_POST["description"];
		if(mysqli_query($conn,"update album set title ='$title', des ='$des' where code='$code'")>0){
			$rs=mysqli_query($conn,"select * from album where code='$code'");
			if($r=mysqli_fetch_array($rs)){
				$id=$r["ccode"];
		
			header('location:add_album.php?id='.$id);
			}
		}
		else{
			header("location:edit_album.php?again=1");
		}
	}	
		
}
else{
	header("location:index.php");
}
?>
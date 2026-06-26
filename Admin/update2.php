<?php
if(isset($_COOKIE["login"])){
    $conn = mysqli_connect("127.0.0.1","root","","mp3");
	
	if(empty($_POST["category"])){
		header("location:edit.php?empty=1");
	}
	else{
		$code=$_GET["id"];
		$cat=$_POST["category"];
		if(mysqli_query($conn,"update category set category='$cat' where code='$code'")>0){
			header("location:dashboard.php?success=1");
		}
		else{
			header("location:edit.php?again=1");
		}
	}	
		
}
else{
	header("location:index.php");
}
?>
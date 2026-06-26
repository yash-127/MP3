<?php
if(isset($_COOKIE["login"])){
	$conn = mysqli_connect("127.0.0.1","root","","mp3");

	$code=$_GET["id"];
	$rs=mysqli_query($conn," delete from category where code='$code'");
	header("location:dashboard.php?success_del=1");
}
else{
	header("location:index.php");
}
?>
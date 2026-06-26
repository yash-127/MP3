<?php
if(isset($_COOKIE["login"])){
    $conn = mysqli_connect("127.0.0.1","root","","mp3");

	
	if(empty($_POST["title"]) || empty($_POST["description"])){
		header("location:edit_song.php?empty=1");
	}
	else{
        $code=$_GET["id"];
        $sn=$_GET["sn"];
		$title=$_POST["title"];
        $des=$_POST["description"];
		if(mysqli_query($conn,"update songs set title='$title', des='$des' where code='$code' AND sn=$sn ")>0){
			header('location:add_songs.php?id='.$code);
		}
		else{
			header("location:edit_songs.php?again=1");
		}
	}	
		
}
else{
	header("location:index.php");
}
?>
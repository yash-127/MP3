<?php
	
if(empty($_POST["title"]) || empty($_POST["description"])){
	header("location:add_songs.php?empty=1");
}
else{
    $code=$_GET["id"];
    $conn = mysqli_connect("127.0.0.1","root","","mp3");

	
		    $sn=0;
		$rs=mysqli_query($conn,"select MAX(sn) from songs where code='$code'");
		if($r=mysqli_fetch_array($rs)){
			$sn=$r[0];
		}
		$sn++;
		
		
	$code=$_GET["id"];
	$title=$_POST["title"];
	$des=$_POST["description"];
	$target="../album/$code/$sn.mp3";

	
	
	if(move_uploaded_file($_FILES['song']['tmp_name'],$target)){
		
		
		if(mysqli_query($conn,"insert into songs values($sn,'$title','$des','$code')")>0){
			$rs=mysqli_query($conn,"select * from songs where code='$code'");
		
           if($r=mysqli_fetch_array($rs)){

            
            $id=$r["code"];
			header('location:add_songs.php?id='.$id);
		}
	
		else{
			header("location:add_songs.php?again=1");
		}
	}
}
	else{
		header("location:add_songs.php?imp_error=1");
	}
}
?>
<?php
	
if(empty($_POST["title"]) || empty($_POST["description"])){
	header("location:add.php?empty=1");
}
else{
    $conn = mysqli_connect("127.0.0.1","root","","mp3");

	
		    $sn=0;
		$rs=mysqli_query($conn,"select MAX(sn) from album");
		if($r=mysqli_fetch_array($rs)){
			$sn=$r[0];
		}
		$sn++;
		$a=array();
		for($i='A';$i<='Z';$i++){
			array_push($a,$i);
			if($i=='Z')
				break;
		}
		for($i='a';$i<='z';$i++){
			array_push($a,$i);
			if($i=='z')
				break;
		}
		for($i=0;$i<=9;$i++){
			array_push($a,$i);
		}
		shuffle($a);
		$code="";
		for($i=0;$i<7;$i++){
		    $code.=$a[$i];
		}
		$code=$code."_".$sn;
		
	$ccode=$_GET["id"];
	$title=$_POST["title"];
	$des=$_POST["description"];
	$target="../album/$code.jpg";

	
	
	if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){
		
		
		if(mysqli_query($conn,"insert into album values($sn,'$code','$title','$des','$ccode')")>0){
			$rs=mysqli_query($conn,"select * from album where code='$code'");
			mkdir("../album/$code");
           if($r=mysqli_fetch_array($rs)){

            
            $id=$r["ccode"];
			header('location:add_album.php?id='.$id);
		}
	
		else{
			header("location:add_album.php?again=1");
		}
	}
}
	else{
		header("location:add_album.php?imp_error=1");
	}
}
?>
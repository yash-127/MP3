<?php
	
if(isset($_COOKIE["login"])){
		$email=$_COOKIE["login"];
	
        $conn = mysqli_connect("127.0.0.1","root","","mp3");

	if(empty($_POST["category"])){
		header("location:dashboard.php?empty=1");
	}
	else{
		
		
	    $sn=0;
		$rs=mysqli_query($conn,"select MAX(sn) from category");
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
		
		$category=$_POST["category"];
		if(mysqli_query($conn," insert into category values ('$sn','$code','$category')")>0){
			header("location:dashboard.php?success=1");
		}
		else{
			header("location:dashboard.php?again=1");
		}
	}
}
else{
	header("location:index.php");
}
?>
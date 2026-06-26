<?php
if(isset($_COOKIE["login"])){
    $sn=$_GET["sn"];
    $code=$_GET["id"];
    $conn = mysqli_connect("127.0.0.1","root","","mp3");
    if(mysqli_query($conn,"delete from songs where code='$code' AND sn=$sn")>0) {
        unlink("../album/$code/$sn.mp3");
        header('location:add_songs.php?id='.$code);
       }
       else{
        header("location:add_album.php?del_again=1");
       }

}
else{
	header("location:error.php");
}
?>
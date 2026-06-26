<?php
$conn = mysqli_connect("127.0.0.1","root","","mp3");

if(isset($_GET["id"])){
    $clientCode = $_GET["id"];
} else {
    exit("Client ID missing");
}

// Fetch liked albums of the client
$rst = mysqli_query($conn, "SELECT * FROM clalbliked WHERE client = '$clientCode'");

if(mysqli_num_rows($rst) > 0){
?>

<br><div class="col-12">
    <h3 style="display:inline;" class="hi mb-">Liked Albums</h3>
   
</div><br>

<div class="row content-row">
<?php
while($rt = mysqli_fetch_array($rst)){
    $albumCode = $rt["code"];

    // Fetch album details
    $rs = mysqli_query($conn, "SELECT * FROM album WHERE code='$albumCode'");
    while($r = mysqli_fetch_array($rs)){
        $code = $r["code"];
      
?>
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="hover-wrap2">
            <div class="song-card">
                <div class="song-card-img" style="border-radius: 7px;">
                    <img src="album/<?=$code?>.jpg" style="border-radius: 7px;" alt="Album cover">
                    <div class="play-overlay">
                        <button class="play-btn" id="<?=$code?>">
                            <i class="bi bi-play-fill"></i>
                        </button>
                    </div>
                </div>
                <div class="song-card-content">
                    <div class="song-card-meta">
                        <h3 class="song-card-title"><?=$r["title"]?></h3>
                        <div class="song-card-actions">
                                <button class="action-btn">
    <i onclick="likeAlbum(this)" acode="<?=$r["code"]?>" class="bi bi-heart-fill" style="color:red"></i>
  </button>
                            <button class="action-btn">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
}
?>
</div>
<?php
} else {
?>
<div class="col-12">
    <h3 class="hi">No liked albums found.</h3>
</div>
<?php
}
?>

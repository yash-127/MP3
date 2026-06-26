<?php
 $conn = mysqli_connect("127.0.0.1","root","","mp3");
if(isset($_COOKIE["login"])){
    $email = $_COOKIE["login"];

        $rs = mysqli_query($conn, "select * from clients where email='$email'");
        if($r = mysqli_fetch_array($rs)){
            $code = $r["code"];
        }
    ?>
<style>
    .skeleton-card3 {
  margin-left: px;
  width: 1025px;
  height: 450px;
  border-radius: 8px;
  background: linear-gradient(90deg, #e0e0e0 25%, #f5f5f5 50%, #e0e0e0 75%);
  background-size: 1500px 100%; 
  animation: shineWide 2s infinite linear;
}
</style>
<script>

const clientCode = "<?=$code?>";
$(document).on('click', '#songsBtn', function() {
  $('.likechanger').html(`<br><div class="skeleton-card3"></div>`);
  $('.likechanger').load('all-liked-songs.php?id=' + clientCode, function () {
     
  });
});

$(document).on('click', '#albumsBtn', function() {
  $('.likechanger').html(`
    <div class="skeleton-wrapper">
      <div class="skeleton-header2"></div>
      <div class="skeleton-grid">
        <div class="skeleton-card"></div>
        <div class="skeleton-card"></div>
        <div class="skeleton-card"></div>
        <div class="skeleton-card"></div>
        <div class="skeleton-card"></div>
        <div class="skeleton-card"></div>
        <div class="skeleton-card"></div>
        <div class="skeleton-card"></div>
      </div>
    </div>
  `);
  $('.likechanger').load('all-liked-albums.php?id=' + clientCode, function () {
     markLikedAlbums();
  });
});

</script>

<style>
.together {
    display: flex;
    justify-content: center;
   
}

.button-des {
    font-family: 'Cursive';
    background-color: #ffffffff; 
    font-size:19px;
    color: #333;
    border: none;
    padding: 10px 20px;
    border-radius: 20px 0 0 20px ;
    border-right: 1px solid rgba(0, 0, 0, 0.3);
    cursor: pointer;
    transition: all 0.2s ease;
}
.button-des2 {
    font-family: 'Cursive';
    background-color: #ffffffff; 
    font-size:18px;
    color: #333; 
    border: none;
    padding: 10px 20px;
    border-radius: 0 20px 20px 0 ;
    cursor: pointer;
    transition: all 0.2s ease;
}
.button-des:hover,
.button-des2:hover {
    background-color: #ffffffff; 
    box-shadow: 0 6px 8px rgba(0,0,0,0.15);
    transform: translateY(-2px);
}

.button-des:active,
.button-des2:active {
    background-color: #a0a0a0;
    transform: translateY(1px);
    box-shadow: 0 3px 5px rgba(0,0,0,0.2);
}

#songbtn{
    transition: all 0.3s ease-in-out;
    position:absolute;
    margin-left: 90%;
}

@media (max-width: 768px) {
    #songbtn{
        
        margin-left:420px;
    }
    
}
@media (max-width: 700px) {
    #songbtn{
        
        margin-left:370px;
    }
    
}
@media (max-width: 650px) {
    #songbtn{
        
        margin-left:330px;
    }
    
}
@media (max-width: 605px) {
    #songbtn{
        
        margin-left:290px;
    }
    
}
@media (max-width: 570px) {
    #songbtn{
        
        margin-left:220px;
    }
    
}
.songs-list {
    margin-top: 20px;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    height: 450px;  
    display: flex;
    flex-direction: column;
}
</style>

 
 <div class="together">

<button id="songsBtn" class="button-des">songs</button><button id="albumsBtn" class="button-des2">albums</button>


 </div>
 
 
 <div class="col-md-12 likechanger" >
                    <div class="songs-list">
                        <h3>Songs</h3>
                        <div class="list-group">
                            <?php
                            $x = 0;
                            // ✅ Fetch album title once for all songs using JOIN
                            $rst = mysqli_query($conn, "SELECT * from clliked WHERE client = '$code' ");
                    
while($rt=mysqli_fetch_array($rst)){
  $scode=$rt["scode"];
  $sn=$rt["sn"];

  $rs = mysqli_query($conn,"select * from songs where sn='$sn' and code='$scode'");
                            if ($r = mysqli_fetch_array($rs)) {
                                $scode = $r["code"];
                                $ru= mysqli_query($conn,"select * from album where code='$scode'");
                                if($rn= mysqli_fetch_array($ru)){
                                    $albumTitle = $rn["title"];
                                }
                                
    $likeIcon = "bi-heart";
    $likeStyle = "";
    if ($code) {
        $check = mysqli_query($conn, "SELECT 1 FROM clliked WHERE client='$code' AND scode='$scode' AND sn='$sn' LIMIT 1");
        if (mysqli_num_rows($check) > 0) {
            $likeIcon = "bi-heart-fill";
            $likeStyle = "style='color:red'";
        }
    }
                                
                            ?> <div  class="like-click-play" pol="audio6<?=$x?>" gol="<?=$scode?>" id="<?=$albumTitle?>" rel="<?=$r["title"]?>"  style="position:relative;">
                               
                                    <div class="list-group-item list-group-item-action d-flex align-items-center">
                                        <i class="bi bi-music-note me-3"></i>
                                        <div>
                                            <h5 class="mb-1"><?= $r["title"] ?></h5>
                                            <small class="text-muted"><?= $rn["title"] ?></small>
                                        </div>
                                       <div class="song-card-actions" id="songbtn">
                                       <button class="action-btn" id="songheart">
  <i onclick="like(this)" sn="<?=$sn?>" scode="<?=$scode?>" class="bi <?=$likeIcon?>" <?=$likeStyle?>></i>
  <span class="particles"></span>
</button>
                                        <button class="action-btn"><i onclick="menu2(<?=$x?>)" class="bi bi-three-dots-vertical ooy <?=$x?>" ></i></button>
                                       </div>
                                    </div>
                                </div>
                                <div class="menu-container">
                                    <div class="dropdown3">
                                        <div id="myDropdown3<?=$x?>" class="dropdown-content3">
                                            <a id="popupButton<?=$x?>" onclick="submenu(<?=$x?>)" sn="<?=$r["sn"]?>" scode="<?=$r["code"]?>" rel2="<?=$albumTitle?>" rel="<?=$r["title"]?>">
                                                <i class="bi bi-plus-circle"></i> Add to playlist
                                            </a>
                                            <a href="#home"><i class="bi bi-heart"></i> Add to liked songs</a>
                                            <a href="#contact"><i class="bi bi-music-note-list"></i> Open Playlist</a>
                                            <a href="#home"><i class="bi bi-share"></i> Share</a>
                                            <a href="#about"><i class="bi bi-info"></i> About</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $x++;
                            }
                        }
                            ?>
                        </div>
                    </div>
                </div>
            
        </div><br>

<?php
        }
else{
    
}

?>

<script>

    setTimeout(function(){
       document.querySelector("#imageCarousel .carousel-control-next").click();

    }, 3000);

</script>
<style>
    
.song-card3 {
    width: 95%;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
    height: 100%;
    border: 1px solid rgba(0,0,0,0.05);
}

.song-card3:hover {
    transform: translateY(-3px);
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.song-card3-img {
    position: relative;
    width: 100%;
    padding-top: 100%; /* 1:1 Aspect Ratio */
    overflow: hidden;
}

.song-card3-img img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.song-card3-img .play-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.2s;
}

.song-card3:hover .play-overlay {
    opacity: 1;
}

.song-card3-content {
    padding: 0.75rem;
}

.song-card3-title {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: #212529;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.song-card3-artist {
    font-size: 0.8rem;
    color: #6c757d;
    margin-bottom: 0.25rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.song-card3-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #6c757d;
    font-size: 0.75rem;
}

.song-card3-actions {
    display: flex;
    gap: 0.25rem;
}
.song-card-wrapper {
    padding: 0 2px; /* half-gap on each side = 12px total */
}
</style>
<script>
$(document).ready(function () {
  // Inject skeleton structure into .content-row
  $('.almighty').html(`
    <div class="skeleton-header2" style="margin-left:10px;margin-top:6px;"></div>
    <div style="margin-left:10px;">
      <div class="skeleton-grid browse-style">
        <div class="skeleton-card"></div>
        <div class="skeleton-card"></div>
        <div class="skeleton-card"></div>
        <div class="skeleton-card"></div>
      </div>
    </div>
  `);

  // Load randoms.php content after short delay (optional)
  setTimeout(function () {
    $('.almighty').load('randoms.php');
  }, 500); // 500ms delay to simulate loading, or set to 0 to load immediately
});


</script>

       
    <div class="container-fluid">
        <!-- Featured Songs Grid -->
        <div class="row content-row">
            <div class="col-12" style="margin-bottom:-0px;">
                <h2 class="section-title" style="margin-top:-5px;">Featured Albums</h2>
            </div>
            <!-- Song Card 1 -->
            <?php

$conn = mysqli_connect("127.0.0.1","root","","mp3");


// Get logged-in user code
$ccode = null;
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    $rs = mysqli_query($conn, "SELECT code FROM clients WHERE email='$email'");
    if ($r = mysqli_fetch_array($rs)) {
        $ccode = $r["code"];
    }
}

$i = 0;
$rs = mysqli_query($conn, "SELECT a.code, a.title, a.ccode, c.category 
                           FROM album a 
                           LEFT JOIN category c ON a.ccode = c.code 
                           ORDER BY RAND() 
                           LIMIT 12");

while ($r = mysqli_fetch_array($rs)) {
    $code = $r["code"];
    $category = $r["category"];

    $likeIcon = "bi-heart";
    $likeStyle = "";
    if ($ccode) {
        $check = mysqli_query($conn, "SELECT 1 FROM clalbliked WHERE client='$ccode' AND code='$code' LIMIT 1");
        if (mysqli_num_rows($check) > 0) {
            $likeIcon = "bi-heart-fill";
            $likeStyle = "style='color:red'";
        }
    }
?>
<div class="col-lg-2 col-md-4 col-sm-6 mb-0 " id="cardadjust">
  <div class="hover-wrap">
    <div class="song-card ">
      <div class="song-card-img">
        <img src="album/<?=$code?>.jpg" loading="lazy" alt="Song cover">
        <div class="play-overlay">
          <button class="play-btn" id="<?=$code?>">
            <i class="bi bi-play-fill"></i>
          </button>
        </div>
      </div>
      <div class="song-card-content">
        <h3 class="song-card-title"><?=$r["title"]?></h3>
        <div class="song-card-meta">
          <p class="song-card-artist"><?=$category?></p>
          <div class="song-card-actions">
            <button class="action-btn">
              <i onclick="likeAlbum(this)" acode="<?=$code?>" class="bi <?=$likeIcon?>" <?=$likeStyle?>></i>
            </button>
            <button class="action-btn">
              <i onclick="myFunction(<?=$i?>)" class="bi bi-plus yoo <?=$i?>"></i>
            </button>
          </div>
        </div>
      </div>
   

    </div>
    </div>
     <div class="dropdown">
            <div id="myDropdown<?=$i?>" class="<?=($i==5 || $i==11) ? 'enddropdown-content' : 'dropdown-content'?>">
                <a href="#home">Add to Your Space</a>
                <a href="#about">About</a>
                <a href="#contact">Open Playlist</a>
            </div>
        </div>
</div>
<?php $i++; } ?>
</div>
</div>
           

<div class="container-fluid hello">
    <div class="row">
        <div class="col-md-6">
            <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>

                <div class="carousel-inner">
                    <?php
         
                    $rs = mysqli_query($conn, "SELECT * FROM album ORDER BY RAND() LIMIT 5");

             
                    $activeClass = "active";
                    while($r = mysqli_fetch_array($rs)) {
                        $code = $r["code"];
                        ?>
                        <div class="carousel-item <?php echo $activeClass; ?>" style="height: 400px;">
                            <a href="play.php?id=<?=$r["code"]?>" data-fancybox="gallery">
                                <img src="album/<?=$code?>.jpg" class="d-block w-100 " alt="Slide">
                            </a>
                        </div>
                        <?php
                       
                        $activeClass = "";
                    }
                    ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    

            
       
            <div class="col-md-6" >
                <div class="songs-list" id="slist">
                    <h3>New Songs</h3>
                    <div class="list-group" id="list"  >
<?php
$x = 0;
$query = "
    SELECT songs.*, album.title AS album_title 
    FROM songs 
    INNER JOIN album ON songs.code = album.code
    ORDER BY songs.sn DESC
";
$rs = mysqli_query($conn, $query);
while ($r = mysqli_fetch_array($rs)) {
    $scode = $r["code"];
    $sn = $r["sn"];
    $albumTitle = $r["album_title"];

    // Inline LIKE check
    $likeIcon = "bi-heart";
    $likeStyle = "";
    if ($ccode) {
        $check = mysqli_query($conn, "SELECT 1 FROM clliked WHERE client='$ccode' AND scode='$scode' AND sn='$sn' LIMIT 1");
        if (mysqli_num_rows($check) > 0) {
            $likeIcon = "bi-heart-fill";
            $likeStyle = "style='color:red'";
        }
    }
?>
    <div class="pop" pol="audio<?=$x?>" gol="<?=$scode?>" id="<?=$albumTitle?>" rel="<?=$r["title"]?>" onclick="playsound(<?=$x?>); autoplay(<?=$x?>);" style="position:relative;">
        
        <div class="list-group-item list-group-item-action align-items-center" style="position:relative;">
            <i class="bi bi-music-note me-3"></i>
            <div>
                <h5 class="mb-1"><?=$r["title"]?></h5>
                <small class="text-muted"><?=$albumTitle?></small>
            </div>
            <div class="song-card-actions" id="songbtn">
                <button class="action-btn" id="songheart">
                    <i onclick="like(this)" sn="<?=$sn?>" scode="<?=$scode?>" class="bi <?=$likeIcon?>" <?=$likeStyle?>></i>
                    <span class="particles"></span>
                </button>
           


                <button class="action-btn" id="songmenu"><i onclick="menu(<?=$x?>)" class="bi bi-three-dots-vertical ooy <?=$x?>" ></i></button>
            </div>
        </div>
    </div>
    <div class="menu-container">
        <div class="dropdown2">
            <div id="myDropdown2<?=$x?>" class="dropdown-content2">
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
?>

                       
                        
                        </div>
                </div>
                
            </div>
            
        </div>
    </div><br>
    

    
    <div class="row content-row almighty" style="margin-left:2px;">
       
    

      </div>

<style>
    



        .pi {
  display: inline;
  margin-left: 810px;
  color:black;
  font-size:20px;
  font-family: "Times New Roman", Times, serif;
  transition: transform 0.2s, font-size 0.2s;
  
}

.hi{
    font-size:33px;
}
a { text-decoration: none; }



.pi:hover {
   font-size:23px;
    animation: rise 1s ease-in-out;
}

    .gana {

margin-left:670px;  
margin-top:7px; 
width: 250px; 
height: 50px; 

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
</style>

<?php
$type = isset($_GET["type"]) ? $_GET["type"] : "nom";
$pol = ($type == "nom2") ? "audio3" : "audio2";
// ✅ Connect once
$conn = mysqli_connect("127.0.0.1", "root", "", "mp3");
if(isset($_GET["id"])){
$id = $_GET["id"];

// ✅ Fetch album details once
$rs = mysqli_query($conn, "SELECT * FROM album WHERE code='$id'");
if ($r = mysqli_fetch_array($rs)) {
    $code = $r["code"];
?>
   

    <div class="container-fluid">
        <div class="row">
         
                <div class=" col-md-4">
                    <div class="card">
                        <img src="album/<?= $code ?>.jpg" class="img-fluid" style="border-radius: 7px;" alt="Song cover">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="song-card-actions">
                            <h3><?= $r["title"] ?></h3>
                            <button class="action-btn" style="margin-left: 50px;"><i class="bi bi-heart"></i></button>
                            <button class="action-btn"><i class="bi bi-three-dots-vertical"></i></button>
                        </div>
                    </div><br>
                    <p><?= $r["des"] ?></p><br><br><br>
                </div>

                <div class="col-md-12">
                    <div class="songs-list">
                      <h3>Songs</h3>
<div class="list-group">
    <?php
    $x = 0;

    // ✅ Get client code once
    $ccode = null;
    if (isset($_COOKIE["login"])) {
        $email = $_COOKIE["login"];
        $rsClient = mysqli_query($conn, "SELECT code FROM clients WHERE email='$email'");
        if ($row = mysqli_fetch_assoc($rsClient)) {
            $ccode = $row["code"];
        }
    }

    // ✅ Fetch songs with album title
    $rs = mysqli_query($conn, "
        SELECT s.*, a.title AS album_title 
        FROM songs s 
        JOIN album a ON s.code = a.code 
        WHERE s.code = '$id'
    ");

    while ($r = mysqli_fetch_array($rs)) {
        $scode = $r["code"];
        $sn = $r["sn"];
        $albumTitle = $r["album_title"];

        // ✅ Default icon and style
        $likeIcon = "bi-heart";
        $likeStyle = "";

        // ✅ Check if liked by user
        if ($ccode) {
            $likeCheck = mysqli_query($conn, "SELECT 1 FROM clliked WHERE client='$ccode' AND scode='$scode' AND sn='$sn' LIMIT 1");
            if (mysqli_num_rows($likeCheck) > 0) {
                $likeIcon = "bi-heart-fill";
                $likeStyle = "style='color:red'";
            }
        }
    ?>
        <div class="<?= $type ?>" pol="<?= $pol ?><?= $x ?>" gol="<?= $scode ?>" id="<?= $albumTitle ?>" rel="<?= $r["title"] ?>" style="position:relative;">
            <div class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="bi bi-music-note me-3"></i>
                <div>
                    <h5 class="mb-1"><?= $r["title"] ?></h5>
                    <small class="text-muted"><?= $albumTitle ?></small>
                </div>
                <div class="song-card-actions" id="songbtn">
                    <button class="action-btn" id="songheart">
                        <i onclick="like(this)" sn="<?= $sn ?>" scode="<?= $scode ?>" class="bi <?= $likeIcon ?>" <?= $likeStyle ?>></i>
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
                            ?>
                        </div>
                    </div>
                </div>
            
        </div><br>
          <div class="col-12">
            <h3 style="display:inline;" class="hi mb-">Randoms</h3>
            <p id="browse" class="pi"><small class="text-muted">Show all</small></p>
        </div><br>

        <div class="row content-row">
            <?php
            // ✅ Fetch 4 random albums excluding current one
            $rs = mysqli_query($conn, "SELECT * FROM album WHERE code <> '$id' ORDER BY RAND() LIMIT 4");
            while ($r = mysqli_fetch_array($rs)) {
                $code = $r["code"];
                 $likeIcon = "bi-heart";
    $likeStyle = "";

    // Check if album is liked
    if ($ccode) {
        $likeCheck = mysqli_query($conn, "SELECT 1 FROM clalbliked WHERE client='$ccode' AND code='$code' LIMIT 1");
        if (mysqli_num_rows($likeCheck) > 0) {
            $likeIcon = "bi-heart-fill";
            $likeStyle = "style='color:red'";
        }
    }
            ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="hover-wrap2">
                        <div class="song-card">
                            <div class="song-card-img" style="border-radius: 7px;">
                                <img src="album/<?= $code ?>.jpg" style="border-radius: 7px;" alt="Song cover">
                                <div class="play-overlay">
                                    <button class="play-btn" id="<?= $r["code"] ?>">
                                       <i class="bi bi-play-fill"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="song-card-content">
                                <div class="song-card-meta">
                                    <h3 class="song-card-title"><?= $r["title"] ?></h3>
                                    <div class="song-card-actions">
                                        <button class="action-btn">
                            <i onclick="likeAlbum(this)" acode="<?= $code ?>" class="bi <?= $likeIcon ?>" <?= $likeStyle ?>></i>
                        </button>
                                        <button class="action-btn"><i class="bi bi-three-dots-vertical"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } // end while
            ?>
        </div>
    </div>



<?php
} // end if
}
else{
 

// Sanitize input ID
$id = isset($_GET['pid']) ? mysqli_real_escape_string($conn, $_GET['pid']) : '';
$type = isset($_GET["type"]) ? $_GET["type"] : "nom3";
$pol = ($type == "nom4") ? "audio5" : "audio4";
// Fetch album details
$rs = mysqli_query($conn, "SELECT * FROM clientalb WHERE code='$id'");
if ($r = mysqli_fetch_array($rs)) {
    $code = $r["code"];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="song3.jpg" class="img-fluid" style="border-radius: 7px;" alt="Song cover">
            </div>
        </div>

        <div class="col-md-8">
            <div class="row">
                <div class="song-card-actions">
                    <h3><?=$r["title"]?></h3>
                    <button class="action-btn" style="margin-left: 50px;"><i class="bi bi-heart"></i></button>
                    <button class="action-btn"><i class="bi bi-three-dots-vertical"></i></button>
                </div>
            </div>
            <br>
            <p><?=$r["des"]?></p>
            <br><br><br>
        </div>

        <div class="col-md-12">
            <div class="songs-list">
                <h3>Songs</h3>
                <div class="list-group">

                <?php
                 $ccode = null;
    if (isset($_COOKIE["login"])) {
        $email = $_COOKIE["login"];
        $rsClient = mysqli_query($conn, "SELECT code FROM clients WHERE email='$email'");
        if ($row = mysqli_fetch_assoc($rsClient)) {
            $ccode = $row["code"];
        }
    }
                // Efficient query using JOINs to fetch all needed data in one go
                $query = "
                    SELECT 
                        s.code AS song_code, 
                        s.sn, 
                        s.title AS song_title, 
                        a.title AS album_title
                    FROM clsongs c
                    JOIN songs s ON c.scode = s.code AND c.sn = s.sn
                    LEFT JOIN album a ON s.code = a.code
                    WHERE c.albcode = '$id'
                    ORDER BY c.way DESC
                ";

                $result = mysqli_query($conn, $query);
                $x = 0;
                while ($r = mysqli_fetch_array($result)) {
                    $scode = $r["song_code"];
                    $sn = $r["sn"];
                    $albumTitle = $r["album_title"];
                      $likeIcon = "bi-heart";
        $likeStyle = "";

      
        if ($ccode) {
            $likeCheck = mysqli_query($conn, "SELECT 1 FROM clliked WHERE client='$ccode' AND scode='$scode' AND sn='$sn' LIMIT 1");
            if (mysqli_num_rows($likeCheck) > 0) {
                $likeIcon = "bi-heart-fill";
                $likeStyle = "style='color:red'";
            }
        }
                 ?> <div  class="<?=$type?>" pol="<?=$pol?><?=$x?>" gol="<?=$scode?>" id="<?=$albumTitle?>" rel="<?=$r["song_title"]?>"  style="position:relative;">
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="bi bi-music-note me-3"></i>
                            <div>
                                <h5 class="mb-1"><?=$r["song_title"]?></h5>
                                <small class="text-muted"><?=$r["album_title"]?></small>
                            </div>
                             <div class="song-card-actions" id="songbtn">
                <button class="action-btn" id="songheart">
                        <i onclick="like(this)" sn="<?= $sn ?>" scode="<?= $scode ?>" class="bi <?= $likeIcon ?>" <?= $likeStyle ?>></i>
                        <span class="particles"></span>
                    </button>
                <button class="action-btn" id="songmenu"><i onclick="menu(<?=$x?>)" class="bi bi-three-dots-vertical ooy <?=$x?>" ></i></button>
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
    
</div><br>
  <div class="col-12">
            <h3 style="display:inline;" class="hi mb-">Randoms</h3>
            <p id="browse" class="pi"><small class="text-muted">Show all</small></p>
        </div><br>

        <div class="row content-row">
            <?php
            // ✅ Fetch 4 random albums excluding current one
            $rs = mysqli_query($conn, "SELECT * FROM album WHERE code <> '$id' ORDER BY RAND() LIMIT 4");
            while ($r = mysqli_fetch_array($rs)) {
                $code = $r["code"];
                 $likeIcon = "bi-heart";
    $likeStyle = "";

    // Check if album is liked
    if ($ccode) {
        $likeCheck = mysqli_query($conn, "SELECT 1 FROM clalbliked WHERE client='$ccode' AND code='$code' LIMIT 1");
        if (mysqli_num_rows($likeCheck) > 0) {
            $likeIcon = "bi-heart-fill";
            $likeStyle = "style='color:red'";
        }
    }
            ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="hover-wrap2">
                        <div class="song-card">
                            <div class="song-card-img" style="border-radius: 7px;">
                                <img src="album/<?= $code ?>.jpg" style="border-radius: 7px;" alt="Song cover">
                                <div class="play-overlay">
                                    <button class="play-btn" id="<?= $r["code"] ?>">
                                       <i class="bi bi-play-fill"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="song-card-content">
                                <div class="song-card-meta">
                                    <h3 class="song-card-title"><?= $r["title"] ?></h3>
                                    <div class="song-card-actions">
                                        <button class="action-btn">
                            <i onclick="likeAlbum(this)" acode="<?= $code ?>" class="bi <?= $likeIcon ?>" <?= $likeStyle ?>></i>
                        </button>
                                        <button class="action-btn"><i class="bi bi-three-dots-vertical"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } // end while
            ?>
        </div>
    </div>

<?php
} // End of album check

}
?>

      
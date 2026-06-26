 <div class="songs-list">
    
                        <h3>Songs</h3>
                        <div class="list-group">
                            <?php
                            $conn = mysqli_connect("127.0.0.1","root","","mp3");
                            if(isset($_GET["id"])){
            $code = $_GET["id"];
        } else {
            
        }
                            $x = 0;
                            
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
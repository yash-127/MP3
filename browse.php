<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<style>


.song-actions {
    display: none;
    margin-left: 1rem;
}

.song-item:hover .song-actions {
    display: flex;
    gap: 0.5rem;
}

.song-item:hover .song-duration {
    display: none;
}

.action-btn {
    background: none;
    border: none;
    padding: 0.25rem;
    color: #6c757d;
    cursor: pointer;
    transition: color 0.2s;
}

.action-btn:hover {
    color: #212529;
}

.song-card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
    height: 100%;
    border: 1px solid rgba(0,0,0,0.05);
}

.song-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.song-card-img {
    position: relative;
    width: 100%;
    padding-top: 100%; /* 1:1 Aspect Ratio */
    overflow: hidden;
}

.song-card-img img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.song-card-img .play-overlay {
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

.song-card:hover .play-overlay {
    opacity: 1;
}

.play-btn {
    width: 35px;
    height: 35px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    cursor: pointer;
    transition: transform 0.2s;
}

.play-btn:hover {
    transform: scale(1.1);
}

.play-btn i {
    font-size: 1.1rem;
    color: #212529;
    margin-left: 2px;
}

.song-card-content {
    padding: 0.75rem;
}

.song-card-title {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: #212529;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.song-card-artist {
    font-size: 0.8rem;
    color: #6c757d;
    margin-bottom: 0.25rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.song-card-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #6c757d;
    font-size: 0.75rem;
}

.song-card-actions {
    display: flex;
    gap: 0.25rem;
}

@media (max-width: 1200px) {
    .col-xl-2 {
        flex: 0 0 auto;
        width: 33.333333%;
    }
}

@media (max-width: 768px) {
    .navbar {
        left: 60px;
    }
    
    .main-content {
        margin-left: 60px;
    }
    
    .song-card {
        margin-bottom: 1rem;
    }
    
    .play-btn {
        width: 30px;
        height: 30px;
    }
    
    .play-btn i {
        font-size: 1rem;
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .sidebar {
        width: 60px;
    }
    .boom{
        margin-left:50px;
    }
    .footer{
        margin-left:0;
    }
    .sidebar .nav-link {
        padding: 0.8rem 1rem;
        text-align: center;
    }
    
    .sidebar .nav-link i {
        margin: 0;
        font-size: 1.4rem;
    }
    
    .sidebar .nav-link span,
    .sidebar .sidebar-heading h4,
    .sidebar .sidebar-section h6 {
        opacity: 0;
        width: 0;
        display: none;
    }
    
    .section-divider {
        margin: 0.5rem 0.5rem;
    }
    
    .navbar {
        left: 60px;
    }
    
    
   
    
    .main-content {
        margin-left: 60px;
    }
    
    .music-card {
        margin-bottom: 1rem;
    }
    
    .featured-card {
        height: 150px;
    }
    
    .songs-section {
        padding: 1rem;
    }
    
    .song-item {
        padding: 0.5rem;
    }
    
    .song-cover {
        width: 35px;
        height: 35px;
    }
    
    .song-title {
        font-size: 0.9rem;
    }
    
    .song-artist {
        font-size: 0.8rem;
    }
    
    .song-card {
        margin-bottom: 1rem;
    }
    
    .play-btn {
        width: 40px;
        height: 40px;
    }
    
    .play-btn i {
        font-size: 1.2rem;
    }
}
@media (max-width: 970px) {
    
    .search-form .form-control {

        width: 200px;
    }
    .boom{
        margin-left:74px;
    }
   
}

@media (max-width: 1200px) {
    
    .doom{
        position:absolute;
        margin-left:-330px;
    }
}
@media (max-width: 1000px) {
    
  
    .doom{
        margin-left:-430px;
    }
}
@media (max-width: 900px) {
    
  
    .doom{
        margin-left:-500px;
    }
}
@media (max-width: 580px) {
    .doom{
        margin-left:-530px;
    }
    .none {

        display: none;
    }
}



/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease forwards;
}


</style>
<style>
    .bi bi-three-dots{
        transform: rotate(45deg);
    }
    p {
  display: inline;
  margin: 20px;
  color:black;
  font-family: "Times New Roman", Times, serif;
  transition: transform 0.2s, font-size 0.2s;
  
}
a { text-decoration: none; }



p:hover {
   font-size:19px;
    animation: rise 1s ease-in-out;
}




</style>
  <div class="col-12 category-container">
    <?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "mp3");
    $rs = mysqli_query($conn, "SELECT * FROM category ORDER BY RAND() LIMIT 5");

    while ($r = mysqli_fetch_array($rs)) {
        $code = $r["code"];
        ?>
        <span class="category-showcase category-choose"  rel="<?=$r["code"]?>" rel2="<?=$r["category"]?>" > <?=$r["category"] ?></span>
        <?php
    }
    ?>
     </div><br>
<div id="category-browse">

        <div class="row content-row">
      


           <?php

// Get client code if user is logged in
$ccode = null;
if (isset($_COOKIE["login"])) {
    $email = $_COOKIE["login"];
    $rsClient = mysqli_query($conn, "SELECT code FROM clients WHERE email='$email'");
    if ($row = mysqli_fetch_assoc($rsClient)) {
        $ccode = $row["code"];
    }
}

$rs = mysqli_query($conn, "SELECT * FROM album ORDER BY RAND()");

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
        <div class="song-card">
            <div class="song-card-img" style="border-radius: 7px;">
                <img src="album/<?= $code ?>.jpg" style="border-radius: 7px;" alt="Song cover">
                <div class="play-overlay">
                    <button class="play-btn" id="<?= $code ?>">
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
<?php
}
?>
              
                </div>
            </div>
 

    </div>
  
</div>       

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

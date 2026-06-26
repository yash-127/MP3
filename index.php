

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>


</head>
<style>
    .gana {
 display:none;
  margin-left:150px;  
  margin-top:7px; 
  width: 250px; 
  height: 50px; 

}
</style>
<div class="indplay">
<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "mp3");

$x = 0;
$rs = mysqli_query($conn, "
  SELECT songs.*, album.title AS album_title 
  FROM songs
  INNER JOIN album ON songs.code = album.code
  ORDER BY songs.sn DESC
");

while ($r = mysqli_fetch_array($rs)) {
   
    $scode = $r["code"];        
    $songTitle = $r["title"];    
    $sn = $r["sn"];              
    $albumTitle = $r["album_title"]; 
    
?>
    <div class="boom" style="position:absolute">
        <audio id="audio<?=$x?>" gol="<?=$scode?>" rel="<?=$songTitle?>" pol="<?=$albumTitle?>" class="gana" controls>
            <source src="album/<?=$scode?>/<?=$sn?>.mp3" type="audio/mpeg">
        </audio>
    </div>
<?php
    $x++;
}
?>
</div>

<div class="likeplay">

</div>
<div class="albumplay1">

</div>
<div class="albumplay2">

</div>

<style>
/* Custom styles */
body {
    min-height: 100vh;
    margin: 0;
    overflow-x: hidden;
}
body.noscroll {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  overflow-y: scroll; /* ✅ Keep scrollbar visible */
}
body.noscroll2 {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  overflow-y: scroll;
}


body.noscroll2::-webkit-scrollbar-thumb {
  background: transparent; /* invisible thumb */
}

body.noscroll3 {
  position: fixed;
  width: 100%;
  overflow-y: scroll;
}


body.noscroll3::-webkit-scrollbar-thumb {
background: transparent; /* invisible thumb */}




/* Sidebar */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 250px;
    z-index: 1000;
    background-color: #000;
    transition: width 0.3s ease-in-out;
    
}

.sidebar-heading {
    font-size: 1.2rem;
    color: #fff;
    padding: 1rem;
    white-space: nowrap;
    overflow: hidden;
}

.sidebar .nav-link {
    padding: 0.8rem 1rem;
    color: rgba(255, 255, 255, 0.8);
    transition: all 0.3s;
    white-space: nowrap;
    overflow: hidden;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.sidebar .nav-link:hover {
    color: #fff;
    background-color: rgba(255, 255, 255, 0.1);
}

.sidebar .nav-link i {
    width: 24px;
    text-align: center;
    font-size: 1.2rem;
}

.sidebar .nav-link span {
    transition: opacity 0.3s ease-in-out;
    opacity: 1;
}

.sidebar-section {
    margin-bottom: 0.5rem;
}

.sidebar-section h6 {
    white-space: nowrap;
    overflow: hidden;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}

/* Section Dividers */
.section-divider {
    height: 1px;
    background-color: rgba(255, 255, 255, 0.1);
    margin: 0.5rem 1rem;
}

/* Navbar */
.navbar {
    
    position: fixed;
    top: 0;
    right: 0;
    left: 250px;
    height: 60px;
    padding: 0.5rem 1.5rem;
    background:  rgb(33,37,41);
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    z-index: 1020;
    transition: left 0.3s ease-in-out;
}
.navbar::before{
    content: "";
  position: absolute;
  background-color: transparent;
  box-shadow: 0 -20px 0 0 rgb(33,37,41);
  left:0px;
  bottom: -55px;
  height: 55px;
  width: 20px;
  border-top-left-radius: 22px;
}

/* Search Form Styles */
.search-form {
    margin-left:;
    position: relative;
}

.search-form .form-control {
    
    width: 400px;
    background-color:rgb(255, 255, 255);
    border: 2px rgb(255, 255, 255);
    border-color:rgb(255, 255, 255);
    padding-left: 2.5rem;
    padding-right: 1rem;
    height: 38px;
    border-radius:30px;
   
}

.search-form .form-control:focus {
    background-color: #fff;
    box-shadow: none;
  
    border-color: #007bff;
    
}

.search-icon {
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
    pointer-events: none;
}

/* Main Content */
.main-content {
    margin-left: 250px;
    margin-top: 60px;
    padding: 1.5rem;
    min-height: calc(100vh - 60px);
    background-color: #f8f9fa;
    transition: margin-left 0.3s ease-in-out;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: #212529;
}

.content-row {
    margin-bottom: 2rem;
}

.music-card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.2s;
    height: 100%;
    border: 1px solid rgba(0,0,0,0.05);
}

.music-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.music-card .card-img-top {
    aspect-ratio: 1;
    object-fit: cover;
    background-color: #e9ecef;
}

.music-card .card-body {
    padding: 1rem;
}

.music-card .card-title {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.music-card .card-text {
    font-size: 0.875rem;
    color: #6c757d;
}

.featured-card {
    height: 200px;
    border-radius: 12px;
    position: relative;
    overflow: hidden;
    margin-bottom: 1.5rem;
}

.featured-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.featured-card .featured-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1.5rem;
    background: linear-gradient(transparent, rgba(0,0,0,0.8));
    color: white;
}

.featured-card .featured-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.featured-card .featured-text {
    font-size: 0.875rem;
    opacity: 0.9;
}

.section-divider-content {
    height: 1px;
    background-color: rgba(0,0,0,0.1);
    margin: 2rem 0;
}

/* Songs List Styles */
.songs-section {
    background: #fff;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.song-item {
    display: flex;
    align-items: center;
    padding: 0.75rem;
    border-radius: 6px;
    transition: all 0.2s;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.song-item:hover {
    background-color: #f8f9fa;
}

.song-item:last-child {
    border-bottom: none;
}

.song-number {
    width: 30px;
    color: #6c757d;
    font-size: 0.9rem;
}

.song-cover {
    width: 40px;
    height: 40px;
    border-radius: 4px;
    margin-right: 1rem;
    object-fit: cover;
}






.song-actions {
    display: none;
    margin-left: 1rem;
}

.song-item:hover .song-actions {
    display: flex;
    gap: 0.5rem;
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
.bi-plus {
   font-size:17px;
}
.hover-wrap2 {
  position: relative;
  height: 100%;
}
.hover-wrap {
  position: relative;
  height: 90%;
}

.song-card {
  position: relative;
  border-radius: 8px;
  overflow: hidden;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  border: 1px solid rgba(0, 0, 0, 0.05);
  background: #fff;
  height: 100%;
}

.song-card-img {
  position: relative;
  width: 100%;
  aspect-ratio: 1 / 1; /* or use padding-top: 100% if older browser support */
  overflow: hidden;
}

.song-card-img img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  pointer-events: none;
}

.play-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.3);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.2s ease;
}

.play-overlay button {
  pointer-events: auto;
}

.hover-wrap:hover .song-card {
  transform: translateY(-3px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.hover-wrap2:hover .song-card {
  transform: translateY(-3px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.hover-wrap:hover .play-overlay {
  opacity: 1;
}
.hover-wrap2:hover .play-overlay {
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
    .col-lg-2{
        flex: 0 0 auto;
        width: 49.333333%;
        
    }
    .bottom{
        height:444px;
        position:relative;
        margin-left: 1px;
    }
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

/* Tooltip styles for icons */
.sidebar .nav-link {
    position: relative;
}

.sidebar .nav-link:hover::after {
    content: attr(data-title);
    position: absolute;
    left: 100%;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    z-index: 1002;
    display: none;
}

@media (max-width: 768px) {
    .sidebar .nav-link:hover::after {
        display: block;
    }
    .nah{
        margin-left:33px;
    }
}

#imageCarousel {
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
#imageCarousel .carousel-item img {
    height: 400px;
    object-fit: auto;
    transition: transform 0.3s ease-in-out;
}


#imageCarousel .carousel-item:hover img {
    transform: scale(1.1);
}

/* Make sure the zoom effect doesn't overflow */
#imageCarousel .carousel-item {
    overflow: hidden;
}

/* Ensure controls stay on top of zoomed image */
#imageCarousel .carousel-control-prev,
#imageCarousel .carousel-control-next {
    z-index: 0;
}

/* Ensure indicators stay on top of zoomed image */
#imageCarousel .carousel-indicators {
    z-index: 0;
}

.songs-list {
    margin-top: 20px;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    height: 400px;  
    display: flex;
    flex-direction: column;
}

.songs-list h3 {
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f1f1f1;
}

.list-group-item {
    cursor:pointer;
    border-left: none;
    border-right: none;
    padding: 15px;
    transition: all 0.3s ease;
    height: 60px;  
    display: flex;
    align-items: center;
}

.list-group-item:first-child {
    border-top: none;
}

.list-group-item:last-child {
    border-bottom: none;
}

.list-group-item:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
}

.list-group-item i {
    font-size: 1.2rem;
    color: #6c757d;
}

.list-group-item h5 {
    margin-bottom: 0.2rem;
    font-size: 1rem;
}

.list-group-item small {
    font-size: 0.85rem;
}

.songs-list .list-group {
    overflow-y: auto;
    flex-grow: 1;
    scrollbar-width: thin;
    padding-right: 5px;
}

/* Custom scrollbar styles */
.songs-list .list-group::-webkit-scrollbar {
    width: 6px;
}

.songs-list .list-group::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.songs-list .list-group::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 3px;
}

.songs-list .list-group::-webkit-scrollbar-thumb:hover {
    background: #555;
}




/* Footer Styles */
footer.display{
    display:none;
}
.footer {
    margin-left: 250px;
   
    padding: 1.5rem;
    transition: margin-left 0.3s ease-in-out;

    background-color: #1b1b1b !important;
    position: relative;
    margin-top: auto;
}
@media (max-width: 768px) {
    
  
    .footer{
        margin-left:0px;
    }
}

.footer-heading {
    color: #fff;
    font-weight: 600;
    position: relative;
    padding-bottom: 10px;
}

.footer-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: #007bff;
}

.footer-links a {
    transition: color 0.3s ease;
}

.footer-links a:hover {
    color: #007bff !important;
}

.social-links a {
    font-size: 1.25rem;
    transition: transform 0.3s ease, color 0.3s ease;
}

.social-links a:hover {
    color: #007bff !important;
    transform: translateY(-3px);
}

.subscribe-form .form-control {
    background-color: rgba(255, 255, 255, 0.1) !important;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.subscribe-form .form-control:focus {
    box-shadow: none;
    border-color: #007bff;
}

.subscribe-form .btn-primary {
    background-color: #007bff;
    border: none;
    padding: 8px 20px;
}

.subscribe-form .btn-primary:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}


.card {
    border: none;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.1);
}

.btn {
    border-radius: 50px;
    padding: 0.5rem 1.5rem;
    transition: all 0.3s ease;
}
.log {
    color:black;
    background-color:white;
    border-radius: 50px;
    padding: 0.5rem 1.5rem;
    transition: all 0.3s ease;
}
.log:hover {
    transform: translateY(-2px);
    color:black;
    background-color:white;
    
}

.btn-dark:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}


@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease forwards;
}
/* Container must be positioned relative */
.action-btn {
  position: relative;
}

.particles {
  position: absolute;
  top: 30%;
  left: 40%;
  pointer-events: none;
  transform: translate(-50%, -50%);
}

.particle {
  position: absolute;
  width: 6px;
  height: 6px;
  background: red;
  border-radius: 50%;
  opacity: 0;
  animation: particleBurst 600ms ease forwards;
}

@keyframes particleBurst {
  0% {
    transform: translate(0, 0) scale(1);
    opacity: 1;
  }
  100% {
    transform: translate(var(--x), var(--y)) scale(0);
    opacity: 0;
  }
}











</style>

<script>
  $(document).on("click", ".category-choose, .category-choose2", function () {
      $("body").addClass("noscroll");
  $(window).scrollTop(0);
    const isPrimary = $(this).hasClass("category-choose");
    const targetId = isPrimary ? "#category-browse" : ".main-content";
    $(targetId).html(`
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
    const id = $(this).attr("rel");
    const pi = $(this).attr("rel2");

    // Set correct URL for loading
    const url = isPrimary
        ? "albcat.php?id="+id+"&pi="+pi
        : "albcat.php?id="+id+"&pi="+pi;

  
    $(targetId).load(url, function(){
         $("body").removeClass("noscroll");
    });
});



    function getSkeleton2() {
  return `
  
  <div class="skeleton-header"></div>
      <div class="skeleton-grid2">
        <?php for ($i = 0; $i < 12; $i++): ?>
          <div class="skeleton-card2"></div>
        <?php endfor; ?>
      </div>
   `;
}
     
 function getSkeleton() {
  return `
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
    </div>`;
}
 function getSkeleton3() {
  return `
    <div class="skeleton-wrapper2">

      <div class="skeleton-grid2 ">
          <div class="skeleton-card4"></div>
          <div class="skeleton-header3"></div>
       
      </div>
      
          <div class="skeleton-card3"></div>
</div>`;
}

function loadCurrentContent() {
  const params = new URLSearchParams(window.location.search);

  const play = params.get("play");
  const subindex = params.get("subindex");
  const browse = params.get("browse");
  const liked = params.get("liked");
  const playlist = params.get("playlist");
  const myplay = params.get("myplay");

  let url = "subindex.php";

  if (play) {
    url = "play.php?id=" + encodeURIComponent(play);
  } else if (subindex) {
    url = "subindex.php?subindex=" + encodeURIComponent(subindex);
  } else if (browse) {
    url = "browse.php?browse=" + encodeURIComponent(browse);
  } else if (playlist) {
    url = "playlist.php?playlist=" + encodeURIComponent(playlist);
  } else if (myplay) {
    url = "play.php?pid=" + encodeURIComponent(myplay);
  } else if (liked) {
    url = "likesshower.php?liked=" + encodeURIComponent(liked);
  } 

 
  $(window).scrollTop(0);
  if( url == "subindex.php?subindex=" + encodeURIComponent(subindex) || url == "subindex.php"){
      $("footer").addClass("display");
    $("body").addClass("noscroll2");
     $(".main-content").html(getSkeleton2());

  } else if(url == "play.php?id=" + encodeURIComponent(play) || url == "play.php?pid=" + encodeURIComponent(myplay) ){
      if (play || myplay) {
    let targetDiv, phpFile, loadType;
    let id, type;

    if (play) {
      id = play;
      type = params.get("type") || "nom";
    } else if (myplay) {
      id = myplay;
      type = params.get("type") || "nom";
    }

   
    if (type === "nom") {
      targetDiv = ".albumplay1";
      phpFile = "albaudio.php";
    } else {
      targetDiv = ".albumplay2";
      phpFile = "albaudio2.php";
    }

 
    $(targetDiv).html("");
    $(targetDiv).load(phpFile + "?id=" + encodeURIComponent(id) + "&clicked=playbtn&type=" + type);
  }
     $("footer").addClass("display");
    $("body").addClass("noscroll2");
     $(".main-content").html(getSkeleton3());
  }
  else{
     $("footer").addClass("display");
    $("body").addClass("noscroll2");
 $(".main-content").html(getSkeleton());
  }
 

  $.get(url, function (data) {
    
    $(".main-content").html(data);
    initAudioPlayer(); // ⬅️ rebind everything
  $("body").removeClass("noscroll2");
  $("footer").removeClass("display");


  }).fail(function () {
    $(".main-content").html("<h2>Error loading page.</h2>");
    $("body").removeClass("noscroll");
  });
}
window.addEventListener("popstate", function () {
  loadCurrentContent();
});

// On first load
$(document).ready(function () {
  loadCurrentContent();
});

function bhai(){
    
    if(document.getElementById("ctrl").classList.contains('bi-play-fill')){
        document.getElementById("ctrl").classList.remove('bi-play-fill');
        document.getElementById("ctrl").classList.add('bi-pause-fill');
      
        $(document).on("click","#ctrl",function(){
    var rel = $(this).attr("rel");
    var audio = document.getElementById(rel);
        audio.play();
    
    });

    }
    else{
        document.getElementById("ctrl").classList.add('bi-play-fill');
        document.getElementById("ctrl").classList.remove('bi-pause-fill');
      
        $(document).on("click","#ctrl",function(){
    var rel = $(this).attr("rel");
    var audio = document.getElementById(rel);
        audio.pause();
    
    });
       

    }


         


}

function playsound(x) {
  const audio = document.getElementById('audio4' + x);
  
  if (!audio) return; // safety check

  if (audio.paused) {
   
    const allAudios = document.querySelectorAll(`.doom3 audio`);
    allAudios.forEach(a => {
      if (a !== audio) a.pause();
    });

    audio.play();
  } else {
    audio.pause();
  }
}




$("#bar").on("input", function () {
    updateBarStyle(this); 
});
let progressInterval = null;
let currentAudio = null;
let currentPop = null;
function playThisPop(pop, type) {
    currentPop = pop;

    var bar = document.getElementById('bar');
    var img = pop.attr("gol");
    var txt = pop.attr("rel");
    var alb = pop.attr("id");

    $("#bom").html("<img src='album/"+img+".jpg' style='height:47px; width:47px;margin-left:-30px;margin-top:5px; z-index:50000;border-radius:9px;' loading='lazy' alt='Song cover'>");
    $("#rnsong").html("<div style='color:white;position:absolute; font-size:15px; margin-left:10px;margin-top:10px;'>" + txt + "</div>");
    $("#rnalb").html("<div style='color:white;position:absolute; font-size:11px; margin-left:10px;margin-top:30px;'>" + alb + "</div>");

    var pol = pop.attr("pol");
    $("#ctrl").attr('rel', pol);
    $("#bar").attr('rel', pol);

    // Pause previous audio if any
    if (currentAudio && !currentAudio.paused) {
        currentAudio.pause();
    }

    // Set new audio
    currentAudio = document.getElementById(pol);
    currentAudio.currentTime = 0;
    currentAudio.play();

    // Reset icon
    $("#ctrl").removeClass("bi-play-fill").addClass("bi-pause-fill");

    // Remove old timeupdate listeners (safe way)
    currentAudio.ontimeupdate = function () {
        const dur = currentAudio.duration;
        const cur = currentAudio.currentTime;

        const durMin = Math.floor(dur / 60);
        const durSec = Math.floor(dur % 60);
        const curMin = Math.floor(cur / 60);
        const curSec = Math.floor(cur % 60);

        $("#shuru").text(`0${curMin}:${curSec < 10 ? "0" + curSec : curSec}`);
        $("#end").text(`0${durMin}:${durSec < 10 ? "0" + durSec : durSec}`);

        bar.max = dur;
        bar.value = cur;
    };

    // Clear any old interval
    if (progressInterval) clearInterval(progressInterval);

    // Start new interval
    progressInterval = setInterval(function () {
        updateBarStyle(bar);
        if (currentAudio) {
            bar.value = currentAudio.currentTime;
        }
    }, );
}


let currentType = "pop"; // default type

$(document).on("click", ".pop", function () {
    currentType = "pop"; 
    playThisPop($(this), currentType);
});

$(document).on("click", ".nom", function () {
    currentType = "nom";
    playThisPop($(this), currentType);
});
$(document).on("click", ".nom2", function () {
    currentType = "nom2";
    playThisPop($(this), currentType);
});
$(document).on("click", ".nom3", function () {
    currentType = "nom3"; 
    playThisPop($(this), currentType);
});
$(document).on("click", ".nom4", function () {
    currentType = "nom4";
    playThisPop($(this), currentType);
});
$(document).on("click", ".like-click-play", function () {
    currentType = "likeplay";
    playThisPop($(this), currentType);
});
let loadOnStart = true;

$(document).on("click", ".play-btn,.search-item", function(e) {
    e.preventDefault(); // ✅ Prevent default anchor/button behavior

    $("body").addClass("noscroll");
    $(window).scrollTop(0);
    var id = $(this).attr("id");
    // 🔥 Show skeleton loader in main-content
    $('.main-content').html(`
      <div class="skeleton-wrapper2">
        <div class="skeleton-grid2">
          <div class="skeleton-card4"></div>
          <div class="skeleton-header3"></div>
        </div>
        <div class="skeleton-card3"></div>
      </div>
    `);

    

    // 🔥 Determine currently playing doom and its albumplay div
    let currentPlayingAlbumDiv = null;

    $(".doom, .doom2, .doom3, .doom4").each(function() {
        var audio = $(this).find("audio")[0];
        if (audio && !audio.paused) {
            if ($(this).closest(".albumplay1").length > 0) {
                currentPlayingAlbumDiv = ".albumplay1";
            } else if ($(this).closest(".albumplay2").length > 0) {
                currentPlayingAlbumDiv = ".albumplay2";
            }
            return false; // break loop
        }
    });

    console.log("▶ Currently playing in:", currentPlayingAlbumDiv);

    // 🔁 Decide target div, PHP file, and loadType (nom/nom2) based on playing status
    let targetDiv, phpFile, loadType;

    if (currentPlayingAlbumDiv === ".albumplay1") {
        targetDiv = ".albumplay2";
        phpFile = "albaudio2.php";
        loadType = "nom2";
    } else if (currentPlayingAlbumDiv === ".albumplay2") {
        targetDiv = ".albumplay1";
        phpFile = "albaudio.php";
        loadType = "nom";
    } else {
        if (loadOnStart) {
            targetDiv = ".albumplay1";
            phpFile = "albaudio.php";
            loadType = "nom";
        } else {
            targetDiv = ".albumplay2";
            phpFile = "albaudio2.php";
            loadType = "nom2";
        }
    }

    // 🔥 Load play.php into main-content with correct type reflecting the targetDiv
    $('.main-content').load('play.php?id=' + encodeURIComponent(id) + '&type=' + loadType, function () {
        $("body").removeClass("noscroll");

    });

    // ✅ Update URL without reloading
    history.pushState(null, '', '?play=' + encodeURIComponent(id) + '&type=' + loadType);

    // 🔥 Clear previous doom audios and load new albaudio into targetDiv
    $(targetDiv).html("");
    $(targetDiv).load(phpFile + "?id=" + id + "&clicked=playbtn&type=" + loadType);

    loadOnStart = !loadOnStart; // toggle for next click only if nothing was playing
});


// 🔴 UNIVERSAL NEXT FUNCTION
function nextSong() {
    if (!currentType) return; // no type selected yet

    let audios;

     if (currentType === "pop") {
        audios = document.querySelectorAll('.boom audio');
    } else if (currentType === "nom") {
        audios = document.querySelectorAll(`.doom audio`);
    } else if (currentType === "nom2") {
        audios = document.querySelectorAll(`.doom2 audio`);
    }  else if (currentType === "nom3") {
        audios = document.querySelectorAll(`.doom3 audio`);
    }  else if (currentType === "nom4") {
        audios = document.querySelectorAll(`.doom4 audio`);
    }  else if (currentType === "likeplay") {
        audios = document.querySelectorAll(`.doom5 audio`);
    }  else {
        return; // unknown type
    }

    if (!currentAudio) {
        currentAudio = audios[0];
    }

    let index = Array.from(audios).indexOf(currentAudio);
    let nextIndex = (index + 1) % audios.length;

    let nextAudio = audios[nextIndex];

    // 🔥 Create dummy jQuery object mimicking .pop or .nom with audio tag attributes
    let dummyPop = $("<div></div>");
    dummyPop.attr("gol", nextAudio.getAttribute("gol"));
    dummyPop.attr("rel", nextAudio.getAttribute("rel"));
    dummyPop.attr("id", nextAudio.getAttribute("pol"));
    dummyPop.attr("pol", nextAudio.id);

    playThisPop(dummyPop, currentType);
}

// 🔴 UNIVERSAL PREVIOUS FUNCTION
function prevSong() {
    if (!currentType) return; // no type selected yet

     let audios;

       if (currentType === "pop") {
        audios = document.querySelectorAll('.boom audio');
    } else if (currentType === "nom") {
        audios = document.querySelectorAll(`.doom audio`);
    } else if (currentType === "nom2") {
        audios = document.querySelectorAll(`.doom2 audio`);
    }  else if (currentType === "nom3") {
        audios = document.querySelectorAll(`.doom3 audio`);
    }  else if (currentType === "nom4") {
        audios = document.querySelectorAll(`.doom4 audio`);
    } else {
        return; // unknown type
    }

    if (!currentAudio) {
        currentAudio = audios[0];
    }

    let index = Array.from(audios).indexOf(currentAudio);
    let prevIndex = (index - 1 + audios.length) % audios.length;

    let prevAudio = audios[prevIndex];

    // 🔥 Create dummy jQuery object mimicking .pop or .nom with audio tag attributes
    let dummyPop = $("<div></div>");
    dummyPop.attr("gol", prevAudio.getAttribute("gol"));
    dummyPop.attr("rel", prevAudio.getAttribute("rel"));
    dummyPop.attr("id", prevAudio.getAttribute("pol"));
    dummyPop.attr("pol", prevAudio.id);

    playThisPop(dummyPop, currentType);
}

let wasPlaying = false;

$(document).on("mousedown touchstart", "#bar", function () {
    const gana = $(this).attr("rel");
    const audio = document.getElementById(gana);

    // Save if it was playing
    wasPlaying = !audio.paused;

    // Pause while dragging
    audio.pause();
});

$(document).on("input", "#bar", function () {
    const gana = $(this).attr("rel");
    const audio = document.getElementById(gana);

    // Update current time without playing
    audio.currentTime = this.value;

    updateBarStyle(this);
});

$(document).on("mouseup touchend", "#bar", function () {
    const gana = $(this).attr("rel");
    const audio = document.getElementById(gana);

    // Resume playback only if it was playing before
    if (wasPlaying) {
        audio.play();
        $("#ctrl").removeClass("bi-play-fill").addClass("bi-pause-fill");
    }
});




window.addEventListener('DOMContentLoaded', () => {
 if (!currentType) return; // no type selected yet

    let audios;

       if (currentType === "pop") {
        audios = document.querySelectorAll('.boom audio');
    } else if (currentType === "nom") {
        audios = document.querySelectorAll(`.doom audio`);
    } else if (currentType === "nom2") {
        audios = document.querySelectorAll(`.doom2 audio`);
    }  else if (currentType === "nom3") {
        audios = document.querySelectorAll(`.doom3 audio`);
    }  else if (currentType === "nom4") {
        audios = document.querySelectorAll(`.doom4 audio`);
    } else {
        return; // unknown type
    }

  document.addEventListener('play', function(e) {
    for (let i = 0; i < audios.length; i++) {
      if (audios[i] !== e.target) {
        audios[i].pause();
      }
    }
  }, true);

  for (let i = 0; i < audios.length; i++) {
    const audio = audios[i];
    audio.addEventListener('ended', function () {
        
  const nextAudio = audios[(i + 1) % audios.length];
  currentAudio = nextAudio;
  currentAudio.currentTime = 0;
  currentAudio.play();

  // ⬇️ Update song and album info for next audio
  const txt = nextAudio.getAttribute("rel");
  const alb = nextAudio.getAttribute("pol");
  const img = nextAudio.getAttribute("gol");
  

  $("#bom").html("<img src='album/"+img+".jpg' style='height:47px; width:47px;margin-left:-30px;margin-top:5px; z-index:50000;border-radius:9px;' loading='lazy' alt='Song cover'>");
  $("#rnsong").html("<div style='color:white;position:absolute; font-size:15px; margin-left:200px;margin-top:10px;'>" + txt + "</div>");
  $("#rnalb").html("<div style='color:white;position:absolute; font-size:11px; margin-left:20px;margin-top:30px;'>" + alb + "</div>");

  // Set rel and update progress bar tracking
  $("#ctrl").attr("rel", nextAudio.id);
  $("#bar").attr("rel", nextAudio.id);

  const bar = document.getElementById('bar');

  currentAudio.ontimeupdate = function () {
    const dur = currentAudio.duration;
    const cur = currentAudio.currentTime;

    const durMin = Math.floor(dur / 60);
    const durSec = Math.floor(dur % 60);
    const curMin = Math.floor(cur / 60);
    const curSec = Math.floor(cur % 60);

    $("#shuru").text(`0${curMin}:${curSec < 10 ? "0" + curSec : curSec}`);
    $("#end").text(`0${durMin}:${durSec < 10 ? "0" + durSec : durSec}`);

    bar.max = dur;
    bar.value = cur;
  };

  // Restart bar interval for new song
  if (progressInterval) clearInterval(progressInterval);
  progressInterval = setInterval(function () {
    updateBarStyle(bar);
    bar.value = currentAudio.currentTime;
  }, 10);
});

  }
});

function initAudioPlayer() {
  if (!currentType) return; // no type selected yet

    let audios;

       if (currentType === "pop") {
        audios = document.querySelectorAll('.boom audio');
    } else if (currentType === "nom") {
        audios = document.querySelectorAll(`.doom audio`);
    } else if (currentType === "nom2") {
        audios = document.querySelectorAll(`.doom2 audio`);
    }  else if (currentType === "nom3") {
        audios = document.querySelectorAll(`.doom3 audio`);
    }  else if (currentType === "nom4") {
        audios = document.querySelectorAll(`.doom4 audio`);
    } else {
        return; // unknown type
    }

  document.addEventListener('play', function(e) {
    for (let i = 0; i < audios.length; i++) {
      if (audios[i] !== e.target) {
        audios[i].pause();
      }
    }
  }, true);

  for (let i = 0; i < audios.length; i++) {
    const audio = audios[i];

    audio.addEventListener('ended', function () {
      const nextAudio = audios[(i + 1) % audios.length];
      currentAudio = nextAudio;
      currentAudio.currentTime = 0;
      currentAudio.play();

      const txt = nextAudio.getAttribute("rel");
      const alb = nextAudio.getAttribute("pol");
      const img = nextAudio.getAttribute("gol");

  $("#bom").html("<img src='album/"+img+".jpg' style='height:47px; width:47px;margin-left:-30px;margin-top:5px; z-index:50000;border-radius:9px;' loading='lazy' alt='Song cover'>");

      $("#rnsong").html(`<div style='color:white;position:absolute; font-size:15px; margin-left:10px;margin-top:10px;'>${txt}</div>`);
      $("#rnalb").html(`<div style='color:white;position:absolute; font-size:11px; margin-left:10px;margin-top:30px;'>${alb}</div>`);

      $("#ctrl").attr("rel", nextAudio.id);
      $("#bar").attr("rel", nextAudio.id);

      const bar = document.getElementById('bar');

      currentAudio.ontimeupdate = function () {
        const dur = currentAudio.duration;
        const cur = currentAudio.currentTime;

        const durMin = Math.floor(dur / 60);
        const durSec = Math.floor(dur % 60);
        const curMin = Math.floor(cur / 60);
        const curSec = Math.floor(cur % 60);

        $("#shuru").text(`0${curMin}:${curSec < 10 ? "0" + curSec : curSec}`);
        $("#end").text(`0${durMin}:${durSec < 10 ? "0" + durSec : durSec}`);

        bar.max = dur;
        bar.value = cur;
      };

      if (progressInterval) clearInterval(progressInterval);
      progressInterval = setInterval(function () {
        updateBarStyle(bar);
        bar.value = currentAudio.currentTime;
      }, 10);
    });
  }
}



  
                    



  
function myFunction(i) {
    var p;
    for (p = 0; p<12; p++) {
        if(p==i){
  document.getElementById("myDropdown"+i).classList.toggle("show");
        }
        else{
            document.getElementById("myDropdown"+p).classList.remove("show");
        }
    }

}

function menu(i){
    event.stopPropagation();

    var anyOpen = false;

    // Loop to handle dropdowns
    for (var p = 0; p < 12; p++) {
         document.getElementById("myDropdown"+p).classList.remove("show");
        var dropdown = document.getElementById("myDropdown2" + p);
        if (!dropdown) continue;

        if (p == i) {
            dropdown.classList.toggle("show2");

            // Check if this dropdown is now open
            if (dropdown.classList.contains("show2")) {
                anyOpen = true;
            }
        } else {
            dropdown.classList.remove("show2");
        }
    }

    // ✅ Set overflow based on whether any dropdown is open
    var list = document.getElementById("list");
    var slist = document.getElementById("slist");

    if (anyOpen) {
        list.style.overflow = "hidden";
        slist.style.overflow = "hidden";
    } else {
        list.style.overflow = "auto";
        slist.style.overflow = "auto";
    }
}
function markLikedSongs() {
  $.ajax({
    url: 'likeddisplay.php',
    method: 'GET',
    success: function(response){
      const likedSongs = JSON.parse(response);

      likedSongs.forEach(scode => {
        // Select ALL <i> tags with scode attribute matching AND ensure it is a heart icon
        const icons = document.querySelectorAll(`i[scode="${scode}"]`);
         

        icons.forEach(icon => {
          if(icon.classList.contains("bi-heart") || icon.classList.contains("bi-heart-fill")){
            
            icon.classList.remove("bi-heart");
            icon.classList.add("bi-heart-fill");
            icon.style.color = "red";

          }
      
        });
      });
    },
    error: function(xhr, status, error){
      alert("nah");
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  setTimeout(markLikedSongs, 400); 
});


<?php if (isset($_COOKIE['login'])): ?>

// ✅ User is logged in – full like functionality
function like(icon) {
  event.stopPropagation();

  const sn = icon.getAttribute("sn");
  const scode = icon.getAttribute("scode");

  icon.classList.toggle("bi-heart");
  icon.classList.toggle("bi-heart-fill");

  let action = "";
  if (icon.classList.contains("bi-heart-fill")) {
    icon.style.color = "red";
    action = "like";

    const btn = icon.parentElement;
    const particlesContainer = btn.querySelector(".particles");

    for (let i = 0; i < 20; i++) {
      const particle = document.createElement("span");
      particle.classList.add("particle");

      const angle = Math.random() * 2 * Math.PI;
      const radius = 20 + Math.random() * 10;
      const x = Math.cos(angle) * radius;
      const y = Math.sin(angle) * radius;

      particle.style.setProperty("--x", `${x}px`);
      particle.style.setProperty("--y", `${y}px`);
      particlesContainer.appendChild(particle);

      particle.addEventListener("animationend", () => {
        particle.remove();
      });
    }

  } else {
    icon.style.color = "";
    action = "unlike";
  }

  $.ajax({
    url: 'songliked.php',
    method: "POST",
    data: { sn: sn, scode: scode, action: action },
    success: function(response){
      console.log("Like/unlike response:", response);
    },
    error: function(xhr, status, error){
      console.error("Error liking/unliking:", error);
    }
  });
}

function likeAlbum(icon) {
  event.stopPropagation();

  const acode = icon.getAttribute("acode");
  const isLiked = icon.classList.contains("bi-heart-fill");
  let action = isLiked ? "unlike" : "like";

  const icons = document.querySelectorAll(`i[acode="${acode}"]`);
  icons.forEach(i => {
    i.classList.toggle("bi-heart");
    i.classList.toggle("bi-heart-fill");
    i.style.color = i.classList.contains("bi-heart-fill") ? "red" : "";

    let particlesContainer = i.parentElement.querySelector(".particles");
    if (!particlesContainer) {
      particlesContainer = document.createElement("span");
      particlesContainer.classList.add("particles");
      i.parentElement.appendChild(particlesContainer);
    }
  });

  if (action === "like") {
    const particlesContainer = icon.parentElement.querySelector(".particles");
    for (let i = 0; i < 20; i++) {
      const particle = document.createElement("span");
      particle.classList.add("particle");

      const angle = Math.random() * 2 * Math.PI;
      const radius = 20 + Math.random() * 10;
      const x = Math.cos(angle) * radius;
      const y = Math.sin(angle) * radius;

      particle.style.setProperty("--x", `${x}px`);
      particle.style.setProperty("--y", `${y}px`);
      particlesContainer.appendChild(particle);

      particle.addEventListener("animationend", () => {
        particle.remove();
      });
    }
  }

  $.ajax({
    url: 'albumliked.php',
    method: "POST",
    data: { acode: acode, action: action },
    success: function(response){
      console.log("Album like/unlike response:", response);
    },
    error: function(xhr, status, error){
      console.error("Error liking/unliking album:", error);
    }
  });
}

<?php else: ?>

// ❌ User not logged in – show login modal
function like(icon) {
  event.stopPropagation();
  document.getElementById('loginModal').classList.add('active');
}

function likeAlbum(icon) {
  event.stopPropagation();
  document.getElementById('loginModal').classList.add('active');
}

<?php endif; ?>




function markLikedAlbums() {
  $.ajax({
    url: 'likedalbumsdisplay.php',
    method: 'GET',
    success: function(response){
      const likedAlbums = JSON.parse(response);

      likedAlbums.forEach(acode => {
        const icons = document.querySelectorAll(`i[acode="${acode}"]`);

        icons.forEach(icon => {
          if(icon.classList.contains("bi-heart") || icon.classList.contains("bi-heart-fill")){
            icon.classList.remove("bi-heart");
            icon.classList.add("bi-heart-fill");
            icon.style.color = "red";
          }
        });
      });
    },
    error: function(xhr, status, error){
      console.error("Error loading liked albums:", error);
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  setTimeout(markLikedAlbums); // Load liked albums after 1 second
});
document.addEventListener("DOMContentLoaded", () => {
  setTimeout(markLikedAlbums,3000); // Load liked albums after 1 second
});


  function menu2(i){
    event.stopPropagation();
     
    var x;
    var p;

       
    for (p = 0; p<12; p++) {
        if(p==i){
  document.getElementById("myDropdown3"+i).classList.toggle("show3");
        }
        else{
           
         
            document.getElementById("myDropdown3"+p).classList.remove("show3");
          
            
        }
    }
    
        

   
  }


// To enable noscroll3 while keeping position
function enableNoScroll3() {
  const scrollY = window.scrollY;
  document.body.style.position = 'fixed';
  document.body.style.top = `-${scrollY}px`;
  document.body.style.width = '100%';
  document.body.classList.add('noscroll3');
  document.body.dataset.scrollY = scrollY;
}

// To disable noscroll3 and restore scroll
function disableNoScroll3() {
  const scrollY = document.body.dataset.scrollY;

  // Remove fixed positioning first, but set scroll instantly
  document.body.style.position = '';
  document.body.style.top = '';
  document.body.style.width = '';
  document.body.classList.remove('noscroll3');

  // Immediately restore scroll without flicker
  window.scrollTo(0, parseInt(scrollY || '0'));

  delete document.body.dataset.scrollY;
}


        
    
function submenu(i){
 var isLoggedIn = <?php echo isset($_COOKIE['login']) ? 'true' : 'false'; ?>;
 if(isLoggedIn){

     const button = document.getElementById("popupButton"+i);
       const pop = document.getElementById("popupButton"+i).rel;
     
       const albu = button.getAttribute('rel2');
       const sn = button.getAttribute('sn');
       const scode = button.getAttribute('scode');
            const popup = document.getElementById('popup');
            popup.style.display = 'flex';
           
          
            $("#addsongname").html("<h5  class='mb-1' sn="+sn+" scode="+scode+" id='addsongname2'>"+pop+"</h5>");
            $("#addsongalb").html("<small class='text-muted' id='addsongalb' >"+albu+"</small>");
            setTimeout(() => {
               enableNoScroll3();
                popup.classList.add('show');
            }, 5);
     
            
     

        document.getElementById('closePopup').onclick = function() {
            const popup = document.getElementById('popup');
            popup.classList.remove('show');
            setTimeout(() => {
                disableNoScroll3() 
                popup.style.display = 'none';
            }, 1000);
        };
        
   
        // Create Album Popup
        const createButton = document.querySelector('.create-button');
        const createAlbumPopup = document.querySelector('.create-album-popup');
        const createAlbumOverlay = document.querySelector('.create-album-overlay');
        const createAlbumClose = document.querySelector('.create-album-close');
        const createAlbumCancel = document.querySelector('.create-album-cancel');

        createButton.onclick = function(e) {
            e.stopPropagation();
            createAlbumPopup.classList.add('show');
            createAlbumOverlay.classList.add('show');
        };

        [createAlbumClose, createAlbumCancel].forEach(button => {
            button.onclick = function(e) {
                e.stopPropagation();
                createAlbumPopup.classList.remove('show');
                createAlbumOverlay.classList.remove('show');
            };
        });
       
 }
 else{
document.getElementById('loginModal').classList.add('active');
        disableScroll();
 }
     
   

      
    
    }


  
  
window.addEventListener('click',function(event) {
   
   
   if (!event.target.matches('.bi-plus') ) {
      
   var dropdowns = document.getElementsByClassName("dropdown-content");
   var enddropdowns = document.getElementsByClassName("enddropdown-content");
   var i;
   for (i = 0; i < dropdowns.length; i++) {
     var openDropdown = dropdowns[i];
     if (openDropdown.classList.contains('show')) {
       openDropdown.classList.remove('show');
     }
   }
   var i;
   for (i = 0; i < enddropdowns.length; i++) {
     var openDropdown = enddropdowns[i];
     if (openDropdown.classList.contains('show')) {
       openDropdown.classList.remove('show');
     }
   }
 }
 
if (!event.target.closest('.ooy')) {
 

  // Function to close dropdowns of a given class with their specific show class
  function closeDropdowns(contentClass, showClass) {
    var dropdowns = document.getElementsByClassName(contentClass);
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains(showClass)) {
        openDropdown.classList.remove(showClass);
      }
    }
  }

  closeDropdowns("dropdown-content2", "show2");
  closeDropdowns("dropdown-content3", "show3");
     document.getElementById("list").style.overflow = "auto";
  document.getElementById("slist").style.overflow = "auto";
   
}



});




$(document).on("click", ".song-space", function () {
  $("#overlayBlocker").show();

  const song = document.getElementById("addsongname2");
  const sn = song.getAttribute("sn");
  const scode = song.getAttribute("scode");
  const tid = $(this).attr("id");
  showAlert("⏱️ Adding song to playlist...");

  $.post("addsong.php", { snt: sn, code: scode, id: tid }, function (data) {
    data = data.trim();

    if (data === "success") {
      showAlert("🎵 Song is added to playlist!");
    } else {
      showAlert("❌ Failed to add song.");
    }
  });
});


    $(document).on("click",".create-album-save",function(){
        const createAlbumPopup = document.querySelector('.create-album-popup');
                const createAlbumOverlay = document.querySelector('.create-album-overlay');
                createAlbumPopup.classList.remove('show');
                createAlbumOverlay.classList.remove('show');
      
     const albname = document.getElementById("albname").value;
     const albdes = document.getElementById("albdes").value;
        
      $.post(
        "albcreate.php",{title:albname,description:albdes},function(data){
            data=data.trim();
            if(data=="success") {
   
                $("#song-grid").load("songgrid.php");
            }
        }
      );
    });
   <?php
function renderSongGrid($conn) {
    if (!isset($_COOKIE["login"])) return;

    $email = $conn->real_escape_string($_COOKIE["login"]);

    // 🔁 Combine both queries using JOIN
    $sql = "
        SELECT clientalb.code AS album_code, clientalb.title AS album_title
        FROM clients
        INNER JOIN clientalb ON clients.code = clientalb.clcode
        WHERE clients.email = '$email'
    ";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $albumCode = htmlspecialchars($row["album_code"]);
        $albumTitle = htmlspecialchars($row["album_title"]);

        echo <<<HTML
        <div class="song-space" id="{$albumCode}">
            <img src="song3.jpg" alt="Song Image" class="song-image">
            <div class="song-info">
                <div class="song-title">{$albumTitle}</div>
            </div>
        </div>
        <div id="overlayBlocker" style="display: none;"></div>
        <div id="customAlert" class="alert">
  ⏱️ Please wait... this is your sliding alert.
</div>
HTML;
    }
}
?>

   
  
  
  var isLoggedIn = <?php echo isset($_COOKIE['login']) ? 'true' : 'false'; ?>;
 let currentRequest = null;
  $(document).on("click", "#subindex", function() {
   document.getElementById("closePopup").click();
    $("body").addClass("noscroll");

// Scroll to top instantly
$(window).scrollTop(0);
$('.main-content').html(`
  
    <div class="skeleton-header"></div>
    <div class="skeleton-grid2">
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
      <div class="skeleton-card2"></div>
    </div>
 
`);

      var id = $(this).attr("id");
      
      if (currentRequest) {
    currentRequest.abort();
  }

  // Start new AJAX request and store it
  currentRequest = $.ajax({
    url: 'subindex.php',
    success: function (data) {
      $('.main-content').html(data);
      initAudioPlayer();
      $("body").removeClass("noscroll");
    },
    complete: function () {
      currentRequest = null; // Clear after complete
    }
  });

      history.pushState(null, '', '?subindex=' + id);
 
    
  });

$(document).on("click", "#playlist", function () {
    document.getElementById("closePopup").click();
    $("body").addClass("noscroll");
    $(window).scrollTop(0);

    if (isLoggedIn) {
        $('.main-content').html(`
          <div class="skeleton-wrapper">
            <div class="skeleton-header2"></div>
            <div class="skeleton-grid">
              ${'<div class="skeleton-card"></div>'.repeat(8)}
            </div>
          </div>
        `);

        var id = $(this).attr("id");

        if (currentRequest) currentRequest.abort();
        currentRequest = $.ajax({
            url: 'playlist.php',
            success: function (data) {
                $('.main-content').html(data);
                $("body").removeClass("noscroll");
            },
            complete: function () {
                currentRequest = null;
            }
        });

        history.pushState(null, '', '?playlist=' + id);
    } else {
        document.getElementById('loginModal').classList.add('active');
    }
});

$(document).on("click", "#browse", function () {
    document.getElementById("closePopup").click();
    $("body").addClass("noscroll");
    $(window).scrollTop(0);

    $('.main-content').html(`
      <div class="skeleton-wrapper">
        <div class="skeleton-header2"></div>
        <div class="skeleton-grid">
          ${'<div class="skeleton-card"></div>'.repeat(8)}
        </div>
      </div>
    `);

    var id = $(this).attr("id");

    if (currentRequest) currentRequest.abort();
    currentRequest = $.ajax({
        url: 'browse.php',
        success: function (data) {
            $('.main-content').html(data);
            $("body").removeClass("noscroll");
            markLikedAlbums();
        },
        complete: function () {
            currentRequest = null;
        }
    });

    history.pushState(null, '', '?browse=' + id);
});

$(document).on("click", "#liked", function () {
    document.getElementById("closePopup").click();
    $("body").addClass("noscroll");
    $(window).scrollTop(0);

    if (isLoggedIn) {
        $('.main-content').html(`
          <div class="skeleton-wrapper">
            <div class="skeleton-header2"></div>
            <div class="skeleton-grid">
              ${'<div class="skeleton-card"></div>'.repeat(8)}
            </div>
          </div>
        `);

        $('.likeplay').load('likedsongsplay.php');

        var id = $(this).attr("id");

        if (currentRequest) currentRequest.abort();
        currentRequest = $.ajax({
            url: 'likesshower.php',
            success: function (data) {
                $('.main-content').html(data);
                $("body").removeClass("noscroll");
                markLikedSongs();
            },
            complete: function () {
                currentRequest = null;
            }
        });

        history.pushState(null, '', '?liked=' + id);
    } else {
        document.getElementById('loginModal').classList.add('active');
    }
});

$(document).on("click", "#categories", function () {
    document.getElementById("closePopup").click();
    $("body").addClass("noscroll");
    $(window).scrollTop(0);

    $('.main-content').html(`
      <div class="skeleton-wrapper">
        <div class="skeleton-header2"></div>
        <div class="skeleton-grid">
          ${'<div class="skeleton-card"></div>'.repeat(8)}
        </div>
      </div>
    `);

    var id = $(this).attr("id");

    if (currentRequest) currentRequest.abort();
    currentRequest = $.ajax({
        url: 'categories.php',
        success: function (data) {
            $('.main-content').html(data);
            $("body").removeClass("noscroll");
        },
        complete: function () {
            currentRequest = null;
        }
    });

    history.pushState(null, '', '?categories=' + id);
});




function updateBarStyle(el) {
    const val = (el.value - el.min) / (el.max - el.min) * 100;
    el.style.background = `linear-gradient(to right, white 0%, white ${val}%, rgb(107, 98, 102) ${val}%)`;
}

window.addEventListener("load", function () {
  // Ensure the entire page is fully rendered
  const contentLoaded = document.querySelector('.main-content');

  // Small timeout for smoother UX (optional)
  setTimeout(() => {
    document.querySelector('.page-loader').style.display = 'none';
    document.body.classList.remove('noscroll');
  }, 1); // adjust delay if needed
});
let loadOnStartUK = true; // UK-specific album toggler for song-space2
let loadTypeToggleUK = true; // UK-specific nom3/nom4 toggler

let loadOnStart2 = true; // album toggler for song-space2
let loadTypeToggle2 = true; // nom3/nom4 toggler for song-space2

$(document).on("click", ".song-space2", function (e) {
  e.preventDefault();

  $("body").addClass("noscroll");
  $(window).scrollTop(0);

  // Skeleton loader
  $('.main-content').html(`
    <div class="skeleton-wrapper2">
      <div class="skeleton-grid2">
        <div class="skeleton-card4"></div>
        <div class="skeleton-header3"></div>
      </div>
      <div class="skeleton-card3"></div>
    </div>
  `);

  var id = $(this).attr("id"); // ✅ using 'id' to match albaudio.php usage

  // Determine currently playing doom and its albumplay div
  let currentPlayingAlbumDiv2 = null;

  $(".doom, .doom2, .doom3, .doom4").each(function() {
    var audio = $(this).find("audio")[0];
    if (audio && !audio.paused) {
      if ($(this).closest(".albumplay1").length > 0) {
        currentPlayingAlbumDiv2 = ".albumplay1";
      } else if ($(this).closest(".albumplay2").length > 0) {
        currentPlayingAlbumDiv2 = ".albumplay2";
      }
      return false; // break loop
    }
  });

  console.log("▶ Currently playing in (song-space2):", currentPlayingAlbumDiv2);

  // Decide target div, PHP file, and loadType (nom3/nom4) based on playing status
  let targetDiv2, phpFile2, loadType2;

  if (currentPlayingAlbumDiv2 === ".albumplay1") {
    targetDiv2 = ".albumplay2";
    phpFile2 = "albaudio2.php";
    loadType2 = "nom4";
  } else if (currentPlayingAlbumDiv2 === ".albumplay2") {
    targetDiv2 = ".albumplay1";
    phpFile2 = "albaudio.php";
    loadType2 = "nom3";
  } else {
    if (loadOnStart2) {
      targetDiv2 = ".albumplay1";
      phpFile2 = "albaudio.php";
      loadType2 = "nom3";
    } else {
      targetDiv2 = ".albumplay2";
      phpFile2 = "albaudio2.php";
      loadType2 = "nom4";
    }
  }

  // Load play.php with correct type
  $('.main-content').load('play.php?pid=' + encodeURIComponent(id) + '&type=' + loadType2, function () {
    $("body").removeClass("noscroll");
  });

  // Update URL
  history.pushState(null, '', '?myplay=' + encodeURIComponent(id) + '&type=' + loadType2);

  // Load albaudio into targetDiv
  $(targetDiv2).html("");
  $(targetDiv2).load(phpFile2 + "?id=" + id + "&clicked=songspace&type=" + loadType2);

  // Toggle for next click
  loadOnStart2 = !loadOnStart2;
  loadTypeToggle2 = !loadTypeToggle2;
});

$(document).ready(function(){
  $("#searchFor").keyup(function(){
    var search_term = $(this).val();

    if (search_term == "" || search_term == null) {
      $("#searchResult").html(``);
    } else {
      $.ajax({
        url: 'search.php',
        method: "post",
        data: { search_term: search_term },
        dataType: "text",
        success: function(data){
          $('#searchResult').html(data).slideDown(200);
        }
      });
    }
  });
   $(document).on("click", ".search-item", function() {
    $('#searchResult').slideUp(200);
  });

  // Optional: Hide results if clicked outside
  $(document).click(function(e) {
    if (!$(e.target).closest('#searchResult, #searchFor').length) {
      $('#searchResult').slideUp(200);
    }
  });
});

function showAlert(message = "⏱️ Please wait...") {
  const alert = document.getElementById("customAlert");
  alert.textContent = message;

  alert.classList.remove("hide");
  alert.classList.add("show");

  setTimeout(() => {
    alert.classList.remove("show");
    alert.classList.add("hide");
    document.getElementById("overlayBlocker").style.display = "none"; 
  }, 3000);
}

    window.addEventListener("DOMContentLoaded", function () {
      const toast = document.getElementById("loginToast");
   
      // Show the toast
      toast.classList.add("show");

      // Hide after 3 seconds
      setTimeout(() => {
        toast.classList.remove("show");
      }, 3000);
    });

    </script>
    <style>
    .toast-message {
      position: fixed;
      background-color: #007bff;
      color: white;
      padding: 10px 16px;
      border-radius: 6px;
      font-size: 14px;
      box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
      opacity: 0;
      transform: translateY(-10px);
      transition: opacity 0.4s ease, transform 0.4s ease;
      z-index: 9999;
      pointer-events: none;
    }

    /* Visible state */
    .toast-message.show {
      opacity: 1;
      transform: translateY(0);
    }

   .toast-arrow {
  position: absolute;
  top: -8px; 
  left: 20px; 
  width: 0;
  height: 0;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 8px solid #007bff; 
}

#overlayBlocker {
  position:fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255,255,255,0.3);
  z-index: 99999;
  display: none;
  pointer-events: all;
}


.alert {
  position: fixed;
  top: 10px;
   right: -100%;
  background-color: #ffffff; /* white background */
  color: #333;
  padding: 16px 24px;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
  font-size: 16px;
  opacity: 0;
  transition: all 0.7s ease;
  z-index: 1000;
  border-left: 5px solid #007bff;

  /* Height control */
  max-width: 400px;
  width: fit-content;
  max-height: 60px;
  overflow: hidden;

  /* Center vertically if multi-line */
  display: flex;
  align-items: center;
}


.alert.show {
  right: 30px;
  opacity: 1;
}

.alert.hide {
  right: -100%;
  opacity: 0;
}

 .search-container {
  position: relative; /* anchors absolute children */
  width: fit-content; /* or 100% if needed */
      transition: all 0.3s ease-in-out;

}

#searchResult {
  background: rgb(33,37,41);
  border-radius: 5px 5px 5px 5px;
  color: white;
  list-style: none;
  width: 36.5%; /* relative to .search-container */
  position: absolute;
  top: 101%; /* places it directly below search bar */
  left: 3%;
  display: none; /* hidden initially for slideDown */
  z-index: 999;
  max-height: 400px; /* optional: limit height with scroll */
  overflow-y: auto;
    

}


.search-item {
  display: flex;
  align-items: center;
  padding: 10px;
  border-bottom: 1px solid rgba(255,255,255,0.1);
  cursor: pointer;
  transition: background 0.2s;
}

.search-item:hover {
  background: rgba(255, 255, 255, 0.05);
}

.search-item img {
  width: 50px;
  height: 50px;
  border-radius: 4px;
  object-fit: cover;
  margin-right: 10px;
}

.search-item .info h5 {
  margin: 0;
  font-size: 16px;
}

.search-item .info small {
  color: #aaa;
}

/* ✅ Responsive adjustments */
@media (max-width: 970px) {
  #searchResult {
    width: 50%; /* Make search result wider on small screens */
    left: 3%;
  
  }

  

  .boom {
    margin-left: 74px;
  }
}


.scroll{
    overflow:hidden;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  font-size:15px;
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  left:90px;
  top: -44px;
  min-width: 170px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.enddropdown-content {
    font-size:15px;
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  left:-25px;
  top: -44px;
  min-width: 170px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.enddropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}












.dropdown2 {
  position: absolute;
  border-radius:29px;
  display: inline-block;
  
 
}

.dropdown-content2 {
  font-size:14px;
  display: none;
  position: absolute;
  background-color: #f1f1f1;
border-radius:20px;
  left:240px;
  top: -265px;
  min-width: 185px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 10;
}


.dropdown-content2 a {
   
  color: black;
  padding: 12px 12px;
  text-decoration: none;
  display: block;
}
.dropdown-content2 a i {
   
   margin-left:4px;
   margin-right:4px;
 }

.dropdown2 a:hover {background-color: #ddd;}

.show2 {display: block;}


.dropdown3 {
  position: absolute;
  border-radius:29px;
  display: inline-block;
  
 
}

.dropdown-content3 {
  font-size:14px;
  display: none;
  position: absolute;
  background-color: #f1f1f1;
border-radius:20px;
  left:780px;
  top: -265px;
  min-width: 185px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 10;
}


.dropdown-content3 a {
   
  color: black;
  padding: 12px 12px;
  text-decoration: none;
  display: block;
}
.dropdown-content3 a i {
   
   margin-left:4px;
   margin-right:4px;
 }

.dropdown3 a:hover {background-color: #ddd;}

.show3 {display: block;}


.hello{
    margin-top: -33px;
}
.bottom{
    position:sticky;
    height:55px;
    background: rgb(33,37,41);
    bottom:0;
    display:flex;
    z-index: 50000;
    margin-left:250px;
    transition: all 0.3s ease-in-out;
    display:flex;
   
}

.bottom::before{
    content: "";
  position: absolute;
  background-color: transparent;
  box-shadow: 0 20px 0 0 rgb(33,37,41);
  bottom: 55px;
  height: 55px;
  width: 20px;
  border-bottom-left-radius: 22px;
}
@media (max-width: 768px) {
    .bottom{
       
        margin-left: 60px;
    }
    .bottom::before{
        content: "";
  position: absolute;
  background-color: transparent;
  box-shadow: 0 25px 0 0 rgb(33,37,41);
  bottom: 55px;
  height: 55px;
  width: 20px;
  border-bottom-left-radius: 22px;
    }
}
#bar {
    margin-left: 15px;
    margin-top: 15px;
    -webkit-appearance: none;
    width: 40%;
    height: 4px;
    background: linear-gradient(to right, white 0%, white 0%, rgb(107, 98, 102) 0%);
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.1s ease-in-out;
}
#bar::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    background: white;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    box-shadow: 0 5px 5px;
    position: relative;
    z-index: 2;
}

.icons{
    display: flex;
    margin-top:17px;
    margin-left:-300px;
    justify-content:center;
    transition: all 0.3s ease-in-out;

    color:rgb(187, 187, 187);
}
.icons div {
font-size:25px;
cursor: pointer; 
}
#ctrl{
   margin-left:12px;
   margin-right:12px;
}
#bom{
   z-index: 50000;
    margin-left:100px;
    
    transition: all 0.3s ease-in-out;

}
#shuru{
    transition: all 0.3s ease-in-out;
    position:relative;
    color:white;
    margin-left:170px;
    margin-top:7px;
    font-size:12px;
}
#end{
    position:relative;
    color:white;
    margin-top:7px;
    margin-left:14px;
    font-size:12px;
}
#songbtn{
    transition: all 0.3s ease-in-out;
    position:absolute;
    margin-left:350px;
}
@media (max-width: 1310px) {
    #songbtn{
        
        margin-left:300px;
    }
    
}
@media (max-width: 1210px) {
    #songbtn{
        
        margin-left:260px;
    }
    
}
@media (max-width: 1150px) {
    #songbtn{
        
        margin-left:200px;
    }
    
}
@media (max-width: 1040px) {
    #songbtn{
        
        margin-left:170px;
    }
    
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
@media (max-width: 1200px) {
   
    .icons{
        margin-left:-220px;
    }
}

@media (max-width: 760px) {
    
    .icons{
        margin-left:-167px;
    }
}
@media (max-width: 915px) {
    #shuru{
        margin-left:100px;
    }
    #rnsong{
       
        margin-left: -6px;
    }
   
    .icons{
        margin-left:-177px;
    }
    #bom{
        margin-left:40px;
    }
   
}















        #popup {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            width: calc(100% - 250px); /* Adjusted width to take up 80% of screen */
            height: 92%;
            background-color: white;
            z-index: 9999;
            justify-content: center;
            align-items: flex-start;
            transform: translateX(100%);
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out,  width 0.3s ease-in-out;
          
            opacity: 0;
            visibility: hidden;
        }
        #popup.show {
            display: block;
            transform: translateX(0);
            opacity: 1;
            visibility: visible;
        }
        #popupContent {
            background: white;
            padding: 30px;
            border-radius: 15px;
            position: relative;
            width: 100%;
            height: auto;
            overflow-y: auto;
            max-height: 100%;
            box-sizing: border-box;
            z-index: 10000;
        }
        #closePopup {
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
            font-size: 20px;
            padding: 20px;
            color: #666;
            background: #f8f9fa;
            border: 2px solid #e1e8ed;
            border-radius: 50%;
            width: 29px;
            height: 29px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        #closePopup:hover {
            color: #383a3b;
            
            border-color: #777879;
            background: white;
        }
        .page-header {
            display: flex;
            justify-content: center;
            margin: 0 0 30px 0;
            padding: 0;
        }
        .page-header h2 {
            margin: 0;
            padding: 0;
            font-size: 28px;
            color: #2c3e50;
            font-weight: 600;
        }
       .search-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            width: 100%;
            max-width: 100%;
        }
        .search-bar {
            flex: 1;
            padding: 10px 15px;
            border: 2px solid #e1e8ed;
            border-radius: 30px;
            font-size: 14px;
            transition: all 0.3s;
            min-width: 200px;
            width: 100%;
            box-sizing: border-box;
        }
        .search-bar:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }
        .create-button {
            padding: 8px 20px;
            background-color: white;
            color: #333;
            border: 2px solid #333;
            border-radius: 30px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
            min-width: 120px;
            height: 40px;
            width: auto;
            max-width: 100%;
        }
        .create-button:hover {
            background-color: #333;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Responsive adjustments */
        @media (max-width: 1200px) {
            
            #popupContent {
                padding: 25px;
            }
            .search-bar {
                min-width: 180px;
            }
            .create-button {
                padding: 8px 15px;
                min-width: 100px;
            }
        }

        @media (max-width: 1024px) {
           
            #popupContent {
                padding: 20px;
            }
            .search-container {
                gap: 8px;
            }
            .search-bar {
                min-width: 160px;
                font-size: 13px;
            }
            .create-button {
                padding: 8px 12px;
                min-width: 90px;
                font-size: 13px;
            }
        }

        @media (max-width: 768px) {
            
           
            #popupContent {
                padding: 15px;
            }
            .search-container {
                flex-direction: column;
                gap: 12px;
                width: 100%;
            }
            .search-bar {
                min-width: 100%;
                font-size: 14px;
                padding: 12px 15px;
                width: 100%;
            }
            .create-button {
                width: 100%;
                min-width: auto;
                padding: 12px;
                font-size: 14px;
                height: auto;
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            
            #popupContent {
                padding: 12px;
            }
            .search-bar {
                padding: 10px 12px;
                font-size: 13px;
                width: 100%;
                box-sizing: border-box;
            }
            .create-button {
                padding: 10px;
                font-size: 13px;
                width: 100%;
                box-sizing: border-box;
            }
        }

        @media (max-width: 360px) {
            .search-bar {
                font-size: 12px;
                padding: 9px 10px;
                width: 100%;
            }
            .create-button {
                font-size: 12px;
                padding: 9px;
                width: 100%;
            }
        }
        .song-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 25px;
            margin-top: 30px;
            padding: 0 20px;
        }
        .song-space {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 15px;
            transition: all 0.3s;
            cursor: pointer;
            border: 1px solid #e1e8ed;
        }
        .song-space:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .song-space2 {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 15px;
            transition: all 0.3s;
            cursor: pointer;
            border: 1px solid #e1e8ed;
        }
        .song-space2:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .song-image {
            width: 100%;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
            margin-bottom: 15px;
            background-color: #f0f0f0;
        }
        .song-info {
            font-size: 14px;
            color: #333;
        }
        .song-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: #2c3e50;
        }
        .song-artist {
            color: #666;
            font-size: 13px;
            margin-bottom: 8px;
        }
        .song-duration {
            color: #666;
            font-size: 12px;
            margin-top: 5px;
        }
        .create-album-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            z-index: 100000;
        }
        .create-album-popup.show {
            display: block;
        }
        .create-album-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e1e8ed;
        }
        .create-album-header h3 {
            margin: 0;
            font-size: 18px;
            color: #2c3e50;
        }
        .create-album-close {
            cursor: pointer;
            font-size: 20px;
            color: #666;
            padding: 5px;
        }
        .create-album-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .create-album-input {
            padding: 10px 15px;
            border: 2px solid #e1e8ed;
            border-radius: 5px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .create-album-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }
        .create-album-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }
        .create-album-cancel {
            padding: 8px 20px;
            background: white;
            color: #333;
            border: 2px solid #e1e8ed;
            border-radius: 30px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
            min-width: 120px;
        }
        .create-album-cancel:hover {
            border-color: #333;
            color: #007bff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .create-album-save {
            padding: 8px 20px;
            background-color: white;
            color: #333;
            border: 2px solid #333;
            border-radius: 30px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
            min-width: 120px;
        }
        .create-album-save:hover {
            background-color: #333;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .create-album-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 100000;
        }
        .create-album-overlay.show {
            display: block;
        }
        .create-album-image {
            position: relative;
            width: 100%;
            height: 200px;
            border: 2px dashed #e1e8ed;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 20px;
            background: #f8f9fa;
        }
        .create-album-image:hover {
            border-color: #007bff;
            background: #f0f2f5;
        }
        .create-album-image input[type="file"] {
            display: none;
        }
        .create-album-image-label {
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        .create-album-image-icon {
            font-size: 30px;
            color: #666;
            margin-bottom: 10px;
        }
        .create-album-image-preview {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 5px;
            object-fit: cover;
            display: none;
        }
        .create-album-image.has-image {
            border-style: solid;
            background: none;
        }
        .create-album-image.has-image .create-album-image-label {
            display: none;
        }
        .create-album-image.has-image .create-album-image-icon {
            display: none;
        }
        .create-album-image.has-image .create-album-image-preview {
            display: block;
        }
        .create-album-image.has-image:hover {
            border-color: #e1e8ed;
        }
        .create-album-image-remove {
            position: absolute;
            top: 10px;
            right: 10px;
            background: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #666;
            transition: all 0.3s;
        }
        .create-album-image-remove:hover {
            background: #f8f9fa;
            color: #007bff;
        }

        
        /* Responsive adjustments */
        @media (max-width: 1200px) {
          
            #popupContent {
                padding: 25px;
            }
        }

        @media (max-width: 1024px) {
          
            #popupContent {
                padding: 20px;
            }
            .create-album-image-upload {
                height: 180px;
            }
        }

        @media (max-width: 768px) {
            #popup {
                width: calc(100% - 60px);
            }
            #popupContent {
                padding: 15px;
            }
            .create-album-image-upload {
                height: 150px;
            }
            .create-album-actions {
                flex-direction: column;
                gap: 10px;
            }
            .create-album-cancel,
            .create-album-save {
                width: 100%;
                min-width: auto;
            }
        }

        @media (max-width: 480px) {
           
            #popupContent {
                padding: 12px;
            }
            .create-album-input {
                padding: 8px;
            }
            .create-album-image-upload {
                height: 120px;
            }
        }

#addsong{
    width:40%;
    display: flex;
            justify-content: center;
            margin: auto;
            padding: 0;
            border-radius:25px;
            background-color:rgb(250, 250, 254);
}












.modal {
      display: none;
      position: fixed;
      z-index: 1000000;
      left: 0; top: 0; width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.7);
      justify-content: center;
      align-items: center;
    }
    .modal.active {
      display: flex;
    }
    .modal-content {
      background: #fff;
      padding: 40px 32px 32px 32px;
      border-radius: 14px;
      width: 350px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.2);
      text-align: center;
      position: relative;
      animation: popIn 0.2s cubic-bezier(0.4,0.8,0.6,1.2);
    }
    @keyframes popIn {
      0% { transform: scale(0.95); opacity: 0.6;}
      100% { transform: scale(1); opacity: 1;}
    }
    .modal-content .close {
      position: absolute;
      right: 16px; top: 16px;
      font-size: 1.5rem;
      color: #191414;
      cursor: pointer;
      background: none;
      border: none;
    }
    .modal-content h2 {
      color: #191414;
      margin-bottom: 24px;
      font-weight: 700;
    }
    .modal-content form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }
    .modal-content input[type="text"], 
    .modal-content input[type="email"],
    .modal-content input[type="password"] {
      padding: 12px;
      border-radius: 5px;
      border: 1px solid #c3c3c3;
      background: #f7f7f7;
      color: #191414;
      font-size: 1rem;
      outline: none;
      transition: border .2s;
    }
    .modal-content input[type="text"]:focus, 
    .modal-content input[type="email"]:focus,
    .modal-content input[type="password"]:focus {
      border: 1.5px solid #1db954;
      background: #fff;
    }
    .modal-content button[type="submit"] {
      background: #fff;
      color: #191414;
      border: 2px solid #191414;
      padding: 12px;
      border-radius: 999px;
      font-size: 1rem;
      cursor: pointer;
      font-weight: bold;
      margin-top: 10px;
      transition: background 0.2s, color 0.2s;
    }
    .modal-content button[type="submit"]:hover {
      background: #191414;
      color: #fff;
      border: 2px solid #191414;
    }
    .modal-content .forgot, .modal-content .signup-link, .modal-content .back-link {
      color: #191414;
      font-size: 0.98rem;
      text-decoration: none;
      margin-top: 8px;
      display: block;
      transition: border-color 0.2s;
      cursor: pointer;
      border-bottom: 2px solid transparent;
      padding-bottom: 2px;
    }
    .modal-content .forgot:hover, .modal-content .signup-link:hover, .modal-content .back-link:hover {
      color: #191414;
      border-bottom: 2px solid transparent;
      background: transparent;
      text-decoration: none;
    }
    .modal-content .divider {
      margin: 18px 0 0 0;
      border: none;
      border-top: 1px solid #ececec;
    }
    .modal-content label {
      text-align: left;
      color: #191414;
      font-size: 0.97rem;
      margin-bottom: 2px;
      font-weight: 500;
    }
    .second-bottom {
    position: fixed;
    left: 250px; /* same as sidebar width */
    right: 0;
    height: 55px;
    background: rgb(33,37,41);
    color: #fff;
    display: flex;
    align-items: center;
    z-index: 40; /* higher than .bottom if needed */
    bottom: 0; /* sits right above the .bottom bar (which is 55px high) */
   
    font-weight: bold;
    font-size: 1rem;
    box-shadow: 0 -1px 6px rgba(0,0,0,0.06);
    transition: all 0.3s ease-in-out;
    
    
    }
    .second-bottom::before{
    content: "";
  position: absolute;
  background-color: transparent;
  box-shadow: 0 20px 0 0 rgb(33,37,41);
  bottom: 55px;
  height: 55px;
  width: 20px;
  border-bottom-left-radius: 22px;
}


@media (max-width: 768px) {
    .second-bottom {
        left: 60px;
    }
}
.loader {
  display: flex;
  align-items: flex-end;
  justify-content: center;
  align-items:center;
  height: 40px;
  width: 80px;
  background: none;
  border: none;
  margin: 0 auto;
  gap: 2px;
}

.loader .stroke {
  display: block;
  width: 6px;
  height: 100%;
  background: rgb(145, 146, 145) ;
  border-radius: 50px;
  animation: stickDotWave 1.2s infinite cubic-bezier(0.4,0,0.2,1);
}

.stroke:nth-child(1) { animation-delay: 0s; }
.stroke:nth-child(2) { animation-delay: 0.3s; }
.stroke:nth-child(3) { animation-delay: 0.6s; }
.stroke:nth-child(4) { animation-delay: 0.9s; }
.stroke:nth-child(5) { animation-delay: 0.6s; }
.stroke:nth-child(6) { animation-delay: 0.3s; }
.stroke:nth-child(7) { animation-delay: 0s; }


@keyframes stickDotWave {
  50%{
    height: 20%;
  
  }
  100% {
    height: 100%;
  }
  

}








.skeleton-wrapper2 {
    margin-top:-25px;
    margin-left:10px;
 
}
.skeleton-header3 {
  margin-left: -12px;
  height: 40px;
  width: 500px;
  border-radius: 4px;
  background: #e0e0e0;
  background: linear-gradient(
    100deg,
    #e0e0e0 30%,
    #f5f5f5 50%,
    #e0e0e0 70%
  );
  background-size: 800px 100%; /* broader gradient for smooth travel */
  animation: shineHeader3 1.6s infinite ease-in-out;
}

@keyframes shineHeader3 {
  0% {
    background-position: -500px 0;
  }
  100% {
    background-position: 500px 0;
  }
}



.skeleton-card4 {
  width: 280px;
  height: 280px;
  border-radius: 8px;
  background: #e0e0e0;
  background: linear-gradient(
    100deg,
    #e0e0e0 30%,
    #f5f5f5 50%,
    #e0e0e0 70%
  );
  background-size: 800px 100%; /* larger for smooth travel */
  animation: shineCard2 1.6s infinite ease-in-out;
}

@keyframes shineCard2 {
  0% {
    background-position: -500px 0;
  }
  100% {
    background-position: 500px 0;
  }
}



.skeleton-card3 {
  margin-left: px;
  width: 1025px;
  height: 400px;
  border-radius: 8px;
  background: linear-gradient(90deg, #e0e0e0 25%, #f5f5f5 50%, #e0e0e0 75%);
  background-size: 1500px 100%; /* wider for big div */
  animation: shineWide 2s infinite linear;
}
@keyframes shineWide {
  0% {
    background-position: -500px 0;
  }
  100% {
    background-position: 1500px 0;
  }
}

.skeleton-grid2 {
    margin-left:;
  display: grid;
  grid-template-columns: repeat(4, 250px); 
  gap: 20px; 
 
  padding: 30px;
  box-sizing: border-box;
}
.skeleton-header,
.skeleton-header3,
.skeleton-header2,
.skeleton-card,
.skeleton-card2 {
  background: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%);
  background-size: 400% 100%;
}

.skeleton-wrapper {
  padding: 20px;
}

.skeleton-header {
  height: 40px;
  width: 200px;
  background: #e0e0e0;
  margin-bottom: 15px;
  border-radius: 4px;
  animation: shine 1s infinite linear;
}
.skeleton-header2 {
    margin-left:-10px;
  height: 40px;
  width: 300px;
  background: #e0e0e0;
  margin-bottom: 15px;
  border-radius: 4px;
  animation: shine 1s infinite linear;
}

.skeleton-grid {
    margin-left:-40px;
  display: grid;
  grid-template-columns: repeat(4, 250px); 
  gap: 20px; 
 
  padding: 30px;
  box-sizing: border-box;
}

.skeleton-card {
  width: 240px;
  height: 240px;
  background: #e0e0e0;
  border-radius: 8px;
  animation: shine 1s infinite linear;
}



.skeleton-grid2 {
    margin-left:-17px;
  display: grid;
  grid-template-columns: repeat(6, 1fr); 
  gap: 30px; 
  padding: 18px;
  box-sizing: border-box;
}

.skeleton-card2 {
  width: 109%; 
  height: 200px;
  background: #e0e0e0;
  border-radius: 8px;
  animation: shine 1s infinite linear;
}


@keyframes shine {
  0% {
    background-position: -200px 0;
  }
  100% {
    background-position: 200px 0;
  }
}

.skeleton-header,
.skeleton-header2,
.skeleton-card,
.skeleton-card2 {
  background: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%);
  background-size: 400% 100%;
}

/* Medium screens: 2 cards per row */
@media (min-width: 500px) {
  .skeleton-grid2 {
    grid-template-columns: repeat(2, 1fr);
  }
}

/* Tablets: 3 cards per row */
@media (min-width: 900px) {
  .skeleton-grid2 {
    grid-template-columns: repeat(3, 1fr);
  }
}

/* Desktops: 4 cards per row */
@media (min-width: 1200px) {
  .skeleton-grid2 {
    grid-template-columns: repeat(6, 1fr);
  }
}


@media (min-width: 500px) {
  .skeleton-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

/* 3 columns for large tablets or small desktops */
@media (min-width: 900px) {
  .skeleton-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

/* 4 columns for large desktops */
@media (min-width: 1200px) {
  .skeleton-grid {
    grid-template-columns: repeat(4, 1fr);
  }
}

.loader2 {
  display: flex;
  align-items: flex-end;
  justify-content: center;
  align-items:center;
  height: 40px;
  width: 80px;
  background: none;
  border: none;
  margin: 230px auto;
  gap: 2px;
}

.loader2 .stroke {
  display: block;
  width: 6px;
  height: 100%;
  background: rgb(145, 146, 145) ;
  border-radius: 50px;
  animation: stickDotWave 1.2s infinite cubic-bezier(0.4,0,0.2,1);
}

.stroke:nth-child(1) { animation-delay: 0s; }
.stroke:nth-child(2) { animation-delay: 0.3s; }
.stroke:nth-child(3) { animation-delay: 0.6s; }
.stroke:nth-child(4) { animation-delay: 0.9s; }
.stroke:nth-child(5) { animation-delay: 0.6s; }
.stroke:nth-child(6) { animation-delay: 0.3s; }
.stroke:nth-child(7) { animation-delay: 0s; }


@keyframes stickDotWave {
  50%{
    height: 20%;
  
  }
  100% {
    height: 100%;
  }
  

}
#playlist,#browse,#subindex,#liked,#categories{
cursor:pointer;
}
.page-loader{
     margin-left: 250px;
    margin-top: 60px;
    padding: 1.5rem;
    min-height: calc(100vh - 60px);
    background-color: #f8f9fa;
    transition: margin-left 0.3s ease-in-out;
}

.category-container {
    font-family: "Times New Roman", Times, serif;
    display: flex;
    gap: 20px; /* space between items */
    flex-wrap: wrap; /* optional: wrap if screen is too small */
}

.category-container .category-showcase{
    text-decoration: none;
    color: #333;
    font-size: 17px;
       line-height: 24px;       /* enough space for larger font */
    min-height: 24px; 
    transition: transform 0.2s ease, font-size 0.2s ease;
}

.category-container .category-showcase:hover {
    text-decoration: underline; 
    cursor: pointer;
    animation: rise 1s ease-in-out;
    font-size: 19px;
    color: #000;
}
</style>

<body style="background-color: #f8f9fa;" class="noscroll">
  <script>
(function() {
  var html = '';
  var path = window.location.search;

  if (path.includes('browse')) {
    html = `
      <div class="page-loader" id="pageLoader">
        <div class="skeleton-wrapper">
          <div class="skeleton-header2"></div>
          <div class="skeleton-grid browse-style">
            ${'<div class="skeleton-card"></div>'.repeat(8)}
          </div>
        </div>
      </div>
    `;
  } else if (path.includes('liked')) {
    html = `
      <div class="page-loader" id="pageLoader">
        <div class="skeleton-wrapper">
          <div class="skeleton-header2"></div>
          <div class="skeleton-grid browse-style">
            ${'<div class="skeleton-card"></div>'.repeat(8)}
          </div>
        </div>
      </div>
    `;
  } else if (path.includes('playlist')) {
    html = `
      <div class="page-loader" id="pageLoader">
        <div class="skeleton-wrapper">
          <div class="skeleton-header2"></div>
          <div class="skeleton-grid browse-style">
            ${'<div class="skeleton-card"></div>'.repeat(8)}
          </div>
        </div>
      </div>
    `;
  } else if (path.includes('play')) {
    html = `
      <div class="page-loader" id="pageLoader">
        <div class="skeleton-wrapper2">
          <div class="skeleton-grid2">
            <div class="skeleton-card4"></div>
            <div class="skeleton-header3"></div>
          </div>
          <div class="skeleton-card3"></div>
        </div>
      </div>
    `;
  } else if (path.includes('myplay')) {
    html = `
      <div class="page-loader" id="pageLoader">
        <div class="skeleton-wrapper2">
          <div class="skeleton-grid2">
            <div class="skeleton-card4"></div>
            <div class="skeleton-header3"></div>
          </div>
          <div class="skeleton-card3"></div>
        </div>
      </div>
    `;
  } else {
    // index / subindex fallback
    html = `
      <div class="page-loader" id="pageLoader">
        <div class="skeleton-header"></div>
        <div class="skeleton-grid2">
          ${'<div class="skeleton-card2"></div>'.repeat(12)}
        </div>
      </div>
    `;
  }

  document.write(html); // inject before first paint
})();
</script>

<div class="second-bottom" id="second-bottom">
<div class="loader">
  <span class="stroke"></span>
  <span class="stroke"></span>
  <span class="stroke"></span>
  <span class="stroke"></span>
  <span class="stroke"></span>
  <span class="stroke"></span>
  <span class="stroke"></span>

</div>
    </div>
   

    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white">
        <div class="sidebar-heading">
            <h4 class="mb-0">YMUSIC</h4>
        </div><br>
        
        <!-- Main Navigation -->
        <div class="sidebar-section">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" id="subindex" data-title="Discover">
                        <i class="bi bi-compass me-2"></i>
                        <span>Discover</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" id="browse" data-title="Browse">
                        <i class="bi bi-collection me-2"></i>
                        <span>Browse</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" id="categories" data-title="category">
                        <i class="bi bi-images me-2"></i>
                        <span>Categories</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- My Collection Section -->
        <div class="sidebar-section mt-0">
            <h6 class="sidebar-heading px-3 mt-0 mb-1 small">My Collection</h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" id="liked" data-title="Likes">
                        <i class="bi bi-heart me-2"></i>
                        <span>Likes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" id="playlist" data-title="Playlist">
                        <i class="bi bi-music-note-list me-2"></i>
                        <span>Playlist</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- My Stuff Section -->
        <div class="sidebar-section mt-0">
            <h6 class="sidebar-heading px-3 mt-0 mb-1  small">Other</h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-title="Settings">
                        <i class="bi bi-gear me-2"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div class="d-flex w-100 align-items-center">
                <div class="d-flex me-auto search-form">
                    <i class="bi bi-search search-icon"></i>
                    <input id="searchFor" class="form-control bi-search" type="search" placeholder="Search albums" aria-label="Search">
                    
                </div>
                <div id="searchResult"></div>
                <div class="none">
               <?php
echo isset($_COOKIE["login"]) 
    ? '<a id="removeMe" href="logout.php"><button class="btn log">Logout</button></a>
       <script>
         document.addEventListener("DOMContentLoaded", function () {
           var el = document.getElementById("loginModal");
           if (el) el.remove();
         });
       </script>'
    : '<button id="login" class="btn log me-2">Login</button>
     <div id="loginToast" class="toast-message">
    🔐 Login to access more features
    <div class="toast-arrow"></div>
  </div>
       <button id="signup" class="btn btn-dark">Sign Up</button>
       <script id="disableScrollScript">
                function disableScroll() {
                    $("body").addClass("noscroll2");
                }
                    function enableScroll() {
                    $("body").removeClass("noscroll2");
                }
       </script>
';
?>

                   
                </div>
            </div>
        </div>
    </nav>

    <div class="main-content">
        
      
        
       
    </div>


    <div id="popup">
        
        <div id="popupContent">
            <span id="closePopup">←</span>
            <div class="page-header">
                <h2>My Space</h2>
            </div>
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search songs, artists, or albums...">
                <button class="create-button">Create New Album</button>
            </div>
            <div class="container" id="addsong">
                 <div class="list-group-item list-group-item-action align-items-center" style="position:relative;">
                        
                            <i  class="bi bi-music-note me-3"></i>
                            <div>
                           
                                <h5  class="mb-1" id="addsongname"></h5>
                           
                                <?php

                   
  
?>

                                <small class="text-muted" id="addsongalb" ></small>
                            </div>
                           
                                </div>

            </div>
           <div id="song-grid" class="song-grid">
    <?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "mp3");
    if (isset($_GET['refresh'])) {
        renderSongGrid($conn);
    } else {
        renderSongGrid($conn);
    }
    ?>
    
</div> 

        </div> 
       
   </div>
    
    <!-- Create Album Popup -->
    <div class="create-album-overlay"></div>
    <div class="create-album-popup">
        <div class="create-album-header">
            <h3>Create New Album</h3>
            <span id="closealbadd" class="create-album-close">×</span>
        </div>
        <form >
           <div action="albcreate.php" method="post" class="create-album-form">
            <input type="text" name="title" id="albname" class="create-album-input" placeholder="Album Name" required>
            <input type="text" name="description" id="albdes" class="create-album-input" placeholder="Description" required>
            <div class="create-album-actions">
                <button type="button" class="create-album-cancel">Cancel</button>
                <button type="button" class="create-album-save">Save</button>
            </div>
            </div>
        </form>
    </div>

    
   
           
 <!-- Footer -->
  <div class="nah">
    <footer class="footer bg-grey text-white py-5">
        <div class="container">
            <div class="row">
                <!-- About Us Column -->
                <div class="col-md-4 mb-4">
                    <h5 class="footer-heading mb-3">About Us</h5>
                    <p class="text-white-50">We are a modern music platform dedicated to bringing you the best music experience. Discover, stream, and share your favorite music with friends and family.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="col-md-4 mb-4">
                    <h5 class="footer-heading mb-3">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Services</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Contact</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>

                <!-- Subscribe Column -->
                <div class="col-md-4 mb-4">
                    <h5 class="footer-heading mb-3">Subscribe Us</h5>
                    <p class="text-white-50">Subscribe to our newsletter for updates and exclusive offers!</p>
                    <div class="subscribe-form">
                        <form class="mt-3">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control bg-dark text-white border-secondary" 
                                       placeholder="Enter your email" aria-label="Enter your email">
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr class="border-secondary mt-4">
            
            <!-- Copyright Section -->
            <div class="row mt-3">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white-50">&copy; 2025 Music Dashboard. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white text-decoration-none me-3">Privacy Policy</a>
                    <a href="#" class="text-white text-decoration-none">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
 

    </div>
  
 <div class="bottom" id="bottom">
 <i id="bom"></i>
 <div id="rnsong" ></div>
 <div id="rnalb"  ></div>
 <div id="shuru" > 00:00</div>
    <input rel="" type="range"  id="bar" value="0">
    <div id="end" > 00:00</div>
    <div class="icons">
<div><i class="bi bi-skip-start-fill" onclick="prevSong()"></i></div>
<div ><i onclick="bhai()" rel="" class="bi bi-play-fill" id="ctrl"></i></div>
<div><i class="bi bi-skip-end-fill" onclick="nextSong()"></i></div>
    </div>
    
</div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


   
        
<div class="modal" id="loginModal">
    <div class="modal-content" id="modalContent">
      <button class="close" onclick="closeModal()">&times;</button>
      <h2 id="modalTitle">Log in to Ymusic</h2>
      <form method="POST" action="login.php" id="loginForm">
        <input type="email" name="email" placeholder="Email address or username" required>
        <input type="password" name="pass" placeholder="Password" required>
        <button type="submit">Log In</button>
        <a href="#" class="forgot">Forgot your password?</a>
        <a class="signup-link" onclick="showSignup()">Don't have an account? Sign up</a>
      </form>
      <form method="POST" action="signup.php" id="signupForm" style="display:none;">
        <input type="email" name="email" placeholder="Email address" required>
        <input type="password" name="pass" placeholder="Create password" required>
        <button type="submit">Sign Up</button>
        <a class="back-link" onclick="showLogin()">Back to Login</a>
      </form>
    </div>
  </div>
  </div>
  <script>
   
    function closeModal() {
          
         $("body").removeClass("noscroll");
         enableScroll();
      document.getElementById('loginModal').classList.remove('active');
      const popup = document.getElementById('popup');
      popup.classList.remove('show');
      showLogin(); // Reset to login form when closing
    }
    function showSignup() {
      document.getElementById('loginForm').style.display = 'none';
      document.getElementById('signupForm').style.display = 'flex';
      document.getElementById('modalTitle').textContent = 'Sign up for Ymusic';
    }
    function showLogin() {
      document.getElementById('loginForm').style.display = 'flex';
      document.getElementById('signupForm').style.display = 'none';
      document.getElementById('modalTitle').textContent = 'Log in to Ymusic';
    }
    // Close modal on outside click
    window.onclick = function(event) {
      var modal = document.getElementById('loginModal');
      if (event.target == modal) {
        closeModal();
      }
    }
    // Close modal on Escape key
    document.addEventListener('keydown', function(event) {
      if (event.key === "Escape") {
        closeModal();
      }
    });
  </script>
       





  
   
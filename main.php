
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
            <div id= "song-grid" class="song-grid">

                <?php
                if (isset($_GET['refresh'])){

             
                 $conn = mysqli_connect("127.0.0.1","root","","mp3");
                 if(isset($_COOKIE["login"])){
                    $email=$_COOKIE["login"];
            $rst = mysqli_query($conn,"select * from clients where email='$email'");
if($rt=mysqli_fetch_array($rst)){
  $code=$rt["code"];
}
  $rsn = mysqli_query($conn,"select * from clientalb where clcode='$code'");
  $x=0;
  while($rn=mysqli_fetch_array($rsn)){
    $ccode=$rn["code"];
    
?>
                <div class="song-space" id=<?=$ccode?>>
                    <img src="song3.jpg" alt="Song 1" class="song-image">
                    <div class="song-info">
                        <div class="song-title"><?=$rn["title"]?></div>

                        <div class="song-duration">3:45</div>
                    </div>
                </div>
                <?php
                $x++;
  }
}
                 
                 else{
                   
                 }
}
else{
    $conn = mysqli_connect("127.0.0.1","root","","mp3");
    if(isset($_COOKIE["login"])){
       $email=$_COOKIE["login"];
$rst = mysqli_query($conn,"select * from clients where email='$email'");
if($rt=mysqli_fetch_array($rst)){
$code=$rt["code"];
}
$rsn = mysqli_query($conn,"select * from clientalb where clcode='$code'");
$x=0;
while($rn=mysqli_fetch_array($rsn)){
$ccode=$rn["code"];

?>
   <div class="song-space" id=<?=$ccode?>>
       <img src="song3.jpg" alt="Song 1" class="song-image">
       <div class="song-info">
           <div class="song-title"><?=$rn["title"]?></div>

           <div class="song-duration">3:45</div>
       </div>
   </div>
   <?php
   $x++;
}
}
    
    else{
      
    }

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

    
    <div class="main-content">
    <div class="container-fluid">
        <!-- Featured Songs Grid -->
        <div class="row content-row">
            <div class="col-12" style="margin-bottom:-0px;">
                <h2 class="section-title" style="margin-top:-7px;">Featured Albums</h2>
            </div>
            <!-- Song Card 1 -->
            <?php
$i=0;
$conn = mysqli_connect("127.0.0.1","root","","mp3");

$rs = mysqli_query($conn,"select * from album order by RAND()");

while($r=mysqli_fetch_array($rs)){
   $code=$r["code"];
   $zcode=$r["ccode"];
  

   if($i==12){
    exit;
   }
 else{
?>
            <div class="col-lg-2 col-md-4 col-sm-6 mb-0" id="cardadjust">
                <div class="song-card ">
                        <div class="song-card-img">
                            <img src="album/<?=$code?>.jpg" alt="Song cover">
                            <div class="play-overlay">
                                <button class="play-btn">
                                <a href="play.php?id=<?=$r["code"]?>"> <i class="bi bi-play-fill" ></i></a>
                                </button>
                            </div>
                        </div>
                        <div class="song-card-content">
                            <h3 class="song-card-title"><?=$r["title"]?></h3>
                            
                            <div class="song-card-meta">
                            <?php

$rsn = mysqli_query($conn,"select * from category where code='$zcode'");
if($rn=mysqli_fetch_array($rsn)){

?>
                            <p class="song-card-artist"><?=$rn["category"]?></p>
                                <div class="song-card-actions ">
                                    <button class="action-btn"><i class="bi bi-heart"></i></button>
                                    <button class="action-btn"><i onclick="myFunction(<?=$i?>)" class="bi bi-plus yoo <?=$i?>"></i></button>
                                  
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php
                    if($i==5 || $i==11){
                        ?>
                        <div class="dropdown">
                    <div id="myDropdown<?=$i?>" class="enddropdown-content">
    <a href="#home">Add to Your Space</a>
    <a href="#about">About</a>
    <a href="#contact">Open Playlist</a>
  </div>
  </div>
  <?php
                    }
                    else{
                        ?>
                    <div class="dropdown">
                    <div id="myDropdown<?=$i?>" class="dropdown-content">
    <a href="#home">Add to Your Space</a>
    <a href="#about">About</a>
    <a href="#contact">Open Playlist</a>
  </div>
  </div>
  <?php
                    }
                    ?>
                </div>
                
                <?php
}
             $i++;
            }
     }
     ?>

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
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <?php
  $conn = mysqli_connect("127.0.0.1","root","","mp3");
$rs = mysqli_query($conn,"select * from album order by RAND()");
if($r=mysqli_fetch_array($rs)){
   $code=$r["code"];
?>
                            <a href="play.php?id=<?=$r["code"]?>" data-fancybox="gallery">
                                <img src="album/<?=$code?>.jpg" style="height: 400px;" class="d-block w-100" alt="Slide 1">
                            </a>
                            <?php
     }
     ?>
                        </div>
                        <?php
 
$rsp = mysqli_query($conn,"select * from album where code<>'$code'");
if($rp=mysqli_fetch_array($rsp)){
   $ncode=$rp["code"];
?>
                        <div class="carousel-item">
                            
                            <a href="play.php?id=<?=$rp["code"]?>" data-fancybox="gallery">
                                <img src="album/<?=$ncode?>.jpg" style="height: 400px;" class="d-block w-100" alt="Slide 2">
                            </a>
                        </div>
                        <?php
     }
     ?>
       <?php
 
 $rup = mysqli_query($conn,"select * from album where code<>'$ncode' and code<>'$code'");
 if($ru=mysqli_fetch_array($rup)){
    $pcode=$ru["code"];
 ?>
                         <div class="carousel-item"  style="height: 400px">
                             
                             <a href="play.php?id=<?=$ru["code"]?>" data-fancybox="gallery">
                                 <img src="album/<?=$pcode?>.jpg" class="d-block w-100" alt="Slide 2">
                             </a>
                         </div>
                         <?php
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
                    $x=0;
                    $rs = mysqli_query($conn,"select * from songs order by RAND()");
while($r=mysqli_fetch_array($rs)){
  $scode=$r["code"];
  $rsn = mysqli_query($conn,"select * from album where code='$scode'");
  if($rn=mysqli_fetch_array($rsn)){
?>

<div class="pop" pol="audio<?=$x?>" id="<?=$rn["title"]?>" rel="<?=$r["title"]?>" onclick="playsound(<?=$x?>); autoplay(<?=$x?>); " style="position:relative;" >
                        <div class="list-group-item list-group-item-action align-items-center" style="position:relative;">
                        
                            <i  class="bi bi-music-note me-3"></i>
                            <div>
                           
                                <h5  class="mb-1"><?=$r["title"]?></h5>
                           
                                <?php

                   
  
?>

                                <small class="text-muted" ><?=$rn["title"]?></small>
                            </div>
                            <div class="song-card-actions " id="songbtn">
                                    <button class="action-btn" id="songheart"><i class="bi bi-heart"></i></button>
                                    <button class="action-btn" id="songmenu"><i onclick="menu(<?=$x?>)" class="bi bi-three-dots-vertical ooy <?=$x?>" ></i></button>
                                   
                                </div>
                               
                                
                              
                            <div class="boom" style="position:absolute" >
                            <audio id="audio<?=$x?>" class="gana" controls>
                                 
                                 <source  src="album/<?=$r["code"]?>/<?=$r["sn"]?>.mp3"  type="audio/mpeg" >
                                 
                                 </audio>
                               

                                 </div>
                                 
</div>
                        </div>
                        <div class="menu-container">
                            
                        <div class="dropdown2">
                                    <div id="myDropdown2<?=$x?>" class="dropdown-content2">
                                     <a  id="popupButton<?=$x?>"  onclick="submenu(<?=$x?>)" sn="<?=$r["sn"]?>" scode="<?=$r["code"]?>" rel2="<?=$rn["title"]?>" rel="<?=$r["title"]?>"> <i  class="bi bi-plus-circle"></i>  Add to playlist </a>
                                        <a href="#home"> <i class="bi bi-heart"></i>  Add to liked songs</a>
                                        <a href="#contact"><i class="bi bi-music-note-list"></i> Open Playlist</a>
                                         <a href="#home"><i class="bi bi-share"></i>  Share</a>
                                         <a href="#about"><i class="bi bi-info"></i>  About</a>
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
            
        </div>
    </div><br><br>

    
   
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
 <i id="bom"  class="bi bi-music-note me-3"></i>
 <div id="rnsong" ></div>
 <div id="rnalb"  ></div>
 <div id="shuru" > 00:00</div>
    <input rel="" type="range"  id="bar" value="0">
    <div id="end" > 00:00</div>
    <div class="icons">
<div><i class="bi bi-skip-start-fill"></i></div>
<div ><i onclick="bhai()" rel="" class="bi bi-play-fill" id="ctrl"></i></div>
<div><i class="bi bi-skip-end-fill"></i></div>
    </div>
    
</div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


        <?php
 $conn = mysqli_connect("127.0.0.1","root","","mp3");
if(isset($_COOKIE["login"])){
       
    }
    else{
        ?>
        
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
        <?php
    }
        ?>


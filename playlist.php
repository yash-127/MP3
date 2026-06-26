<?php
if (!isset($_COOKIE["login"])) {
    header("Location: index.php");
    exit();
}
?>


<style>
/* Custom styles */















        #hiphop {
     
            position: relative;
            top: 0;
            right: 0;
            margin: auto;
            width: 100%; 
            height: 100%;
            background-color:white;
            z-index: 9;
            justify-content: center;
            align-items: flex-start;
         
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out,  width 0.3s ease-in-out;
          
          
        }
        
   .main-content{
    background-color:white;
   }
#link{
    text-decoration:none;
}
</style>

<script>
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
      
      $(document).on('click', '.create-button', function(e){
  e.stopPropagation();
  $('.create-album-popup').addClass('show');
  $('.create-album-overlay').addClass('show');
});

</script>

    <!-- Top Navbar -->
    

    
    <div id="hiphop">
        
        <div id="popupContent">
          
        
            
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search songs, artists, or albums...">
                <button class="create-button">Create New Album</button>
            </div>
           
            <div id= "song-grid" class="song-grid">

            
                <?php
            
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

   <div class="song-space2" id="<?=$ccode?>">
       <img src="song3.jpg" alt="Song 1" class="song-image">
       
       <div class="song-info">
           <div class="song-title"><?=$rn["title"]?></div>

           
       </div>
   </div>

   <?php
 
}
?>
  </div>
        </div>
       
   </div>
    
  
<?php

}
    
    else{
      
    }

                ?>
                
              
          

    

</html>
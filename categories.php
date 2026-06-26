<style>
    
.card {
    border: none;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.1);
}

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
.one{
    display: inline;
   font-size:15px;
    margin-left:20px;
  
  color:black;
  text-transform: uppercase;
  font-family: "Times New Roman", Times, serif;
}
a { text-decoration: none; }
.pu{
    display: flex;
   margin-top:25px;
    
}
.cat{
    height:250px; width:250px;
   
}

p:hover {
   font-size:19px;
    animation: rise 1s ease-in-out;
}
.pop{
    transition: margin-left 0.3s ease-in-out;
}
@media (max-width: 1350px) {
    
  
    .pop{
        position: absolute;
        margin-left:-60px;
    }
}
@media (max-width: 1160px) {
    
  
    .pop{
        position: absolute;
        margin-left:-110px;
    }
}
@media (max-width: 970px) {
    
  
    .pop{
    display:none;
    }
}
@media (max-width: 765px) {
    
  
    .pop{
        display:block;
        margin-left:120px;
        margin-top: -27px;
    }
}
@media (max-width: 800px) {
    
  
   .one{
    font-size:13px;
   }
}
@media (max-width: 765px) {
    
  
    .one{
     font-size:15px;
    }
 }
@media (max-width: 668px) {
   
  
    .pop{
        display:block;
        margin-left:20px;
        margin-top: -27px;
    }
}

</style>


<div class="container-fluid">
        <div class="row content-row">
       
            
        
            <div class="row">
           <?php
$conn = mysqli_connect("127.0.0.1", "root", "", "mp3");
$rs = mysqli_query($conn, "SELECT * FROM category ORDER BY RAND()");

while ($r = mysqli_fetch_array($rs)) {
?>
    <div class="col-md-4 pu">
        <div 
            class="card category-choose2" 
            rel="<?= $r['code'] ?>" 
            rel2="<?= htmlspecialchars($r['category']) ?>" 
            style="width:500px; height:44px; cursor:pointer;"
        >
            <div style="margin-top:10px;">
                <span class="one"><?= $r['category'] ?></span>
            </div>
        </div>
    </div>
<?php
}
?>

       
       </div>
       </div>
        </div>
        
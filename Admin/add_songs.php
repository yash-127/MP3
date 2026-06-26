<?php
if(isset($_COOKIE["login"])){
	
	
	
	?>




<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>MP 3 Player</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

   
  
</head>
<style>
      .boom {
    
   
 
    
    overflow: hidden;
  }
  .s{
    size:33px;
    float:left;
    top: 1%;
  }
  .boom input {
    border: 0 none;
    width: 400px;
    height: 50px;
    background: transparent;
    font-size: 30px;
    
    letter-spacing: 28px;
    text-indent: 18px;
  }
  .des{

position: absolute; 
top: 5%;

left: 5%;
}
.h{
   font-size:17px;
   text-transform:uppercase;
   position: absolute; 
    top: 30%;
 
   left: 40%;

}
.fa-edit{

    position: absolute; 
    top: 40%;
    width: 100px; 
   left: 55%;
}
.fa-plus{

position: absolute; 
top: 40%;
width: 100px; 
left: 25%;
}
.fa-trash{
    top: 40%;
position: absolute; 
width: 100px; 
left: 75%;
}
.input {
  width: 100%;
  height: 55px;
  font-size: 16px;
  
  color: var(--second-color);
  padding-inline: 20px 50px;
  border: 2px solid var(--primary-color);
  border-radius: 30px;
  outline: none;
}
.p{
    width: 190px;
    height: 170px;
    object-fit: fill;
    
}
.log {
 

  
  
  display: flex;


  border-radius: 20px 20px 20px 20px;
}
.brand-wrapper {
    position: absolute;

left: 30%;
display: flex;
align-items: center;
justify-content: center;
color:black;
width: 140px;
top: 35px;
border-radius: 20px 20px 0px 0px;
 
}
.back-video{
  position: absolute;
  left: -5%;
  bottom: 0;
  z-index: -1;
  object-fit: fill;
  height: 700px;
  width:1100px; 
}


@media only screen and (max-width: 564px) {
  .wrapper {
    padding: 20px;
  }

  .login_box {
    padding: 7.5em 1.5em 4em 1.5em;
  }
}
</style>
<body style="overflow-x: hidden">

<div class="wrapper">
    <div class="sidebar" data-color="purple" >

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper"  style="overflow-x: hidden">
        <video autoplay loop muted plays-inline class="back-video">
    <source src="japan-spring-sakura-street-moewalls-com.mp4" type="video/mp4" >
  </video>
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    MP 3
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <?php
        $code=$_GET["id"];
        $conn = mysqli_connect("127.0.0.1","root","","mp3");
                                  $rs=mysqli_query($conn,"select * from album where code='$code'");
                                     if($r=mysqli_fetch_array($rs)){
                                     ?>
                                    <div class="container">
                                        <div class="row">
                                           
                                            <div class="col-lg-8">
                                           <br>
                                            <form method="post" action="addsongs.php?id=<?=$r["code"]?>" enctype="multipart/form-data">
                                                <label>Title:</label>
                                                <input type="text" name="title" class="form-control" style="overflow:none"  placeholder="Enter Title.." required><br>
                                                <label>Description:</label>
                                                <input type="text" name="description" class="form-control boom" style="overflow:hidden"  placeholder="Enter Description.." required><br>
                                                <label>song:</label><br>
                                                <input type="file" name="song"><br><br>
                                                <input type="submit" value="create" class="btn btn-primary">
                                            </form>
                                            <h3 >SONGS</h3>
                                            </div>
                                            </div>
                                        </div><br>
                                        
                                        <?php
                                        }
                                            $rs=mysqli_query($conn,"select * from songs where code='$code'");
                                            while($r=mysqli_fetch_array($rs)){
                                            ?>
                                        <div class="container">
                     <div class="row">
                        <div class="col-lg-12">
                          <div class="row">
                          <div class="col-lg-12">
                          <table class="table table-borderless table-striped" >
                          <tr>
                            <td>
                          <audio controls>
                                 
                                    <source  src="../album/<?=$r["code"]?>/<?=$r["sn"]?>.mp3"  type="audio/mpeg" >
                                    
                                    </audio></td>
                         
                         
                           
                        
                                  
                                                        
                                                       <td><p  class="h"><?=$r["title"]?></p></td><td></td>
                                                       
                                                       <td><a href="edit_songs.php?id=<?=$r["code"]?>&&sn=<?=$r[0]?>"><i class="fa fa-edit" style="color:green"></i></a></td>
                                                       <td><a href="deletesongs.php?id=<?=$r["code"]?>&&sn=<?=$r[0]?>"><i class="fa fa-trash" style="color:red"></i></a></td>
                                                    
                                                    
                                                    </tr>
                                                      
                                                       <td  style="font-size:15px; "><?=$r["title"]?> : <?=$r["des"]?></td><td></td><td>
  

                                                       </td><td></td><td></td>
                                                        
                                                    </tr>
                                                </table>
                                  
                              </div>
                              
                          </div><br>
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
            </div>
            </div>


</div>
</div>
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	
</html>



<?php
}
else{
	header("location:index.php");
}
?>













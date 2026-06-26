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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   
  
</head>
<style>
    .container{
        background-image:"kenny-eliason-bE3_aFt85Y8-unsplash.jpg";
    }
    .pi{
      font-size:15px; 
      font-family:Lucida; 
    }
    .edit {
        width: 300px;
        length:auto;
 
   
 
    
    overflow: hidden;
  }
.fa-edit{

    position: absolute; 
    width: 200px; 
   left: 50%;
}
.fa-plus{

position: absolute; 
width: 200px; 
left: 25%;
}
.fa-trash{

position: absolute; 
width: 200px; 
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
<script>
    $(document).on("click",".p",function(){
        var txt = $(this).attr("rel");
        var tid = $(this).attr("id");
      $.post(
        "delete.php",{id:txt,code:tid},function(data){
            data=data.trim();
            if(data=="success") {
                $("#row-"+txt).fadeOut(1000);
            }
        }
      );
    });

var action=0;
var field_name = "";
var sn=0;
$(document).on("click",".td",function(){
    if(action==0){
        field_name=$(this).attr("rel");
        var txt =$(this).attr("id");
        var roll =txt.split("-");
        var data =$(this).text();
        sn=roll[1];
        action=1;
        $("#"+txt).html("<input type='text' id='text-"+roll[0]+"' rel='"+roll[0]+"' value='"+data+"'class='form-control edit' style='text-transform:uppercase;font-family:Lucida; '  >");

    }
});
$(document).on("keyup",".edit",function(e){
    if(e.keyCode==13){
        var txt =$(this).val();
        $("#"+field_name+"-"+sn).text(txt);
        action=0;
        $.post(
            "update.php",{id:sn,col:field_name,rec:txt},function(data){}
        );

    }
});


</script>
<body style="overflow-x: hidden" >


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
        
                                         <div class="container" >

                                          <div class="row justify-content-center">
                                            <div class="col-lg-12"></div>
                                        <div class="col-lg-6 "> 
                                              <form method="post" action="category.php">
                                               <br>
                                                  <div class="mt-4" style="font-family:Audiowide; font-size:25px; ">ADD CATEGORY</div>
                                                  <div class="card-body">
                                                    <input type="text" name="category" class="form-control"  placeholder="Enter Category Name..."><br>
                                                    <input type="submit" value="ADD" class="btn btn-primary log" ><br>
                                                  </div>
                                               
                                              </form>
                                            </div>
                                          </div>
                                          <h3 style="font-family:Garamond;">Categories</h3>

                                          
                                          
                                          <?php
                                                  $conn = mysqli_connect("127.0.0.1","root","","mp3");

                                            $rs=mysqli_query($conn,"select * from category order by sn");
                                            while($r=mysqli_fetch_array($rs)){
                                            ?>
                                          
                                            <div class ="col-lg-12 ">
                                            <div class="row">
                                              
                                              <table class="table table-borderless table-striped">
                                              <tr id="row-<?=$r[0]?>">
                                              <td  ><p rel="cat" class="td pi"  id="cat-<?=$r[0]?>"  style="text-transform:uppercase;"><?=$r[2]?></p></td>
                              
                                                  <td class="sticky-icon"><a href="add_album.php?id=<?=$r["code"]?>"><i class="fa fa-plus" ></i></a></td>
                                                  <td class="sticky-icon"><a href="edit.php?id=<?=$r["code"]?>"><i class="fa fa-edit" rel="<?=$r[0]?>" style="color:green"></i></a></td>
                                                  <td><i class="fa fa-trash p"  rel="<?=$r[0]?>" id="<?=$r[1]?>" style="color:red"></i></td>
                                                 
                                                </tr>
                                              </table>
                                            </div>
                                          </div>

                                                 
                                           
                                          <?php
                                            }
                                          ?>
                        
            </div>




        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
               
            </div>
        </footer>

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

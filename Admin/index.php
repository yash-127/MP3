<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .bo{
      align-items:left;
    }
.background{
    background-image: url(kenny-eliason-bE3_aFt85Y8-unsplash.jpg);
    background-size: 1400px auto;
    min-height: 100vh;

   }
   .wrapper {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: rgba(0, 0, 0, 0.2);
}
.logincard {
  position: relative;
  width: 450px;
  border: 77px solid var(--primary-color);
  border-radius: 15px;
  padding: 7.5em 2.5em 4em 2.5em;
  color: var(--second-color);
  box-shadow: 50px 50px 400px 400px rgba(0, 0, 0, 0.2);
}
.i {
  position: absolute;
  top: 15px;
  left: 20px;

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
    position: absolute;

  left: 50%;
  transform: translateX(-50%);
  display: flex;
  align-items: center;
  justify-content: center;
 
  width: 140px;
  height: 64px;
  border-radius: 20px 20px 0px 0px;
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
.login {
  font-size:25px;
  text-transform:uppercase;
  font-family:Lucida ;
  color:white;
 width:45%;
}





    
</style>  
<body>
<form method="post" action="check.php">
    <div class="container-fluid"></div>
       <div class="col-lg-12 col-md-12 background">
        <div class="row" >
            <div class="wrapper">
              <div class="logincard">

              <div class="brand-wrapper">
             
    
      <span class="login">Login</span>
          </div>
         
                                    <div>
                                  
                                    <input type="email" id="email" name="email" class="input" placeholder="Email" required><br><br>
                                    
                                   
                                    </div>

                                    <div >
                                    <input type="password" name="password" id="password" class="input" placeholder="Password" required>
                                   
                                    
                                    </div><br><br>
                                  

                                    <div>
                                    <input type="submit" class="btn btn-primary log" value="Login" >
                                    </div>
                                   
              </div>

            </div>

        </div>

       </div> 
       </div>




       </form>
</body>
</html>

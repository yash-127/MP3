<?php
     if( empty($_POST["email"]) || empty($_POST["pass"])){
        header("location:index.php?empty=1");
    }
    else{
        
            $email = $_POST["email"];
            $pass = $_POST["pass"];
        
    

            $conn=mysqli_connect("127.0.0.1","root","","mp3");
            $rs=mysqli_query($conn,"select MAX(sn) from clients");
            $sn=0;
                if($r=mysqli_fetch_array($rs)){
                    $sn=$r[0];
                }
                $sn++;
                $arr=array();
                for($i='A' ; $i<'Z' ; $i++){
                    array_push($arr,$i);
                    if($i=='Z'){
                        break;
                    }
                }
                for($i='a' ; $i<'z' ; $i++){
                    array_push($arr,$i);
                    if($i=='z'){
                        break;
                    }
                }
                for($i=0; $i<9; $i++){
                    array_push($arr,$i);
                    
                }
                shuffle($arr);
                $code="";
                for($i=0; $i<6; $i++){
                    $code = $code.$arr[$i];
                }
                $code=$code."_c".$sn;
          
                

                
              
                        if(mysqli_query($conn,"insert into clients values($sn,'$code','$email','$pass')")>0){
                            setcookie("login",$email,time()+3600*7);
                          
                            header("location:index.php?success=1");
                        }
                        else{
                            header("location:registration.php?again=1");
                        }
                    
            }
        ?>
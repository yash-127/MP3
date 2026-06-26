<?php

	if(isset($_COOKIE["login"])){
                            $email=$_COOKIE["login"];
                    if(empty($_REQUEST["title"]) || empty($_REQUEST["description"])){
                        header("location:index.php?empty=1");
                        alert("empty slots");
                    }
                    else{
                        $conn = mysqli_connect("127.0.0.1","root","","mp3");

                        
                                $sn=0;
                            $rs=mysqli_query($conn,"select MAX(sn) from clientalb");
                            if($r=mysqli_fetch_array($rs)){
                                $sn=$r[0];
                            }
                            $sn++;
                            $a=array();
                            for($i='A';$i<='Z';$i++){
                                array_push($a,$i);
                                if($i=='Z')
                                    break;
                            }
                            for($i='a';$i<='z';$i++){
                                array_push($a,$i);
                                if($i=='z')
                                    break;
                            }
                            for($i=0;$i<=9;$i++){
                                array_push($a,$i);
                            }
                            shuffle($a);
                            $code="";
                            for($i=0;$i<7;$i++){
                                $code.=$a[$i];
                            }
                            $code=$code."_c".$sn;
                            $title=$_REQUEST["title"];
                            $des=$_REQUEST["description"];

                            $conn = mysqli_connect("127.0.0.1","root","","mp3");
                            $rs=mysqli_query($conn,"select * from clients where email='$email'");
                            if($r=mysqli_fetch_array($rs)){
                            
                        $ccode=$r["code"];
                     
                        
                            }
                        
                        

                            
                            
                            if(mysqli_query($conn,"insert into clientalb values($sn,'$code','$title','$des','$ccode')")>0){
                              
                                echo "success";
                                exit();
                                
                            }
                            else{
                                header("location:index.php?again=1");
                            }
                        }

                    }
                
            
                else{
                    header("location:index.php?nope=1");
                }
?>
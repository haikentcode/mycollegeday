<?php 
               $hk=mysql_connect("localhost","haikent","sanah");
               if(!$hk){die('Could not connect'.mysql_error());}
               mysql_select_db("mycollegeday",$hk);
               $aditi=$_POST["adu"];
                switch($aditi)
                  {
                         case "likeupdate":
						 
                          $nhkid=$_POST["nhkid"];
                          $sid=$_POST["sid"];
						  $TOTAL_LIKE=0;
						  $likeQ="";
                          $select1=mysql_query("SELECT * FROM status_like WHERE STATUS_ID='$sid' ");
						  $select2=mysql_query("SELECT * FROM  status_like WHERE HKID='$nhkid' AND STATUS_ID='$sid'");
						  while($row1=mysql_fetch_array($select1)){$TOTAL_LIKE++;}
						  
											 if($row2=mysql_fetch_array($select2))
											   {
										        $likeQ="unlike";
										       }      
										 
                                              else{$likeQ="like";}
										   
								          $response=$TOTAL_LIKE."==".$likeQ."==true";// after likeQ \n charactr make a bigest problem for me bhut hi muskil se is bugs ko dhunda and solve kiyaa...
                                          echo $response;									   
						                 break;
						default:
						        
                                 echo '<script>alert("some thing error ,we solve this problem as soon as!!!!!!")</script>';		
                                exit(0);								 
                 }
?>



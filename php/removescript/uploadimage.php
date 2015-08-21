<?php
$hk=mysql_connect("localhost","haikent","sanah");
if(!$hk)
{
die('Could not connect'.mysql_error());
}
mysql_select_db("mycollegeday",$hk);
$aditi=$_POST["adu"];
$nhkid=$_POST["nhkid"];
if(isset($_POST["imgs"])){$imgs=$_POST["imgs"];}
$hk_pic="_".Time()."_";
$allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 10000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
	
	/*
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    */
	
	 
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" .$hk_pic. $_FILES["file"]["name"]);
	  
	  
      if($aditi=="statusimageupload")
	   {
	  //echo "Stored in: " . "http://localhost/mycollegeday/php/upload/" .$hk_pic. $_FILES["file"]["name"];
	  echo '<span style="color:blue;font:20px Felix Titling;">Image successfully uploaded .....</span><br>';
	  echo '<span style="font:8px Consolas">'.$imgs.'</span><br>';
	  echo '<img style="width:100px;height:100px;" src="http://localhost/mycollegeday/php/upload/'.$hk_pic. $_FILES["file"]["name"].'" ></img>';
	                                
									
									  $status=$imgs.'<br><br>'.'<img  src="http://localhost/mycollegeday/php/upload/'.$hk_pic. $_FILES["file"]["name"].'" style="border:0.5px solid #F0F0F0 ;"></img>';
									  $time=Time();
									  $hkid=$nhkid;
									  $status_id=$hkid."_".$time;
					                  $sql="INSERT INTO status
									  (
									  STATUS,
									  HKID,
									  TIME,
									  STATUS_ID
									  )
									  VALUES
									  (
									  '$status',
									  '$hkid',
									  '$time',
									  '$status_id'
									  )
									  ";
                                     mysql_query($sql);
			}
           

          if($aditi=="profilepicupload")
		  {
		                   $select_p=mysql_query("SELECT * FROM profile WHERE HKID='$nhkid'");
		                     $path="http://localhost/mycollegeday/php/upload/".$hk_pic. $_FILES["file"]["name"];
		                     if(($row=mysql_fetch_array($select_p))){mysql_query("UPDATE profile SET PROFILEPIC='$path' WHERE HKID= '$nhkid'"); }
		                      else
		                       {  
							   
							   mysql_query("INSERT INTO profile(HKID,PROFILEPIC) VALUES('$nhkid','$path')");
		     
		                       }
				    echo '<span >profile pic successfully Upload </span><br>';			   
		            echo '<img style="align:center;width:200px;height:200px;" src="http://localhost/mycollegeday/php/upload/'.$hk_pic. $_FILES["file"]["name"].'" ></img>';
		  }		   
							         		
	 
	  
      }
    }
  }
else
  {
  echo "Invalid file";
  }
 
?> 
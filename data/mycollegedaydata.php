<?php
$hk=mysql_connect("localhost","haikent","gudan");

    if(!$hk){
              die('could not connect to localhost'.mysql_error());
		    }
		 

		 mysql_select_db("datastore",$hk);
		 
		 
		 
		 if(isset($_POST["gudan"]))
		 {
		   $aditi=$_POST["gudan"];
		 }
		 $tablename="";
		 
        switch($aditi)
		{
		
		  case "ebook_store": $tablename="ebooksstore";break;
		  case "mp3_store": $tablename="songsstore";break;
		  case "video_store": $tablename="videosstore";break;
		  case "apkapp_store": $tablename="apkappsstore";break;
		  case "software_store": $tablename="softwaresstore"; break;
		  case "game_store": $tablename="gamesstore"; break ;
		  case "pictures_store":$tablename="picturesstore";break;
		}
		$folder="http://localhost/mycollegeday/data/";
		
		 $hkag=time();
	     $column="(path,description,title,keywords,thumb_path,did)";
	     $path=$folder.$tablename."/".$hkag. $_FILES["data"]["name"];
		 $thumb_path=$folder."thumb_".$tablename."/".$hkag. $_FILES["data_thumb"]["name"];
		 $upath=$tablename."/".$hkag. $_FILES["data"]["name"];
		 $uthumb_path="thumb_".$tablename."/".$hkag. $_FILES["data_thumb"]["name"];
         $title=$_POST['title'];
		 $description=$_POST['description'];
		 $keywords=$_POST['keywords'];
		 $did=md5($title."mylovegudan".time());
		 $value="('$path','$description','$title','$keywords','$thumb_path','$did')";
		 $data="INSERT INTO $tablename $column VALUES $value";
		 echo $data;
		 mysql_query($data);
		 
		 move_uploaded_file($_FILES["data"]["tmp_name"],$upath);
		 move_uploaded_file($_FILES["data_thumb"]["tmp_name"],$uthumb_path);
	  
	

?>
<!DOCTYPE html>
<html>
<body >
<?php
$aditi=$_GET["adu"];

switch($aditi)
{
   case "getimageuploaddata":
                          $nhkid=$_GET["nhkid"];
						  
                         ?>
						 
                            <form action="http://localhost/mycollegeday/php/mycollegephp.php"  method="post"  enctype="multipart/form-data">
                             <label for="file">Image:</label>
							 <input name="nhkid" value="<?php echo $nhkid ?>" style="display:none">
							 <input name="adu" value="statusimageupload" style="display:none"  >
                             <input type="file" name="file" id="file"><br>
							 <span style="color:blue;font:10px Felix Titling">Your status with this image </span><br>
							 <textarea name="imgs" id="imgs" style="resize:none;height:60px;overflow:hidden;width:240px;"></textarea>
							 <br/>   
                             <input type="submit" value="SUBMIT" >
                           
						     </form>
						   
						   <?php
						 break;
  case "setprofileimage":
                        $nhkid=$_GET["nhkid"];  
                       ?>
					   
					      <form action="http://localhost/mycollegeday/php/mycollegephp.php"  method="post"  enctype="multipart/form-data">
						    
                             <label for="file">Image:</label>
                             <input name="nhkid" value="<?php echo $nhkid ?>" style="display:none">
							  <input name="adu" value="profilepicupload" style="display:none"  >
                             <input type="file" name="file" id="file"><br>
						     <br/>   
                             <input type="submit" value="SUBMIT" >
                           
						     </form>
					  
					  <?php 
                      break;						 

                          
}


?>
</body>
</html>
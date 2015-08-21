<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $pagecode="haikentsignatureadulovemylifeeverything" ?>

<?php 



function user($id,$pgc) {$_SESSION['id']=$id;open($id);}

function open($id)
{

$hk=mysql_connect("localhost","haikent","gudan");
if(!$hk)
{
die('Coould not connect'.mysql_error());
}
mysql_select_db("mycollegeday",$hk);
$result=mysql_query("SELECT * FROM userinfo WHERE ID='$id'");

$row=mysql_fetch_array($result);

$n_hkid=$row['HKID'];


?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/profilepage.css" />
<script type="text/javascript"  src="../script/jquery.js"></script>
<script type="text/javascript" src="../script/profilemenu.js"></script>
<script type="text/javascript"  src="../script/mycollegedayjs.js"></script>





<script type="text/javascript">


update();

function visible(id,sp)
{
$("#backblacklayer").show();
$("#"+id).show();
//set path image upload iframe new think creat to day that is add path by java script .... ye  hiii yp,,, this think dedicate to my fvrt song emptiness

switch(sp)
       {
         case "uploadimage":
		 
             document.getElementById("imageuploadiframe").src="http://localhost/mycollegeday/php/mycollegephp.php?adu=getimageuploaddata&nhkid="+"<?php echo $n_hkid; ?>";
            break;
		     case "editprofilrpic":
		     document.getElementById("imageuploadiframe").src="http://localhost/mycollegeday/php/mycollegephp.php?adu=setprofileimage&nhkid="+"<?php echo $n_hkid; ?>";
                  break;		
		
		}
	  }
function invisible(cls)
{
$("."+cls).hide();
//update after image upload for this 
var t2=setTimeout("update(\"<?php echo $id?>\")",2000);

}

</script>

<title>MYCOLLEGEDAY</title>
</head>

<body>
<div name="head" class="headpart">
<!---------------------------------------------------->


<div id="head_div" style="display:none">
	<ul>
		<li><a href="#">MYCOLLEGEDAY</a></li>
		<li>
      		<a href="#"><img src="../image/siteicon/friends.png" class="icon2"><spam class="counting">11</spam></a>
            
			<div class="head_menu_optn">
               
				<ul>
					<li><a href="#">Chair <span class="caret"></span></a></li>
					<li><a href="#">Table</a></li>
					<li><a href="#">Cooker</a></li>
					<li><a href="#">Chair <span class="caret"></span></a></li>
					<li><a href="#">Table</a></li>
					<li><a href="#">Cooker</a></li>
				</ul>
			</div>
		</li>
		<li><a href="#"><img src="../image/siteicon/message.png" class="icon2"><spam class="counting">11</spam></a>
		<div  class="head_menu_optn">
				<ul>
					<li><a href="#">Chair <span class="caret"></span></a></li>
					<li><a href="#">Table</a></li>
					<li><a href="#">Cooker</a></li>
					<li><a href="#">Chair <span class="caret"></span></a></li>
					<li><a href="#">Table</a></li>
					<li><a href="#">Cooker</a></li>
				</ul>
			</div>
		
		
		
		</li>
		<li><a href="#"><img src="../image/siteicon/notification.png" class="icon2"><spam class="counting">11</spam></a>
		 <div class="head_menu_optn">
				<ul>
					<li><a href="#">Chair <span class="caret"></span></a></li>
					<li><a href="#">Table</a></li>
					<li><a href="#">Cooker</a></li>
					<li><a href="#">Chair <span class="caret"></span></a></li>
					<li><a href="#">Table</a></li>
					<li><a href="#">Cooker</a></li>
				</ul>
			</div>
		
		
		</li>
		<li class="mainsearch_li">
		 <input class="mainsearch" placeholder="search......"/>
		  <div class="head_menu_optn">
				<ul>
					<li><a href="#">Chair <span class="caret"></span></a></li>
					<li><a href="#">Table</a></li>
					<li><a href="#">Cooker</a></li>
					<li><a href="#">Chair <span class="caret"></span></a></li>
					<li><a href="#">Table</a></li>
					<li><a href="#">Cooker</a></li>
				</ul>
			</div>
		
		</li>
        
        <li>
        <a href="#">HOME</a>
        </li>
        
        <li><a href="#"><?php echo hkidToFnameLname($n_hkid)?></a></li>
        
	</ul>
</div>


<!------------------------------------------------------->
<div  id="xyz" >tomato khate hote hai bt mite bhi</div>
<div  id="xyzbackground" onclick='$("#xyz").hide();$("#xyzbackground").hide();' ></div>
</div>

<div name="body" class="body">

<!-----------------------------------------------------/image upload/-------------------------------------->
<div id="backblacklayer" style="display:none" class="uperlayer" onclick='invisible("uperlayer")'></div>


<div id="uploadimage" style="display:none" class="uperlayer">

  <iframe  style="width:380px;overflow:hidden;" src="" id="imageuploadiframe" frameborder="0" ></iframe>
  <br>
  <a href="#" onclick='invisible("uperlayer")' style="position:absolute;top:190px;left:320px;">close</a>
</div>
<!------------------------------------------------------------------------------------------->


<div name="bodypart1" class="bodypart1" id="bodypart1">

<dl>
   <dt><span style="padding-left:20px;">Social Networking</span></dt>
   <dd onclick='div_1_click(this.id)' id="newsfeed" style="background-color:#C8C8C8"> <img src="http://localhost/mycollegeday/image/siteicon/newsfeed.ico" class="icon"> News Feed</dd>
   <dd onclick='div_1_click(this.id)' id="friends"  style=""><img src="http://localhost/mycollegeday/image/siteicon/newsfeed.ico" class="icon"> Friends</dd>
<dt><span style="padding-left:20px;">Education</span></dt>
<dd onclick='div_1_click(this.id)' id="ebooks"><img src="http://localhost/mycollegeday/image/siteicon/ebook.ico" class="icon">Ebooks</dd>
<dd onclick='div_1_click(this.id)' id="notes"><img src="http://localhost/mycollegeday/image/siteicon/notes.ico" class="icon"> Notes</dd>
<dd onclick='div_1_click(this.id)' id="result"><img src="http://localhost/mycollegeday/image/siteicon/result.ico" class="icon"> Result</dd>
<!--<dd onclick='div_1_click(this.id)' id="timetale"><img src="http://localhost/mycollegeday/image/siteicon/g.ico" class="icon"> Time Table</dd> -->
<dd onclick='div_1_click(this.id)' id="notice"><img src="http://localhost/mycollegeday/image/siteicon/g.ico" class="icon"> Notice</dd>

<dt><span style="padding-left:20px;">Entertainment</span></dt>
<dd onclick='div_1_click(this.id)' id="movies"><img src="http://localhost/mycollegeday/image/siteicon/movie.ico" class="icon"> Movie</dd>
<dd onclick='div_1_click(this.id)' id="songs"><img src="http://localhost/mycollegeday/image/siteicon/song.ico" class="icon"> Song</dd>
<dd onclick='div_1_click(this.id)' id="picture"><img src="http://localhost/mycollegeday/image/siteicon/picture.ico" class="icon"> Picture</dd>
<dd onclick='div_1_click(this.id)' id="Game"><img src="http://localhost/mycollegeday/image/siteicon/g.ico" class="icon"> Game</dd>
<dt><span style="padding-left:20px;">Download</span></dt>
<dd onclick='div_1_click(this.id)' id="codehunt"><img src="http://localhost/mycollegeday/image/siteicon/g.ico" class="icon">APKapps</dd>
<dd onclick='div_1_click(this.id)' id="codehunt"><img src="http://localhost/mycollegeday/image/siteicon/g.ico" class="icon">Sowfware</dd>


<dt><span style="padding-left:20px;">Other</span></dt>
<dd onclick='div_1_click(this.id)' id="http://w3schools.com/"><img src="http://localhost/mycollegeday/image/siteicon/g.ico" class="icon"> Webdesign</dd>
<dd onclick='div_1_click(this.id)' id="codehunt"><img src="http://localhost/mycollegeday/image/siteicon/g.ico" class="icon"> code hunt</dd>
<dd onclick='div_1_click(this.id)' id="onlineEarnmony"><img src="http://localhost/mycollegeday/image/siteicon/g.ico" class="icon"> Online Earn mony</dd>
</dl> 
   
</div>


<div name="bodypart2" class="bodypart2">        
    
<div style="background-color:#D8D8D8;width:60%;height:1px;"></div>

<div name="status_show_part" id="status_show_part" class="status_show_part">

</div>


<div name="bodypart3" class="bodypart3"></div>
</div>



</body>
</html>


<?php } ?>
<!-- 
MY guru ... w3schools.com
In this summer I am creating this website 
Dedicate to someone she used to called me pagal forever 
speciay thank to my all frnd group a-block there wishes and belive with me,encouraged me to develop this site....
love me and hate me  in both codition i am with u, till my lastbrith and after(AdU)

26/6/2013.......<haikent>
________________________________________________________________________________________________

i am at college nitj ... h7 room 415
to day I am start to ccoding for this site ....21/8/2013

-->
<!DOCTYPE html>
								 
<?php $pagecode="haikentsignatureadulovemylifeeverything" ?>
<html>
<?php 

function user($id,$pgc) {if($pgc=="haikentsignatureadulovemylifeeverything"){open($id);}}

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

/*
function hkidtopic($gethkid)
{
$sel=mysql_query("SELECT * FROM profile WHERE HKID='$gethkid'");
$ro=mysql_fetch_array($sel);
return $ro['PROFILEPIC'];
}
*/



?>

<head>
<title>mycollegeday</title>

<script type="text/javascript"  src="http://localhost/mycollegeday/script/jquery.js"></script>
<script type="text/javascript" src="http://localhost/mycollegeday/script/profilemenu.js"></script>
<script type="text/javascript"  src="http://localhost/mycollegeday/script/mycollegedayjs.js"></script>


<!--[if lt IE 7]>
        <script type="text/javascript">
            var elMain = document.getElementById('main');

            setMainDims();
            document.body.onresize = setMainDims;

            function setMainDims() {
                elMain.style.height = (document.body.clientHeight - 40) + 'px';
                elMain.style.width = '99%'
                setTimeout("elMain.style.width = '100%'", 0);
            }
        </script>
<![endif]-->
<script type="text/javascript" >






update("<?php echo $id; ?>");

 




		

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


   

function aduclick(a,b,c)
{
alert(a);
}
function comment_hide_show_button(sid)
{
sid_scmnt=sid+"_comment";
/*
if($(sid_scmnt).css("visibility")=='visible')
{
$("#"+sid_scmnt).hide()
}
else{$("#"+sid_scmnt).show();}
*/
$("#"+sid_scmnt).show();

}
var i=0;	

function re_update()
{
i++;
alert(i);
}




</script>
<link rel="stylesheet" type="text/css" href="http://localhost/mycollegeday/css/mainpagecss.css" />
</head>



<body  onunload='' ononline='alert("hello online user")' onoffline='alert("hello off line user")'>

<div name="mycollegeday_user_page" class="mycollegeday_user_page">


<!-----------------------------------------------------/image upload/-------------------------------------->
<div id="backblacklayer" style="display:none" class="uperlayer" onclick='invisible("uperlayer")'></div>
<div id="uploadimage" style="display:none" class="uperlayer">

  <iframe  style="width:380px;overflow:hidden;" src="" id="imageuploadiframe" frameborder="0" ></iframe>
  <br>
  <a href="#" onclick='invisible("uperlayer")' style="position:absolute;top:190px;left:320px;">close</a>
</div>
<!------------------------------------------------------------------------------------------->

<div style="z-index:2;float:right;width:15.7%;height:100%;background-color:#C8C8C8 ;position:absolute;top:0px;left:83%;border:1px solid black;" id="online_notificaion" onclick='a()' rel="right side end of the page part"></div>

<!--{ head  21/8/2013--->
<div name="head" class="head_welcompage" >
<div name="head_div_1" id="head_div_1" ><span ><img id="sitelogo" src="http://localhost/mycollegeday/image/siteicon/hlogo.jpg" onClick="history.go(0)"></div>
<div name="head_div_2" id="head_div_2">


<input name="serch" id="serch" class="serch"><input class="serch_button" >
</div>
<div name="head_div_3" id="head_div_3" style="">
<div style="height:70%;padding-top:10px;float:left;padding-right:5px;"><span  style="color:white;font-size:15px;"><?php echo ucwords($row['FNAME'])." "; ?></span></div>
<div style="float:left;height:80%;width:5px;background-color:;"></div>
<div style="float:left;height:100%;width:30px;"><img src="http://localhost/mycollegeday/image/siteicon/setting.png" style="widyh:20px;height:20px;padding-top:8px;cursor:pointer;"></div>
<div style="float:left;padding-top:10px;padding-left:20px"><span style="color:white;cursor:pointer;" onclick='logout()' >logout</span></div>
</div>

</div>

<!--}head----->




<div name="main_page" class="main_page" id="main_page">


<div name="div_1" class="div_1" >
<div name="profile_part" style="width:100%;height:20%;float:left;padding-top:10px;">

<div style="height:100%;float:left;width:30%;"><img src="<?php echo hkidtopic($n_hkid);?>" style="width:50px;height:60px;"></div>
<div style="height:100%;flaot:left;width:70%"><span name="p_user_name" style="color:blue;cursor:pointer;font-size:13px;"><?php echo ucwords($row['FNAME'])." ".ucwords($row['LNAME']) ?></span>
<br><br><button onclick='visible("uploadimage","editprofilrpic")'>edit PP</button>
</div>

</div>

<div style="left_menu_part" style="width:100%;folat:left;">
<dl>
<dt><span style="padding-left:20px;">Education</span></dt>
<dd onclick='div_1_click(this.id)' id="newsfeed" style="background-color:#C8C8C8"> <img src="http://localhost/mycollegeday/image/siteicon/newsfeed.ico" class="icon"> News Feed</dd>
<dd onclick='div_1_click(this.id)' id="ebooks"><img src="http://localhost/mycollegeday/image/siteicon/ebook.ico" class="icon">Ebooks</dd>
<dd onclick='div_1_click(this.id)' id="notes"><img src="http://localhost/mycollegeday/image/siteicon/notes.ico" class="icon"> Notes</dd>
<dd onclick='div_1_click(this.id)' id="result"><img src="http://localhost/mycollegeday/image/siteicon/result.ico" class="icon"> Result</dd>
<dd onclick='div_1_click(this.id)' id="timetale"><img src="http://localhost/mycollegeday/image/siteicon/refresh.png" class="icon"> Time Table</dd>
<dd onclick='div_1_click(this.id)' id="notice"><img src="http://localhost/mycollegeday/image/siteicon/refresh.png" class="icon"> Notice</dd>

<dt><span style="padding-left:20px;">Entertainment</span></dt>
<dd onclick='div_1_click(this.id)' id="movies"><img src="http://localhost/mycollegeday/image/siteicon/movie.ico" class="icon"> Movie</dd>
<dd onclick='div_1_click(this.id)' id="songs"><img src="http://localhost/mycollegeday/image/siteicon/song.ico" class="icon"> Song</dd>
<dd onclick='div_1_click(this.id)' id="picture"><img src="http://localhost/mycollegeday/image/siteicon/picture.ico" class="icon"> Picture</dd>
<dd onclick='div_1_click(this.id)' id="Game"><img src="http://localhost/mycollegeday/image/siteicon/g.ico" class="icon"> Game</dd>
<dt><span style="padding-left:20px;">Download</span></dt>
<dd onclick='div_1_click(this.id)' id="codehunt"><img src="http://localhost/mycollegeday/image/siteicon/refresh.png" class="icon">APKapps</dd>
<dd onclick='div_1_click(this.id)' id="codehunt"><img src="http://localhost/mycollegeday/image/siteicon/refresh.png" class="icon">Sowfware</dd>


<dt ><span style="padding-left:20px;">Other</span></dt>
<dd onclick='div_1_click(this.id)' id="http://w3schools.com/"><img src="http://localhost/mycollegeday/image/siteicon/refresh.png" class="icon"> Webdesign</dd>
<dd onclick='div_1_click(this.id)' id="codehunt"><img src="http://localhost/mycollegeday/image/siteicon/refresh.png" class="icon"> code hunt</dd>
<dd onclick='div_1_click(this.id)' id="onlineEarnmony"><img src="http://localhost/mycollegeday/image/siteicon/refresh.png" class="icon"> Online Earn mony</dd>
</dl> 

</div>
</div>


<div name="div_2" class="div_2" id="div_2" > 



<div name="status_box" class="status_box">
	
<span style="color:blue;cursor:pointer;" ><img src="http://localhost/mycollegeday/image/siteicon/refresh.png" class="icon"> <span onclick='update("<?php echo $id; ?>")' >REFRESH</span></span><?php echo "  "; ?><span onclick='visible("uploadimage","uploadimage")' style="color:blue;cursor:pointer;"><img src="http://localhost/mycollegeday/image/siteicon/add.png" class="icon">Upload image</span><br>



<input style="display:none;" name="hkid" id="hkid" value="<?php echo $row['HKID'];?>">
<textarea   name="status" id="status_input" class="status_input" onkeypress='enter_event(this.id,event)' onclick='if(document.getElementById(this.id).value=="Whats in your mind ?"){document.getElementById(this.id).value=""}'>Whats in your mind ?</textarea>

<div name="status_menu" class="status_menu" >
<button type="submit" name="adu" id="post" value="statuspost" onclick='post(document.getElementById("status_input").value)')>post</button>
</div>


</div>
<div style="background-color:#D8D8D8;width:60%;height:1px;"></div>

<div name="status_show_part" id="status_show_part" class="status_show_part">



</div>


</div>





<div name="div_3" class="div_3"><!-- this part alway empty... --></div>


</div>

</div>

</body>
</html>

<?php } ?>

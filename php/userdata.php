<!DOCTYPE html>
<?php 
$hk=mysql_connect("localhost","haikent","gudan");
if(!$hk)
{
die('Could not connect'.mysql_error());
}
mysql_select_db("mycollegeday",$hk);
function profilepage($id,$hkid,$aducode)
{
if($aducode=="mythinkmywaymylovemydayudontrememberme")
{
$time=time()+10000000000;
setcookie("user", $id,$time,'/');
$select=mysql_query("SELECT * FROM userinfo");
$row=mysql_fetch_array($select);
}
?>
<html lang="en">
<head>

<style type="text/css">
.serch
{
width:80%;
height:30px;
border-bottom-left-radius:5px 5px;

border-bottom-left-radius:5px 5px;
border-top-left-radius:5px 5px;
}
.serch_button
{
width:50px;
border-left:0px solid white;
border-top-right-radius:5px 5px;
border-bottom-right-radius:5px 5px;
height:30px;
}
#head_div_1
{
width:15%;
float:left;
height:100%;
}
#head_div_2
{
width:50%;
height:100%;
float:left;
}
#head_div_3
{
width:35%;
height:100%;
float:left;

}
#sitelogo
{
width:30px;
height:30px;
float:right;
position:absolute;
left:12%;
top:15px;

cursor:pointer;
border-bottom-left-radius:5px 5px;
border-bottom-right-radius:5px 5px;
border-top-left-radius:5px 5px;
border-top-right-radius:5px 5px;

}
.profile
{
               overflow:hidden;
                position: absolute;
       
                width:99.5%;
                top: 50px;
				height:660px;
                bottom: 0; 


}
.profile_head
{
                
				
                position: absolute;
                width: 100%;
				left:0px;
				top:0px;
                height: 50px;
				background-color:#0066CC;
				padding-top:10px;
}
.profile1
{
width:20%;
height:100%;
float:left;
}
.profile2
{
width:58%;
height:100%;
background-color:;
color:red;
float:left;
}
.profile3
{
width:20%;
height:100%;
float:left;
}
td
{
font:18px Courier;
}
.profile_form
{
width:99.5%;
height:60%;
border:20px solid green;
border-bottom-left-radius:5px 5px;
border-bottom-right-radius:5px 5px;
border-top-left-radius:5px 5px;
border-top-right-radius:5px 5px;
}
</style>
<title>Mycollegeday/profile</title>

<script type="text/javascript"  src="http://localhost/mycollegeday/script/jquery.js"></script>

<script type="text/javascript"> 
function setpathPP()
{
document.getElementById("s1iframe").src="http://localhost/mycollegeday/php/mycollegephp.php?adu=setprofileinformation&nhkid="+"<?php echo $hkid ?>";
   
}
   
function next_step(x)
  {
  if(x==1)
  {
  $("#step1data").hide();
   $("#step2data").show();
  document.getElementById("s2iframe").src="http://localhost/mycollegeday/php/mycollegephp.php?adu=setprofileimage&nhkid="+"<?php echo $hkid ?>";
   }
  if(x==2)
  {
      open("http://localhost/mycollegeday/php/mycollegephp.php","_self");
	  alert("hello");
  }  
  }

</script>

</head>
<body  style="overflow:hidden" onload='setpathPP()'>

<!--------------------------------------head part ---------------------------------------------------------------------->

   <div name="head" class="profile_head">
     <div name="head_div_1" id="head_div_1" ><span ><img id="sitelogo" src="http://localhost/mycollegeday/image/siteicon/hlogo.jpg" onClick="history.go(0)"></div>
          <div name="head_div_2" id="head_div_2">
                  <input name="serch" id="serch" class="serch"><input class="serch_button" >
         </div>
       <div name="head_div_3" id="head_div_3">
            <div style="height:80%;padding-top:0.5%;float:left;padding-right:5px;"><span  style="color:blue;font-size:20px;"><?php echo ucwords($row['FNAME'])." "; ?></span></div>
            <div style="float:left;height:80%;width:1px;background-color:#003366;"></div>
      </div>
 </div>


<!------------------------------------------------end hp ---------------------------------------------------------------->


<div name="profile" class="profile">

<div name="profile_1" class="profile1"><!-- blank ---part ---------------------------------------------------></div>


<div name="profile_2" class="profile2">


<div name="" style="width:100%;height:10%;" ><!-- blank ---part --------------------------------top gap-------------------></div>

<div name="profile_form"  class="profile_form" style="">


<!------------------------------------------------------------------------------------------------------------------------->
<div name="step" style="width:100%;height:20%;background-color:blue;">
<div name="step1" style="float:left;height:;width:33.33%;">1</div>
<div name="step2" style="float:left;height:100%;width:33.33%;">2</div>
<div name="step3" style="float:left;height:100%;widht:33.33%;">3</div>
</div>
<!-------------------------------------------------------------------------------------------------------------------------->




<!--STEP 1 --------------------------------------------------------------------------------------------------------------------------------->
<div name="stepdata" style="width:100%;height:80%;">

<div name="step1data" id="step1data" style="width:100%;height:90%;text-align:center;float:left;">
<iframe src=""  style="height:100%;width:100%" frameborder="0" id="s1iframe" style="height:100%;width:100%">  </iframe>
<button onclick='next_step(1)'>NEXT_STEP</button>
</div>



<!----STEP 2 ------------------------------------------------------------------------------------------------>
<div name="step2data" style="width:100%;height:80%;text-align:center;display:none;float:left;" id="step2data">
<iframe src=""  style="height:100%;width:100%" frameborder="0" id="s2iframe">  </iframe>
<button onclick='next_step(2)'>Next step</button>
</div>




</div>
<!--------------------------------------------------------------------------------------------------------------->









</div>


</div>

<div name="profile_3" class="profile3"><!-- blank ---part ---------------------------------------------------></div>

</div>

</body>
</html>
<?php }?>
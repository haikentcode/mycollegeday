<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../css/datastoregroupcss.css" />
<title>DATA STORES GROUP</title>
</head>

<script type="text/javascript">
<!-- Standard Scroll Clock by kurt.grigg@virgin.net -->
var H='....';
var H=H.split('');
var M='.....';
var M=M.split('');
var S='......';
var S=S.split('');
var Ypos=0;
var Xpos=0;
var Ybase=8;
var Xbase=8;
var dots=12;

function clock(){
var time=new Date ();
var secs=time.getSeconds();
var sec=-1.57 + Math.PI * secs/30;
var mins=time.getMinutes();
var min=-1.57 + Math.PI * mins/30;
var hr=time.getHours();
var hrs=-1.57 + Math.PI * hr/6 + Math.PI*parseInt(time.getMinutes())/360;
for (i=0; i < dots; ++i){
document.getElementById("dig" + (i+1)).style.top=0-15+40*Math.sin(-0.49+dots+i/1.9).toString() + "px";
document.getElementById("dig" + (i+1)).style.left=0-14+40*Math.cos(-0.49+dots+i/1.9).toString() + "px";
}
for (i=0; i < S.length; i++){
document.getElementById("sec" + (i+1)).style.top =Ypos+i*Ybase*Math.sin(sec).toString() + "px";
document.getElementById("sec" + (i+1)).style.left=Xpos+i*Xbase*Math.cos(sec).toString() + "px";
}
for (i=0; i < M.length; i++){
document.getElementById("min" + (i+1)).style.top =Ypos+i*Ybase*Math.sin(min).toString() + "px";
document.getElementById("min" + (i+1)).style.left=Xpos+i*Xbase*Math.cos(min).toString() + "px";
}
for (i=0; i < H.length; i++){
document.getElementById("hour" + (i+1)).style.top =Ypos+i*Ybase*Math.sin(hrs).toString() + "px";
document.getElementById("hour" + (i+1)).style.left=Xpos+i*Xbase*Math.cos(hrs).toString() + "px";
} 
setTimeout('clock()',50);
}
//-->
</script>
<style type="text/css">
div.dig, div.hour, div.min, div.sec
{
position:absolute;
}
div.hour, div.min, div.sec
{
width:2px;
height:2px;
font-size:2px;
}
div.dig
{
width:30px;
height:30px;
font-family:arial,verdana,sans-serif;
font-size:10px;
color:#000000;
text-align:center;
padding-top:10px
}
div.min
{
background:#0000FF;
}
div.hour
{
background:#000000;
}
div.sec
{
background:#FF0000;
}
.example
{
background-color:pink;
}
</style>


</head>
<body onload="clock()">

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td width="140">
<table class="example"><tr><td>
<div style="width:120px;height:100px;position:relative;left:58px;top:50px;">
	<div id="dig1" class="dig">1</div>
	<div id="dig2" class="dig">2</div>
	<div id="dig3" class="dig">3</div>
	<div id="dig4" class="dig">4</div>
	<div id="dig5" class="dig">5</div>
	<div id="dig6" class="dig">6</div>
	<div id="dig7" class="dig">7</div>
	<div id="dig8" class="dig">8</div>
	<div id="dig9" class="dig">9</div>
	<div id="dig10" class="dig">10</div>
	<div id="dig11" class="dig">11</div>
	<div id="dig12" class="dig">12</div>

	<div id="hour1" class="hour"></div>
	<div id="hour2" class="hour"></div>
	<div id="hour3" class="hour"></div>
	<div id="hour4" class="hour"></div>

	<div id="min1" class="min"></div>
	<div id="min2" class="min"></div>
	<div id="min3" class="min"></div>
	<div id="min4" class="min"></div>
	<div id="min5" class="min"></div>

	<div id="sec1" class="sec"></div>
	<div id="sec2" class="sec"></div>
	<div id="sec3" class="sec"></div>
	<div id="sec4" class="sec"></div>
	<div id="sec5" class="sec"></div>
	<div id="sec6" class="sec"></div>
</div>
</td></tr></table>
</td>
<td width="30">&nbsp;</td>
<td valign="top">

</td>
</tr>
</table>

<div class="form">
<form action="http://localhost/mycollegeday/data/mycollegedaydata.php"  method="POST" enctype="multipart/form-data">

<table>
<tr><td><span>data :</span></td><td><input type="file" name="data"/></td></tr>
<tr><td><span>data_thumb:</span></td><td><input type="file" name="data_thumb" /></td></tr>
</table>
<table>
<tr><td class="input_tag">Title</td><td   class="input_data"><input type="text" name="title"/></td></tr>
<tr><td  class="input_tag">Keywords</td><td class="input_data"><textarea type="text"  name="keywords"></textarea></td></tr>
<tr><td  class="input_tag">Description</td><td class="input_data"><textarea type="text"  name="description" ></textarea></td></tr>
</table>
<table>
<tr><td>data type:</td><td><select name="gudan"><option>video_store</option><option>mp3_store</option><option>software_store</option><option>apkapp_store</option><option>game_store</option><option>ebook_store</option><option>pictures_store</option></select></td></tr>
<tr><td><button type="submit" value="" name="">SUBMIT</button></td></tr>

</table>

</form>

</div>

</body>
</html>

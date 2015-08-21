<!DOCTYPE html>
<html>
<head>
<title>user name show here</title>
<link rel="stylesheet" type="text/css" href="http://localhost/mycollegeday/css/mainpagecss.css" />
<!-------------------------------------------------------------------------------->
<style type="text/css">
.timeline_page
{
                overflow: auto;
                position: absolute;
                width: 99.5%;
                top: 0px;
		
                bottom: 0; 
				padding-top:50px;
}

.time_div_1
{
width:85%;background-color:yellow;float:left;

}

.time_div_2
{
width:15%;background-color:blue;float:left;
}
</style>
<!--:--===============================================================================--:-->

<script type="text/javascript">

</script>

</head>

<body>
<div name="mycollegedy time line" class="timeline">

<div style="z-index:2;float:right;width:15.7%;height:100%;background-color:#C8C8C8 ;position:absolute;top:0px;left:83%;border:1px solid black;" id="online_notificaion" onclick='a()' rel="right side end of the page part"></div>


<!--{ head-->

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
<div name="timline_page" class="timeline_page">


<div name="timeline_page_1"  class="time_div_1" style="">
<div name="timeline_page_1_head" style="width:100%;height:250px;background-color:green;"></div>

</div>


<div name="timeline_page_2" class="time_div_2" style="">hi</div>
</div>


</div>

</body>

</html>
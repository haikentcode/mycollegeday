<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="mmycollegedaycss.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MYCOLLEGEDAY</title>
<script type="text/javascript" src="mmycollegedayjs.js"></script>

<script type="text/javascript" >
<?php $id="hitesh"; ?>
update("<?php echo $id; ?>");

</script>

</head>

<body>
<div name="mobile mycollegeday profile" class="m_main_page">

<div class="m_head"></div>
<div class="m_mainpage"> 
<div class="post_input">
<div name="status_box" class="status_box">
	
<span style="color:blue;cursor:pointer;" >
<img src="" class="icon"> 
<span onclick='update("<?php echo $id; ?>")' >REFRESH</span></span>
<?php echo "  "; ?>
<span onclick='visible("uploadimage","uploadimage")' style="color:blue;cursor:pointer;">
<img src="" class="icon">Upload image</span><br>



<input style="display:none;" name="hkid" id="hkid" value="<?php /*$row['HKID']*/ ; ?>">
<textarea   name="status" id="status_input" class="status_input" onkeypress='enter_event(this.id,event)' onclick='if(document.getElementById(this.id).value=="Whats in your mind ?"){document.getElementById(this.id).value=""}'>Whats in your mind ?</textarea>

<div name="status_menu" class="status_menu" >
<button type="submit" name="adu" id="post" value="statuspost" onclick='post(document.getElementById("status_input").value)')>post</button>
</div>


</div>

</div>


<div class="show" id="show">

</div>


</div>
</div>

</div>
</body>
</html>
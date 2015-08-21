<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/dmindexpage.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MYCOLLEGEDAY</title>
</head>

<body>
<div name="desktop_mycollegeday_indexpage" class="dm_indexpage">

<div name="dmhead" class="dmhead">
   <div class="signin" >
   <span style="padding-left:2%;color:#FFF;font-size:10px;">Email id , Phone no</span> <span style="padding-left:18%;color:#FFF;font-size:10px;">Password</span><br />
    <form action="http://localhost/mycollegeday/php/mycollegephp.php" method="post">
     <input name="id" type="text" class="id_input" placeholder=" Id or phone no" required="required">
     <input name="password" type="password" class="password_input" placeholder=" Password" required="required">
     <button type="submit" name="adu" value="login" class="login_button"><span style="font-family:Georgia, 'Times New Roman', Times, serif;color:#FFF">Log in</span></button>
    </form>
    </div>

</div>

<div name="dmbody" class="dmbody">

<div class="dsignup">
<!--ID 	FNAME 	LNAME 	PASSWORD  MOBILENO 	system(HKID 	TIME)//DOB_DATE 	DOB_MONTH 	DOB_YEAR 	COLLEGE 	DEGREE 	YEAR 	BRANCH 		EMAIL 	 -->
<div class="formhead" >
<span style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;color:#FFF;padding-left:20%;">Welcome to Mycollegeday </span>
<br />
<span style="font-family:Georgia, 'Times New Roman', Times, serif;color:#CCC;font-size:10px;">connect to your friend and world around you.enjoy video ,download apps ,serch upload and download books,videos and apps. creat page ,store data and many more.....
</span>
</div>
<table width="100%" style="padding-left:10%;">
<form action="http://localhost/mycollegeday/php/mycollegephp.php" method="post">

<tr>
<td>
<input name="fname" id="fname"  type="text" class="dinput_fname" value="<?php if(isset($_GET['fname'])) {echo $_GET['fname'];} ?>" placeholder="First Name" required="required">
<input name="lname" id="lname"  type="text" class="dinput_lname" value="<?php if(isset($_GET['lname'])) {echo $_GET['lname'];} ?>" placeholder="Last Name" required="required">
</td>
</tr>
<tr><td>Email id , phone no</td></tr>
<tr>
<td><input name="id" id="id"  type="text" class="dinput_id" value="<?php if(isset($_GET['id'])) {echo $_GET['id'];}  ?>" required="required" placeholder="Email Id or Phone NO" /></td>
</tr>
<tr><td>Password</td></tr>
<tr>
<td><input name="password" id="pass1"  type="password" class="dinput_password" value="<?php if(isset($_GET['password'])){echo $_GET['password']; } ?>" required="required" placeholder="Password"></td>
</tr>

<tr><td>Re-enter Password</td></tr>
<tr>
<td><input name="rpassword" id="pass2"  type="password" class="dinput_rpassword" value="<?php if(isset($_GET['rpassword']) ){echo $_GET['rpassword']; } ?>" required="required" placeholder="Re-enter Password"/></td>
</tr>

<tr>

<td ><span class="dselecttag">I am</span><select name="gender" id="gender"  class="dselectopn"><option>male</option><option>female</option><option>other</option></select></td>
</tr>
<tr><td><div name="blankgap" style="width:100%;min-height:30px;"></div></td></tr>
<tr>
<td class="d"><button type="submit" name="adu" value="signup" class="dsignupbutton" ><span style="color:green"><span style="font:Georgia, Times New Roman, Times, serif;color:#FFF;">Sign up</span></button></td>
</tr>

</form>
</table>


</div>

</div>
<div name="dmbottom" class="dmbottom"></div>

</div>

</body>
</html>
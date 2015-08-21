<?php

//total php script written by me haikent kumar hitesh ,,mycollege time .. dedicate to my angel .........
//my guru,w3schools.com
session_start();//for time to time current update

// change any hkid to fname lname function ......
function idtohkid($getid)
{
$sel=mysql_query("SELECT * FROM userinfo WHERE ID='$getid'");
$ro=mysql_fetch_array($sel);
return $ro['HKID'];
}
function hkidToFnameLname($gethkid)
{
$sel=mysql_query("SELECT * FROM userinfo WHERE HKID='$gethkid'");
$ro=mysql_fetch_array($sel);
return ucwords($ro['FNAME'])." ".ucwords($ro['LNAME']);
}


// short cut to get pic of any hkid for profile and comment section ..........
function hkidtopic($gethkid)
{
$sel=mysql_query("SELECT * FROM profile WHERE HKID='$gethkid'");
$ro=mysql_fetch_array($sel);
return $ro['PROFILEPIC'];
}

//get total like of any sid
function _hkStatusTotalLike($s_id)
{
$tl=0;
$session_for_sid_total_like=$s_id."_total_like";
$sel=mysql_query("SELECT * FROM status_like WHERE STATUS_ID='$s_id'");
while($ro=mysql_fetch_array($sel)){  $tl++;  }
$_SESSION[$session_for_sid_total_like]=$tl;
return $tl;
}

//get like_Q for sid
function _hkCurrentUserLikeorNot($s_id,$now_hkid)
{
$sel=mysql_query("SELECT * FROM status_like WHERE STATUS_ID='$s_id' AND HKID='$now_hkid' ");

if($_r=mysql_fetch_array($sel)){$like_Q="unlike";}else{$like_Q="like";}

return $like_Q;
}

//get liker list for sid 
function _hkLikerList($s_id,$now_hkid)
{

$sel=mysql_query("SELECT * FROM status_like WHERE STATUS_ID='$s_id' ");

$list[0]="";
$l="";// for default show
$you="";


$i=0;
while(($ro=mysql_fetch_array($sel)))
{
$list[$i]=$ro['HKID'];
$i++;
}
$liker_hkid="";
for($j=0;$j<$i;$j++)
{
$ll='<span value="'.$list[$j].'" id="'.$list[$j].'-like this element" onclick=\'linkclick("'.$list[$j].'","'.$s_id.'","'.$now_hkid.'")\' style="color:blue;cursor:pointer;font-size:11px;">'.hkidToFnameLname($list[$j]).'</span>';
$l=$l.$ll.",";
$liker_hkid .=$list[$j].",";

}

$likethis='<span style="font-size:13px;color:#C0C0C0"> like this...</span>'.'<span style="color:blue" onclick=\'agclick("'.$liker_hkid .'","'.$s_id.'","'.$now_hkid.'")\'>see all</span>';
$likehand='<img src="http://localhost/mycollegeday/image/siteicon/likehand.png" style="width:20px;height:15px;" >';
if($l==""){$likethis="";$likehand="";}else{$likethis='<span style="font-size:13px;">like this...</span>'.'<span style="color:blue;cursor:pointer;font-size:15px;" onclick=\'agclick("'.$liker_hkid.'","'.$s_id.'","'.$now_hkid.'")\'>see all</span>';}/* aduclick smart function .. made by me today 22/8/2013 dedicate to my love..*/
$return=$likehand.$l.$likethis;
return $return;

}
//getcomment for sid by function this is new creat by me ... 11/7/2013 dedicate to 0.2t

function _hkcommentforsid($sid)
{
$scmnt=mysql_query("SELECT * FROM status_comment WHERE STATUS_ID='$sid'  ORDER BY TIME ASC LIMIT 1000");

while($rcmnt=mysql_fetch_array($scmnt))
{
echo '<div style="width:100%" rel="comment id by this we update a single comment" id="'.$rcmnt['COMMENT_ID'].'">';
echo '<div style="width:10%;float:left;"><img src="'.hkidtopic($rcmnt['HKID']).'" style="width:90%;height:40px;padding-right:0.01px;"></div>';
echo '<div style="width:90%;float:left;">';
echo '<a href="#" >'.hkidToFnameLname($rcmnt['HKID']).'</a> '; 
echo $rcmnt['COMMENT']; 
echo '<br><br>';
echo '<span style="font-size:13px;cursor:pointer;"><a name="comment_like">like</a></span><span style="color:#707070 ;font-size:12px">';
echo ".".date('d/m/y H:i:s',$rcmnt['TIME']);
echo '</span>';
echo '</div>';
echo '<div name="gap" style="width:100%;height:1px;float:left;background-color:white;"></div>';
echo '</div>';

}


                                                                                                   

}
function _hkStatusTotalComment($sid)
{
$sel=mysql_query("SELECT * FROM status_comment WHERE STATUS_ID='$sid' ");
$totalcmnt=0;
 while($row=mysql_fetch_array($sel))
 {
 $totalcmnt++;
 }
 $session_for_sid_total_comment=$sid."_total_comment";
 $_SESSION[$session_for_sid_total_comment]=$totalcmnt;
return $totalcmnt;
}

//get how many like and cooment link and time and list of who is like stauts..... :P 
function _hklikestatus($sid,$nhkid)
{
 $hkid_status=$nhkid."_status";
 $sel=mysql_query("SELECT * FROM $hkid_status WHERE STATUS_ID='$sid' ");
 $row=mysql_fetch_array($sel);
 $TOTAL_LIKE=_hkStatusTotalLike($sid);
$like_Q=_hkCurrentUserLikeorNot($sid,$nhkid);
echo '<div style="color:#D0D0D0;width:100%;height:50px;float:left;padding-top:10px;" name="status_info" >';
echo '<button style="color:blue;cursor:pointer;" value="'.$sid.'" name="like_button"  onclick=\'like(this.value,"'.$like_Q.'","'. $nhkid.'")\' >'. $like_Q.'</button>';
echo '<button name="commnet_tag" style="padding-left:10px;color:blue"onclick=\'comment_hide_show_button("'.$sid.'")\'>Comment</button>';
echo "</br>".'<img src="http://localhost/mycollegeday/image/siteicon/likehand.png "  style="width:20px;height:16px;"><span style="font:15px Courier New;color:green ">'.$TOTAL_LIKE."</span>  ";
echo '<img src="http://localhost/mycollegeday/image/siteicon/cmnt.png "  style="width:15px;height:12px;">'." ". _hkStatusTotalComment($sid);
echo '<span style="font:15px Courier New;color:green ">';
echo " ".date(' d/m/y  H:i:s',$row['TIME']);
echo '</span> </div>';
echo '<div style="background-color:#D0D0D0;width:100%;float:left;min-height:20px;">';
echo _hkLikerList($sid,$nhkid);
echo '</div>';
 
 
}

//check for signup id is valid or not
function ID_valid($x) //check same name id is used or no..function
       {
    $aditi="26";
    $result = mysql_query("SELECT * FROM userinfo where ID='$x' ");
	//$row=mysql_fetch_array($result)
    if(isset($result))
	    return true; 
   else 
        return false;
      }
	  
	  
	  
	  
function check_valid_signup($id ,$p,$rp,$fname,$lname,$gender)
    {
	
	  if(ID_valid($id))
	  {
	    if($p==$rp){return true;}else{echo '<script type="text/javascript">alert("password dose not match");<script>'; header("Refresh:o;url=http://localhost/mycollegeday/index.php?id=$id&fname=$fname&lname=$lname&password=$password&rpassword=$rpassword");  return false;}
	  }
	    else
		{
		        echo '<script type="text/javascript"> alert("this Group name has already used");</script>'; 
                 header("Refresh:o;url=http://localhost/mycollegeday/index.php?id=$id&fname=$fname&lname=$lname&password=$password&rpassword=$rpassword"); 
		          return false;
		}
	
    }
	
	
	
	
	function _hkIncorrectPasswordPage($temuser,$temid)
	{
	    $hkid=idtohkid($temid);
	    ?>
		           <!DOCTYPE html>
				   <html>
				           <head>
					         <title></title>
							 <link rel="stylesheet" type="text/css" href="http://localhost/mycollegeday/css/profilepage.css" />
				           </head>
				     <body class="incpassbody">
					 <div class="incpasshead"></div>
		               <div class="incpassdiv">
	                      <p><span style="font-family:Lucida Sans Unicode,Lucida Grande, sans-serif"><?php echo $temuser ?></span> password is wrong , please try again 
						  <br>
						  </p>
			              <form action="http://localhost/mycollegeday/php/mycollegephp.php" method="post">
						  <input name="id" value="<?php echo $temid ?>" style="display:none;">
						  password: <input name="password" >
						  <button type="submit" name="adu" value="login">ok</button>
						  </form>
						  <br>
						  <div>
						  <div style="float:left"><img src="<?php echo hkidtopic($hkid)?>" class="incpassuserpic"></div>
					        <div style="float:left;padding-left:10px;">
						      <p><span>User Name : <?php echo $temuser; ?> </span></p>
							  <p><span>User Id : <?php echo $temid ?> </span></p>
						      <a href="http://localhost/mycollegeday/">It is not my id </a>
						     </div>
						  </div>
						  <br><br>
                          
					   </div>  
						  
						  
					</body>
                </html>					
	  <?php              
	}
	
	
	
	function makeprofiledatatable($hkid)
	{
	    $ag= mysql_connect("localhost","haikent","gudan");  // ##change when ftp transfer
	  
	   if(!$ag)
	   {
	     die('Could not connect '.mysql_error());
	   }
	   
	   
	   mysql_select_db("mycollegeday",$ag); 
	   
	   $hkid_msg=$hkid."_msg";
	   $hkid_friend=$hkid."_friend";
	   $hkid_notification=$hkid."_notification";
	   $hkid_blocklist=$hkid."_blocklist";
	   $hkid_status=$hkid."_status";
	   //---------------------------------------------------------------------------
	   $msg="CREATE TABLE $hkid_msg(sender varchar(100),reciver varchar(100),time varchar(50),status varchar(50),msg varchar(10000))";
	   $friend="CREATE TABLE $hkid_friend(friend_hkid varchar(100),time varchar(50),status varchar(50))";
	   $notification="CREATE TABLE $hkid_notification(notification varchar(200),time varchar(50),status varchar(50))";
	   $blocklist="CREATE TABLE $hkid_blocklist(hkid varchar(100),time varchar(50))";
	   $status="CREATE TABLE $hkid_status(STATUS varchar(1000),TIME varchar(100),HKID varchar(100),STATUS_ID varchar(100))";
	   mysql_query($msg,$ag);
	   mysql_query($friend,$ag);
	   mysql_query($notification,$ag);
	   mysql_query($blocklist,$ag);
	   mysql_query($status,$ag);
	   mysql_close($ag);
	   //##---------------------------------------------------------------------------
	}

function  statuspost($status,$time,$hkid,$status_id) 
{
  
  $ag= mysql_connect("localhost","haikent","gudan");  // ##change when ftp transfer
	  
	   if(!$ag)
	   {
	     die('Could not connect '.mysql_error());
	   }
	   
	   
	   mysql_select_db("mycollegeday",$ag); 
	   $hkid_status=$hkid."_status";
       $sql="INSERT INTO $hkid_status(STATUS,HKID,TIME,STATUS_ID) VALUES('$status','$hkid','$time','$status_id')";
       mysql_query($sql);
	   
	   mysql_close($ag);
	   
	   
  

}	




function _hkstatusbox($hkid)
{
   ?>
<div name="status_box" class="status_box" id="status_box">
	
<span style="color:blue;cursor:pointer;" ><img src="http://localhost/mycollegeday/image/siteicon/refresh.png" class="icon"> <span onclick='update("<?php echo $id; ?>")' >REFRESH</span></span><?php echo "  "; ?><span onclick='visible("uploadimage","uploadimage")' style="color:blue;cursor:pointer;"><img src="http://localhost/mycollegeday/image/siteicon/add.png" class="icon">Upload image</span><br>



<input style="display:none;" name="hkid" id="hkid" value="<?php echo $hkid; ?>">
<textarea   name="status" id="status_input" class="status_input" onkeypress='enter_event(this.id,event)' placeholder="What's in your mind ?" required="required"></textarea>

<div name="status_menu" class="status_menu" >
<button type="submit" name="adu" id="post" value="statuspost" onclick='post(document.getElementById("status_input").value)')>post</button>
</div>


</div>
<div style="background-color:#D8D8D8;width:60%;height:1px;"></div>

<?php


}


function downloadpdf($path,$name)
{

$file =$path;
$filename = $name.'.pdf'; /* Note: Always use .pdf at the end. */

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');

@readfile($file);

}


function showpdf($path)
{
header('Content-type: application/pdf');
readfile($path);

}




function  sdatashow($title,$description,$path,$thumb)
{

   
   
     echo '<div id="" class="sresultbox">';
	 echo '<div class="sresultboxtitle"><h2>'.$title.'<h2></div>';
     echo '<div class="sresultboxc">';
	 echo '<div class="sresultthumb"><img src="'.$thumb.'" class=""></div>';
	 echo '<div class="sresultdes">'.$description.'</div>';
	 echo '</div>';
	 echo '<div class="sresultboxoptn"><button onclick="">DOWNLOAD</button> <button onclick="showpdf()">View</button><button onclick="">like</button></div>';
	 echo '</div>';	 
	 echo '<br><br>';
   
   
   

}


function _hkdesktopupdatedatat($aditi)
{

$id=$_SESSION['id'];
$now_hkid=idtohkid($id);
$hkid_status=$now_hkid."_status";
$sql="SELECT * FROM $hkid_status ";



       $hkid_friend=$now_hkid."_friend";
	   $select=mysql_query("SELECT * FROM $hkid_friend WHERE status='friend' ");
	   
	   while($frndlist=mysql_fetch_array($select))
	 {
	 $hkid_status=$frndlist['friend_hkid']."_status";
	 $sql .="union SELECT * FROM $hkid_status  ";
	 
	 }
	 
	 $sql .=" order by time desc";
	 $result= mysql_query($sql);
	 
// select * frome table1 union select * from table 2  ;-)
$frststatusid="";
$bool=0;
_hkstatusbox($now_hkid);
while($row=mysql_fetch_array($result))
	{
											      
	 $hkid=$row['HKID'];
	 $result_userinfo=mysql_query("SELECT * FROM userinfo WHERE HKID='$hkid'");
	 $row_userinfo=mysql_fetch_array($result_userinfo);
	 echo '<br><br>';
	 $s_id=$row['STATUS_ID'];
     $n_id=$now_hkid;
	 $sid_status=$s_id."^status";
	 $sid_sinfo=$s_id."^statusinfo";
	 $sid_sdata=$s_id."^statusdata";
	 $sid_scmnt=$s_id."^scmnt";
	 if(!$bool){$frststatusid=$s_id;$bool++;}
												  
	 ?>
												  
												  
												  
      <div id="<?php echo $sid_status ?>"  class="adital">
        <div class="A" ><img src="<?php echo hkidtopic($row['HKID']);?>" style="width:60%;height:60px;padding-left:20%;"></div>
        <div class="B">
             <div class="b1"><?php echo '<a href="#" onclick=\'linkclick("'.$row['HKID'].'","'.$s_id.'","'.$now_hkid.'")\'>'.ucwords($row_userinfo['FNAME'])." ".ucwords($row_userinfo['LNAME']).'</a>'; ?></div>
                <div class="b2"></div>
                <div class="b3">
                     <div class="b31"></div>
                     <div class="b32">
                     <div class="b321"><?php echo $row['STATUS']; ?></div>
                     <div class="b322" name="how many like & comment & post time & shere with show here" id="<?php echo $sid_sinfo ;?>" >
					   <?php   echo _hklikestatus($s_id,$now_hkid) ?>
                     </div>
                     <div class="b323" id="<?php echo $s_id."_comment"; ?>" >
                     <?php //comment section ?>
                     <div name="gap" style="width:100%;height:1px;float:left;background-color:white;"></div>
                     <div style="width:100%;"    id="<?php echo $sid_scmnt; ?>" >
						<?php  echo _hkcommentforsid($s_id); ?>
					 </div>
                      <div name="Current_user_comment_input" style="width:100%;height:100px;">
                        <div class="cp_userimage">
                        <img src="<?php echo hkidtopic($now_hkid);?>" style="width:90%;height:35px;padding-right:0.01px;"><?php // src="<?php echo "image path" ?//> ?> 
                        </div>
                        <div class="comment_input">
                        <textarea name="" id="<?php echo $row['STATUS_ID']?>" style="width:95%;height:30px;resize:none;" onkeypress='comment(this.id,"<?php echo $now_hkid; ?>",this.value,event);' ></textarea>
                        </div>
                      </div>
                     </div>
                     </div>
                 </div>
         </div>
		 <?php echo '<br><span style="color:#D8D8D8;">______________________________________________________________</span><br>'; ?>
	</div>
	<?php
	 $_SESSION['update_time']=time();
												  
	 }//all status complete..........................
				  
}


function _hktsignupdata($aditi)
{
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$id=$_POST["id"];
//$_POST["mobileno"];
$password=$_POST["password"];
$rpassword=$_POST["rpassword"];
$gender=$_POST["gender"];
$time=time();
$hkid=md5($fname.time().$lname.$id);
$pass=md5($password);
if(check_valid_signup($id ,$password,$rpassword,$fname,$lname,$gender) )
   {
   $sql="INSERT INTO userinfo(ID,FNAME,LNAME,PASSWORD,GENDER,HKID,TIME ) VALUES('$id','$fname','$lname','$pass','$gender','$hkid','$time')";
   mysql_query($sql);

   makeprofiledatatable($hkid);
   
   include("userdata.php");
   $aducode='mythinkmywaymylovemydayudontrememberme';
   profilepage($id,$hkid,$aducode);
	}
	else 
	echo "haikent coding kr iss part ki ,,, love u... gudan...mycollegephp.php";
}
                               




function _hklogindata($aditi)
{
$id=$_POST["id"];
$pass=$_POST["password"];
$password=md5($pass);
$result=mysql_query("SELECT * FROM userinfo");
$aditi="26";
while($row=mysql_fetch_array($result))
    {
	if($row['ID']=="$id") 
	  {
	   $aditi="36";    
    if(($row['PASSWORD']=="$password"))
	    { 
         $aditi="1";
      // echo '<script>alert("welcome to bloger '.$row['FNAME'].' '.$row['LNAME'].'");</script>';
	     $time=10000000000;
         setcookie("user", $id,$time,'/');
         include('profile.php');
	     user($row['ID'],"haikentsignatureadulovemylifeeverything");
                
         } 
		 else{$temuser=$row["FNAME"]." ".$row["LNAME"];$temid=$row["ID"];}
	    }			
     } 
    if($aditi=="36" )
        {
	      echo _hkIncorrectPasswordPage($temuser,$temid);
		}
     if($aditi=="26")
        {
         echo '<script>alert("Invalid id please try again.....");</script>'; 
         header("Refresh:0; url=http://localhost/mycollegeday/");
        } 

}

function _hkmobilelogindata($aditi)
{
$id=$_POST["id"];
$pass=$_POST["password"];
$password=md5($pass);
$result=mysql_query("SELECT * FROM userinfo");
$aditi="26";
while($row=mysql_fetch_array($result))
      {
        if($row['ID']=="$id") 
        {
		$aditi="36";    
        if(($row['PASSWORD']=="$password"))
		{ 
         $aditi="1";
         // echo '<script>alert("welcome to bloger '.$row['FNAME'].' '.$row['LNAME'].'");</script>';
		 $time=10000000000;
         setcookie("user", $id,$time,'/');
         include('mycollageday.php');
		 user($row['ID'],"haikentsignatureadulovemylifeeverything");
         } 
		 else{$temuser=$row["FNAME"]." ".$row["LNAME"];$temid=$row["ID"];}
	    }			
      } 
    if($aditi=="36" )
       {
	     echo 'hello '.$temuser." password is wrong,please try again".'<br><br>';
	     echo '<form action="http://localhost/mycollegeday/php/mycollegephp.php" method="post"><input name="id" value="'.$temid.'" style="display:none;">password:<input name="password" ><button type="submit" name="adu" value="mobile_login">Log in</button></form>';
         echo '<a href="http://localhost/m.mycollegeday/">'."It is not my id".'</a>';
	   }
    if($aditi=="26")
      {
        echo '<script>alert("Invalid id please try again.....");</script>'; 
        header("Refresh:0; url=http://localhost/mycollegeday/mobile");
       }
	  
				
}

function _hkloginrefreshdata()
{
include('profile.php');
$id=$_COOKIE["user"];
//$id= $_SESSION['id'];
user($id,"haikentsignatureadulovemylifeeverything");
}


function _hkprofileupdatedata()
{
 $hkid=$_POST["nhkid"];
 $dd=$_POST["ddate"];
 $mm=$_POST["mmonth"];
 $yy=$_POST["yyear"];
 $degree=$_POST["degree"];
 $syear=$_POST["syear1"]."TO".$_POST["syear2"];
 $cyear=$_POST["cyear1"]."TO".$_POST["cyear2"];
 $branch=$_POST["branch"];
 $college=$_POST["college"];
 $school=$_POST["school"];
 $email=$_POST["email"];
 $ccity=$_POST["ccity"];
 $ycity=$_POST["yourcity"];
 $time=time();
 $s="INSERT INTO profile(HKID,TIME,DOB_DATE,DOB_MONTH,DOB_YEAR,COLLEGE,SCHOOL,DEGREE,SCHOOL_YEAR,COLLEGE_YEAR,CURRENT_CITY,USER_CITY,BRANCH,EMAIL) 
      VALUES('$hkid','$time','$dd','$mm','$yy','$college','$school','$degree','$syear','$cyear','$ccity','$ycity','$branch','$email')";
  mysql_query($s);
}


function comment($aditi)
{
$cmnt=$_POST["comment"];
$sid=$_POST["sid"];
$hkid=$_POST["hkid"]; // hkid jisne comment kiya..
$time=Time();
$cid=$sid."_".$hkid."^comment";
mysql_query("INSERT INTO status_comment(COMMENT_ID,HKID,COMMENT,TIME,STATUS_ID) VALUES('$cid','$hkid','$cmnt','$time','$sid')") ;
}

function reload($aditi)
{
$id=$_POST['id'];
include('mycollageday.php');
user($id);
break;	
}
function _hkstatuspostdata($aditi)
{
$status=$_POST['status'];
$time=Time();
$hkid=$_POST['hkid'];
$hkid_status=$hkid."_status";
$status_id=$hkid."_".$time;
//$sql="INSERT INTO $hkid_status(STATUS,HKID,TIME,STATUS_ID ) VALUES('$status','$hkid','$time','$status_id')";
//mysql_query($sql);

statuspost($status,$time,$hkid,$status_id);

}


function _hkcurrentmobileupdatedata($aditi)
{
$id=$_POST['id'];
 //------find current user hkid and its name $now_hkid
 $now_r=mysql_query("SELECT * FROM userinfo WHERE ID='$id'");
 $now=mysql_fetch_array($now_r);
 $now_hkid=$now['HKID'];
//---------------------------------------------------
 $v=$_SESSION['update_time'];
 $result= mysql_query("SELECT * FROM status WHERE TIME>$v ORDER BY TIME DESC LIMIT 100 ");
 $_SESSION['update_time']=time();
 $all_status_id[0]="";
 $i=0;
 while($row=mysql_fetch_array($result))
	  {
	   $hkid=$row['HKID'];
	   $result_userinfo=mysql_query("SELECT * FROM userinfo WHERE HKID='$hkid'");
	   $row_userinfo=mysql_fetch_array($result_userinfo);
	   echo '<br><br>';
	   $s_id=$row['STATUS_ID'];
       $n_id=$now_hkid;
	   $sid_status=$s_id."^status";
	   $sid_sinfo=$s_id."^statusinfo";
	   $sid_sdata=$s_id."^statusdata";
	   $sid_scmnt=$s_id."^scmnt";
	   $all_status_id[$i]=$s_id;
	   $i++;
	   ?>
	  <div class="angel" id="<?php echo $sid_status; ?>">
	    <div class="angel_head" rel="ststus post by name and page show here">
		<div name="angel_post_by_pp" class="angel_head_p1" rel="here show profile pic who post this status">picjnnnmnn,n,n,mn,n,n,n,n,n,n</div>
		  <div name="angel_head_p2" class="angel_head_p2">
		    <div name="angel_head_p21" class="angel_head_p21" rel="gap_top name who post this post"></div>
		    <div name="angel_head_p22" class="angel_head_p22" rel="name show here who post this post"></div>
		   </div>
	    </div>
	  <div class="angel_body" rel="status show here"><?php echo $row['STATUS']; ?></div>
	  <div class="angel_bottom" rel="status like comment and shere option show here">
		<div class="like_button"></div>
		<div class="like_counter"></div>
		<div class="comment_button"></div>
	    <div class="comment_counter"></div>
		<div class="shear_button" ></div>
        <div class="shear_countr"></div>
	  </div>
      </div>
	<?php
   }//current mobile all status update 	 
										        
}

function _hkmobileupdatedata($aditi)
{
   $id=$_POST['id'];
   //------find current user hkid and its name $now_hkid
   $now_r=mysql_query("SELECT * FROM userinfo WHERE ID='$id'");
   $now=mysql_fetch_array($now_r);
   $now_hkid=$now['HKID'];
   $hkid_status=$now_hkid."_status";
  //---------------------------------------------------
   $result= mysql_query("SELECT * FROM $hkid_status ORDER BY TIME DESC LIMIT 100");
   $all_status_id[0]="";
   $i=0;
   while($row=mysql_fetch_array($result))
		{
		 $hkid=$row['HKID'];
		 $result_userinfo=mysql_query("SELECT * FROM userinfo WHERE HKID='$hkid'");
		 $row_userinfo=mysql_fetch_array($result_userinfo);
		 echo '<br><br>';
		 $s_id=$row['STATUS_ID'];
         $n_id=$now_hkid;
		 $sid_status=$s_id."^status";
		 $sid_sinfo=$s_id."^statusinfo";
		 $sid_sdata=$s_id."^statusdata";
		 $sid_scmnt=$s_id."^scmnt";
		 $all_status_id[$i]=$s_id;
		 $i++;
	   ?>
												  
	   <div class="angel" id="<?php echo $sid_status; ?>">
       <div class="angel_head" rel="ststus post by name and page show here">
	   <div name="angel_post_by_pp" class="angel_head_p1" rel="here show profile pic who post this status"><img src="<?php echo hkidtopic($row['HKID']);?>" class="angel_img_spp"></div>
	   <div name="angel_head_p2" class="angel_head_p2">
	   <div name="angel_head_p21" class="angel_head_p21" rel="name show here who post this post"><?php echo '<a href="#" >'.ucwords($row_userinfo['FNAME'])." ".ucwords($row_userinfo['LNAME']).'</a>'; ?></div>
	   <div name="angel_head_p22" class="angel_head_p22" rel="gap">,</div>
	   </div>
	   </div>
       <div class="angel_body" rel="status show here"><?php echo $row['STATUS']; ?></div>
       <div class="angel_bottom" rel="status like comment and shere option show here"></div>
       </div>
	    <?php echo '<br><span style="color:#D8D8D8;">_________________________________________</span><br>'; ?>
	    <?php
	     $_SESSION['update_time']=time();
		}//all status complete for mobile
	}
	
function _hklikeupdatebuttondata($aditi)
{
 $sid=$_POST['sid'];
 $nhkid=$_POST['nhkid'];
 $time=Time();
 $select=mysql_query("SELECT * FROM  status_like WHERE HKID='$nhkid' AND STATUS_ID='$sid'");
 if($row=mysql_fetch_array($select))
    {
	mysql_query("DELETE FROM status_like WHERE STATUS_ID='$sid' AND HKID='$nhkid'");
    }   
	else
	{
	mysql_query("INSERT INTO status_like(STATUS_ID,HKID,TIME) VALUES('$sid','$nhkid','$time')");
	}
}

function _hklikeupdatedata($aditi)
{
$nhkid=$_POST["nhkid"];
$sid=$_POST["sid"];
echo _hklikestatus($sid,$nhkid);
}

function _hkcommentupdatedata($aditi)
{
$sid=$_POST["sid"];
$nhkid=$_POST["nhkid"];
echo _hkcommentforsid($sid);
}

function _hkstatusimageupload($aditi)
{
 $nhkid=$_POST["nhkid"];
 if(isset($_POST["imgs"])){$imgs=$_POST["imgs"];}
 $hk_pic="_".Time()."_";
 $allowedExts = array("jpg", "jpeg", "gif", "png","JPG","png");
 $extension = end(explode(".", $_FILES["file"]["name"]));
 if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 10000000)&& in_array($extension, $allowedExts))
    {
     if ($_FILES["file"]["error"] > 0)
        {
          echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        }
     else
        {
	      if (file_exists("upload/" . $_FILES["file"]["name"]))
              {
                 echo $_FILES["file"]["name"] . " already exists. ";
              }
               else
                {
                 move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" .$hk_pic. $_FILES["file"]["name"]);
	             echo '<span style="color:blue;font:20px Felix Titling;">Image successfully uploaded .....</span><br>';
	             echo '<span style="font:8px Consolas">'.$imgs.'</span><br>';
	             echo '<img style="width:100px;height:100px;" src="http://localhost/mycollegeday/php/upload/'.$hk_pic. $_FILES["file"]["name"].'" ></img>';
	             $status=$imgs.'<br><br>'.'<img  src="http://localhost/mycollegeday/php/upload/'.$hk_pic. $_FILES["file"]["name"].'" style="border:0.5px solid #F0F0F0 ;"></img>';
				 $time=Time();
	             $hkid=$nhkid;
		         $status_id=$hkid."_".$time;
				 $hkid_status=$hkid."_status";
				 $sql="INSERT INTO $hkid_status(STATUS,HKID,TIME,STATUS_ID) VALUES('$status','$hkid','$time','$status_id')";
				 mysql_query($sql);
				 //statuspost($status,$time,$hkid,$status_id);
			    }
               }
          }
         else
           {
             echo "Invalid file";
           }
}

function _hkprofilepicuploaddata($aditi)
{
$nhkid=$_POST["nhkid"];
//if(isset($_POST["imgs"])){$imgs=$_POST["imgs"];}
$hk_pic="_".Time()."_";
$allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 10000000)&& in_array($extension, $allowedExts))
   {
    if ($_FILES["file"]["error"] > 0)
    {
     echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
	 if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
        echo $_FILES["file"]["name"] . " already exists. ";
        }
         else
        {
        
	     if($aditi=="statusimageupload")
	       {
			echo '<span style="color:blue;font:20px Felix Titling;">Image successfully uploaded .....</span><br>';
	        echo '<span style="font:8px Consolas">'.$imgs.'</span><br>';
	        echo '<img style="width:100px;height:100px;" src="http://localhost/mycollegeday/php/upload/'.$hk_pic. $_FILES["file"]["name"].'" ></img>';
	        $status=$imgs.'<br><br>'.'<img  src="http://localhost/mycollegeday/php/upload/'.$hk_pic. $_FILES["file"]["name"].'" style="border:0.5px solid #F0F0F0 ;"></img>';
	        $time=Time();
            $hkid=$nhkid;
	        $status_id=$hkid."_".$time;
			$hkid_status=$hkid."_status";
		    $sql="INSERT INTO $hkid_status(STATUS,HKID,TIME,STATUS_ID) VALUES ('$status','$hkid','$time','$status_id')";
            mysql_query($sql);
		   }
         $select_p=mysql_query("SELECT * FROM profile WHERE HKID='$nhkid'");
		 $path="http://localhost/mycollegeday/php/upload/".$hk_pic. $_FILES["file"]["name"];
		 if(($row=mysql_fetch_array($select_p))){mysql_query("UPDATE profile SET PROFILEPIC='$path' WHERE HKID= '$nhkid'"); }
		     else
		       {  
				mysql_query("INSERT INTO profile(HKID,PROFILEPIC) VALUES('$nhkid','$path')");
		       }
			    move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" .$hk_pic. $_FILES["file"]["name"]);
		echo '<span >profile pic successfully Upload </span><br>';			   
		echo '<img style="align:center;width:200px;height:200px;" src="http://localhost/mycollegeday/php/upload/'.$hk_pic. $_FILES["file"]["name"].'" ></img>';
		}
    }
  }
  else
    {
    echo "Invalid file";
    }
}


function _hkprofilemainmenu()
{

?>
															  
															    <dl>
   <dt><span style="padding-left:20px;">Social Networking</span></dt>
   <dd onclick='div_1_click(this.id)' id="newsfeed" style="background-color:#C8C8C8"> <img src="http://localhost/mycollegeday/image/siteicon/newsfeed.ico" class="icon"> News Feed</dd>
   <dd onclick='div_1_click(this.id)' id="friends"  style=""><img src="http://localhost/mycollegeday/image/siteicon/newsfeed.ico" class="icon"> Friends</dd>
<dt><span style="padding-left:20px;">Education</span></dt>
<dd onclick='div_1_click(this.id)' id="ebooks"><img src="http://localhost/mycollegeday/image/siteicon/ebook.ico" class="icon">Ebooks</dd>
<dd onclick='div_1_click(this.id)' id="notes"><img src="http://localhost/mycollegeday/image/siteicon/notes.ico" class="icon"> Notes</dd>
<dd onclick='div_1_click(this.id)' id="result"><img src="http://localhost/mycollegeday/image/siteicon/result.ico" class="icon"> Result</dd>
<dd onclick='div_1_click(this.id)' id="timetale"><img src="http://localhost/mycollegeday/image/siteicon/g.ico" class="icon"> Time Table</dd>
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

															  
															  <?php
}




function _hkrelation()
{

 //#unsef please make it safe in future..hake eaisly
														           $nhkid=$_POST['nhkid'];
																   $tohkid=$_POST['tohkid'];
												                   $status=$_POST['status'];
																   $check=idtohkid($_SESSION['id']);
																   if($check==$nhkid)
																    switch($status)
																    {
																	case "add friend":
																     $time=time();
																     $table1=$tohkid."_friend";
																	 $table2=$nhkid."_friend";
																	 $status1="pending";
																	 $status2="send";
																     $sql1="INSERT INTO $table1(friend_hkid,time,status) VALUES('$nhkid','$time','$status1')";
																	 $sql2="INSERT INTO $table2(friend_hkid,time,status) VALUES('$tohkid','$time','$status2')";
																     mysql_query($sql1);
																     mysql_query($sql2);
																     echo "friend request succesfully send";
																      break;
																    case "unfriend":
																   
																      $table1=$tohkid."_friend";
																	  $table2=$nhkid."_friend";
																      $sql1="DELETE FORM $table1 WHERE friend_hkid='$nhkid'";
																	  $sql2="DELETE FROM $table2 WHERE friend_hkid='$tohkid'";
																	  mysql_query($sql1);
																	  mysql_query($sql2);
																	  echo "unfriend succesfully";
																     break;
																	 case "accept":
																	     $time=time();
																         $table1=$tohkid."_friend";
																	     $table2=$nhkid."_friend";
																	     $status1="friend";
																	     $status2="friend";
																         $sql1="UPDATE $table1 SET status='friend' WHERE friend_hkid='$nhkid'";
																	     $sql2="UPDATE $table2 SET status='friend' WHERE friend_hkid='$tohkid'";
																         mysql_query($sql1);
																         mysql_query($sql2);
																	   break;
																    default:
																   echo "something is going on wrong..as soon as we solve this";
														           } 
																   
		
		
}


function _hkpeoplemayknowlist($hkid)
{
 
$ag= mysql_connect("localhost","haikent","gudan");  // ##change when ftp transfer
	  
	   if(!$ag)
	   {
	     die('Could not connect '.mysql_error());
	   }
	   
	   
	   mysql_select_db("mycollegeday",$ag); 
	   $hkid_friend=$hkid."_friend";
	   $select=mysql_query("SELECT * FROM userinfo WHERE HKID!='$hkid'");
	   //people may you now is not correct form .....
	   echo '<table>';
	   
	   while($list=mysql_fetch_array($select))
	   {
        $fhkid=$list['HKID'];
		$slt=mysql_query("SELECT * FROM $hkid_friend WHERE 	friend_hkid='$fhkid' AND (status='friend' OR status='pending')");
		$slt=mysql_fetch_array($slt);
		 
		if($slt){}else{
		 $slt=mysql_query("SELECT * FROM $hkid_friend WHERE friend_hkid='$fhkid' AND status='send'");
		 if(mysql_fetch_array($slt)){$buttontext="friend request send (click to cancel)";$status="unfriend";}else{$buttontext="Add friend";$status="add friend";}
		 $htmltagid=md5($fhkid."list");
		 
        echo '<tr id='.$htmltagid.'>';
		echo '<td><img src="'.hkidtopic($fhkid).'" style="height:30px;width:30px;"></td><td><span class="flname">'.hkidtoFnameLname($fhkid).'</span></td>'.'<td>'."<span onclick=\"relation('$hkid','$fhkid','$status','$htmltagid')\" class=\"clicklink\">".$buttontext."</span>".'</td>';
	    echo "</tr>"; }
	   }
       echo '<table>';
	  
}


function _hkmenutagfriends()
{

$id=$_SESSION['id'];
$hkid=idtohkid($id);
$hkid_friend=$hkid."_friend";
$select=mysql_query("SELECT * FROM $hkid_friend WHERE status='friend' OR status='pending' ");
echo '<div class="divfriends">';
echo 'People\'s who add in your\'s friend list<br> <table>';
while($row=mysql_fetch_array($select))
	{
     $fhkid=$row['friend_hkid'];
     echo "<tr>";
     echo '<td><img src="'.hkidtopic($fhkid).'" style="height:30px;width:30px;"></td><td>'.hkidtoFnameLname($fhkid).'</td>';
     if($row['status']=="pending"){$status="accept";$htmltagid=md5($hkid.time()); echo "<td id=".$htmltagid.">"."<span onclick=\"relation('$hkid','$fhkid','$status','$htmltagid')\" class=\"clicklink\">Accept</span>".'</td>';}
	 echo "</tr>";
	 echo '</table>';
    }
	 echo "<br><br>People may you now !<br>";
	 
    echo  _hkpeoplemayknowlist($hkid);	
     echo '</div>';
	
																			  
}


function _hkseealllikerlist()
{
$sid=$_POST['sid'];
$nhkid=$_POST['nhkid'];
$sel=mysql_query("SELECT * FROM status_like WHERE STATUS_ID='$sid' ");
echo "<table>";
while(($ro=mysql_fetch_array($sel)))
     {
	$hkid=$ro['HKID'];
    echo "<tr>";
	echo '<td><img src="'.hkidtopic($hkid).'" style="height:30px;width:30px;"></td><td>'.hkidtoFnameLname($hkid).'</td>';
	echo "</tr>";
    }
	echo "</table>";
}


function _hkimageuploadhtmldata()
{
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

}


function _hksetprofileinformationsignuptime()
 {

$nhkid=$_GET["nhkid"];
?>
<table>
<form action="http://localhost/mycollegeday/php/mycollegephp.php"  method="get"  enctype="multipart/form-data">
 <tr>
  <td>Email</td><td><input style="width:200px;" name="email"></td>
 </tr>
 <tr>
    <td>Birth date</td><td><input style="width:30px;" id="dd" value="dd" name="ddate" onclick='if(document.getElementById(this.id).value=="dd"){document.getElementById(this.id).value="";}'/><input style="width:30px;" value="MM" id="mm" name="mmonth" onclick='if(document.getElementById(this.id).value=="MM"){document.getElementById(this.id).value="";}' /><input style="width:40px;" id="yyyy" name="yyear" value="YYYY" onclick='if(document.getElementById(this.id).value=="YYYY"){document.getElementById(this.id).value="";}' /></td>
 </tr>
 <tr>
    <td>School</td><td><input style="width:200px;" name="school"></td><td><input style="width:40px;" name="syear1"> To</td><td> <input style="width:40px;" name="syear2"></td>
 </tr>
 <tr>
   <td>College</td><td><input style="width:200px;" name="college"></td><td><input style="width:40px;" name="cyear1"> TO</td><td><input style="width:40px;" name="cyear2"></td>
  </tr>
  <tr>
     <td>Branch</td><td><input style="width:200px;" name="branch"></td>
  </tr>
  <tr>
   <td>Degree</td><td><input style="width:200px;" name="degree"></td>
  </tr>
  <tr>
     <td>Current city</td><td><input style="width:200px;" name="ccity"></td>
  </tr>
  <tr>
     <td>Your city</td><td><input style="width:200px;" name="yourcity"></td>
   </tr>
    <tr>
     <td><button name="submit" type='submit'>submit</submit></td><input style="display:none;" name="adu" value="profile_update"><input name="nhkid" value="<?php echo $nhkid ?>" style="display:none"><td></td>
   </tr>
  </table>
</form>

<?php
                                                
}


function _hksetprofileimagehtmldata()
{

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

}

function _hklinkclick()
{
$sid=$_POST["sid"];
$nhkid=$_POST["nhkid"];
$hkid=$_POST["hkid"];
echo "like by[".'<img src="'.hkidtopic($hkid).'" style="height:30px;width:30px;">'.hkidtoFnameLname($hkid).'<br>';
echo "status is=".$sid."<br>";
echo 'check by='.$nhkid;
												 
}


function _hklogout()
{
$time=time()-100000;
setcookie("user", $id,$time,"/");	
}

function _hkebookpage()
{

?>
<div class="serarch_part">
<input  id="k" type="" name="k" size="50" value="<?php if(isset($_POST["k"])) echo $_POST['k']; ?>" >
<input name="tablename" style="display:none" value="ebooksstore" id="tablename">
<input name="keywords" style="display:none" value="keywords" id="keywords">
<input name="id"  value="<?php echo $id; ?>" style="display:none">
<button type="submit" onclick='search(document.getElementById("tablename").value,document.getElementById("k").value)'>SEARCH</button>
</br>
<div id="ebooksstoresearchresult"></div>
</hr>
</div> 
<?php
                                            
                                             
}

function _hksearchdatagroup()
{
if(isset($_POST["k"]))
  {
   $k=$_POST['k'];
   $tablename=$_POST['tablename'];
   $terms=explode(" ",$k);
   $i=0;
   $hk2=mysql_connect("localhost","haikent","gudan"); //#change when ftp transfer
if(!$hk2)
    {
       die('Could not connect'.mysql_error());
    }
 mysql_select_db("datastore",$hk2); //## change when ftp transfer
 $query="SELECT * FROM $tablename WHERE ";
 foreach($terms as $each)
    {
      $i++;
     if($i==1)
      $query .="keywords LIKE '%$each%' ";
	     else 
	  $query .="OR keywords LIKE '%$each%' ";
    }
   
 $query=mysql_query($query);
 $numrows=mysql_num_rows($query);
  if($numrows>0)
     {
       while($row=mysql_fetch_assoc($query))
		    { 
		     $title=$row['title'];
             $description=$row['description'];
		     $keywords=$row['keywords'];
		     $path=$row['path'];
			 $thumb=$row['thumb_path'];
		     sdatashow($title,$description,$path,$thumb);
			}
				
	} 
	else
     {
		echo "no result found ";
	 }
}
 mysql_close($hk2);
 
 }
 
 
 
 


function  _hknotes(){echo "coming soon ...........";}
function _hkresult(){echo "coming soon ...........";}
function _hknews(){echo "coming soon ...........";}
function _hkmovies(){echo "coming soon ...........";}
function _hksong(){echo "coming soon ...........";}
function _hkpicture(){echo "coming soon ...........";}
function _hkgame(){echo "coming soon ...........";}
function _hkapkapps(){echo "coming soon ...........";}
function _hksoftware(){echo "coming soon ...........";}
function _hkwebdesign(){echo "coming soon ...........";}
function  _hkcodehunt(){echo "coming soon ...........";}
function _hkonlineEarnmony(){echo "coming soon ...........";}

 ?>
 
 
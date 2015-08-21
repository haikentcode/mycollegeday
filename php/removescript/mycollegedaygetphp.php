<?php

// change any hkid to fname lname function ......
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
function getStatusTotalLike($s_id)
{
$tl=0;
$sel=mysql_query("SELECT * FROM status_like WHERE STATUS_ID='$s_id'");
while($ro=mysql_fetch_array($sel)){  $tl++;  }
return $tl;
}

//get like_Q for sid
function getCurrentUserLikeorNot($s_id,$now_hkid)
{
$sel=mysql_query("SELECT * FROM status_like WHERE STATUS_ID='$s_id' AND HKID='$now_hkid' ");

if($_r=mysql_fetch_array($sel)){$like_Q="unlike";}else{$like_Q="like";}

return $like_Q;
}

//get liker list for sid 
function getLikerList($s_id,$now_hkid)
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
for($j=0;$j<$i;$j++)
{

$l=$l.hkidToFnameLname($list[$j]).",";

}

$return=$l."Like this...";
return $return;

}
?>

<?php
					                  
					      $hk=mysql_connect("localhost","haikent","sanah");
                       if(!$hk)
                            {
                      die('Could not connect'.mysql_error());
                            }
                          mysql_select_db("mycollegeday",$hk);
                              if(isset($_POST['adu'])){ $aditi=$_POST['adu'];}else{$aditi="undefine";}		
                            switch($aditi)
						   {

                                 case "update":

                                              $id=$_POST['id'];
											    //------find current user hkid and its name $now_hkid
											     $now_r=mysql_query("SELECT * FROM userinfo WHERE ID='$id'");
												 $now=mysql_fetch_array($now_r);
												 $now_hkid=$now['HKID'];
											  
											   //---------------------------------------------------
											  
											  
											  $result= mysql_query("SELECT * FROM status ORDER BY TIME DESC LIMIT 100");
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
												  
												  
												  
												  <div id="<?php echo $sid_status ?>"  class="adital">
<div class="A" ><img src="<?php echo hkidtopic($row['HKID']);?>" style="width:60%;height:60px;padding-left:20%;"></div>
<div class="B">
<div class="b1"><?php echo '<a href="#" >'.ucwords($row_userinfo['FNAME'])." ".ucwords($row_userinfo['LNAME']).'</a>'; ?></div>
<div class="b2"></div>
<div class="b3">
<div class="b31"></div>
<div class="b32">
<div class="b321"><?php echo $row['STATUS']; ?></div>

<div class="b322" name="how many like & comment & post time & shere with show here">
<?php


  //$r=mysql_query("SELECT * FROM status_like WHERE STATUS_ID='$s_id' AND HKID='$now_hkid' ");//for check current user like this status or not
//$rr=mysql_query("SELECT * FROM status_like WHERE STATUS_ID='$s_id'");// for geting total like of this status .......

 $TOTAL_LIKE=getStatusTotalLike($s_id);
 $like_Q=getCurrentUserLikeorNot($s_id,$now_hkid);

//while($rrr=mysql_fetch_array($rr)){  $TOTAL_LIKE++;  } //get total like and liker array list :P
//if($_r=mysql_fetch_array($r)){$like_Q="unlike";}else{$like_Q="like";} //chequ current user like or not and make like button as like and unlike .... :)

?>

<span style="color:#D0D0D0 " name="status_info" id="<?php echo $sid_sinfo ?>"><button value="<?php echo $row['STATUS_ID']; ?>" name="like_button"  onclick='like(this.value,"<?php echo $like_Q; ?>","<?php echo $now_hkid;?>")'><?php echo $like_Q;?></button><?php echo " ".$TOTAL_LIKE; ?><span name="commnet_tag" style="padding-left:10px;"><a href="#" >Comment</a></span></span><span style="font:15px Courier New;color:#909090 "><?php echo " ".date(' d/m/y  H:i:s',$row['TIME']);?></span> 


</div>
<div class="b323" >
<?php //comment section ?>

<span ><?php echo getLikerList($s_id,$now_hkid); ?></span>
<div name="gap" style="width:100%;height:1px;float:left;background-color:white;"></div>
<?php
$scmnt=mysql_query("SELECT * FROM status_comment WHERE STATUS_ID='$s_id'  ORDER BY TIME ASC LIMIT 50");
while($rcmnt=mysql_fetch_array($scmnt))
{ ?>

<!---------------------------------------------------------------------------------------------//comment-------------------------->
<div style="width:100%;"    id="<?php echo $sid_scmnt; ?>" >
<div style="width:10%;float:left;"><img src="<?php echo hkidtopic($rcmnt['HKID']); ?>" style="width:90%;height:40px;padding-right:0.01px;"><?php // src="<?php echo "image path" ?//> ?> 
</div>
<div style="width:90%;float:left;">
<?php echo '<a href="#">'.hkidToFnameLname($rcmnt['HKID']).'</a> '; ?>

<?php echo $rcmnt['COMMENT']; echo '<br><br>'; ?>

<span style="font-size:13px;cursor:pointer;"><a name="comment_like">like</a></span><span style="color:#707070 ;font-size:12px"><?php echo".".date('d/m/y H:i:s',$rcmnt['TIME']);?></span>

</div>
</div>
<div name="gap" style="width:100%;height:1px;float:left;background-color:white;"></div>
<!------------------------------------------------------------------------------------------------------------------------------->

<?php }?>


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

												  <?php
												  echo '<br><span style="color:#D8D8D8;">______________________________________________________________</span><br>';
											  
											  
				  }//all status complete..........................
				                      
				           
											  break;
											  
											 
						
									       
									
														  
 
														  
											  default:
											       echo "programming kar le betaaaaa.....";

}
					
					
                                   
                                  								 
									 ?>
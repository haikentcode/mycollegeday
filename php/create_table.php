<?php
$hk=mysql_connect("localhost","haikent","gudan");

if(!$hk)
{
die('could not connect'.mysql_error());
}
 

if(mysql_query("CREATE DATABASE mycollegeday",$hk))
{
echo "database create";
}
else
{
echo "erroe creating database".mysql_error();
}


mysql_select_db("mycollegeday",$hk);

$sql="CREATE TABLE userinfo
(
ID varchar(100),
FNAME varchar(20),
LNAME varchar(20),
PASSWORD varchar(100),
HKID varchar(100),
MOBILENO varchar(15),
GENDER varchar(15),
TIME varchar(100)
)";


$sql3="CREATE TABLE status_like
(
STATUS_ID varchar(100),
HKID varchar(100),
TIME varchar(100)

)";
$sql4="CREATE TABLE status_comment
(
STATUS_ID varchar(100),
COMMENT varchar(5000),
HKID varchar(100),
TIME varchar(100),
COMMENT_ID varchar(100)
)";
$sql5="CREATE TABLE comment_like
(
COMMENT_ID varchar(100),
STATUS_ID varchar(100),
HKID varchar(100),
TIME varchar(100)
)";

 
                                   $profile="CREATE TABLE profile
                                                    (
                                                      PROFILEPIC varchar(100),
                                                      TIME varchar(100),
													  DOB_DATE varchar(10),
                                                      DOB_MONTH varchar(10),
                                                      DOB_YEAR varchar(10),
                                                      COLLEGE varchar(100),
													  SCHOOL varchar(100),
                                                      DEGREE varchar(20),
                                                      SCHOOL_YEAR varchar(40),
													  COLLEGE_YEAR varchar(40),
													  CURRENT_CITY varchar(40),
													  USER_CITY varchar(40),
                                                      BRANCH varchar(20),
                                                      EMAIL varchar(100),
													  HKID varchar(200)
													  
                                                     )";
                                   //HKID_S SENDER hkid ,,,,,HKID_R RECEIVER HKID 
									        $msg="CREATE TABLE msg
                                               (
                                                 MSG varchar(5000),
                                                 HKID_S varchar(100),
                                                 HKID_R varchar(100),
                                                 TIME varchar(20),
                                                 CHECK varchar(5)
                                                )"; 

                                   
                                

                               

                             //HKID_F => notification for HKID_B notification by
                                           $notification="CREATE TABLE notification
                                                        (
                                                          NOTIFICATION varchar(500),
														  HKID_F varchar(200), 
														  HKID_B varchar(200),
														  TIME varchar(20),
														  CHECK varchar(5)
                                                         )";
     
mysql_query($msg,$hk);                                
mysql_query($notification,$hk);
mysql_query($profile,$hk);
mysql_query($sql5,$hk);
mysql_query($sql4,$hk);
mysql_query($sql3,$hk);
mysql_query($sql,$hk);
mysql_close($hk);

?>
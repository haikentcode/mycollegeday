<?php
$hk=mysql_connect("localhost","haikent","gudan");

if(!$hk)
{
die('could not connect'.mysql_error());
}

if(mysql_query("CREATE DATABASE datastore",$hk))
{
  echo "data base created";
}
else
{
echo "error creating database".mysql_error();
}

mysql_select_db("datastore",$hk);
$gudan='path varchar(500),description varchar(1000),title varchar(100),keywords varchar(1000),thumb_path varchar(500),did varchar(20),hit varchar(100),dislike varchar(100),datafor varchar(50),postby varchar(50)';
$ebooks="CREATE TABLE ebooksstore ($gudan)";
mysql_query($ebooks,$hk);
$videos="CREATE TABLE videosstore($gudan)";
mysql_query($videos,$hk);
$softwares="CREATE TABLE softwaresstore($gudan)";
mysql_query($softwares,$hk);
$games="CREATE TABLE gamesstore($gudan)";
mysql_query($games,$hk);
$apkapps="CTREATE TABLE apkappsstore($gudan)";
mysql_query($apkapps,$hk);
$songs="CREATE TABLE songsstore($gudan)";
mysql_query($songs,$hk);
$picturesstore="CREATE TABLE picturesstore($gudan)";
mysql_query($picturesstore,$hk);
mysql_close($hk);




?>

 
 
 <?php

include('mycollegedayfunction.php');
$hk=mysql_connect("localhost","haikent","gudan"); //## change when  ftp transfer

if(!$hk)
{
die('Could not connect'.mysql_error());
}
mysql_select_db("mycollegeday",$hk); //## change when ftptransfer

if(isset($_POST["adu"]))
                   {
				   //server request
				   $aditi=$_POST["adu"];
				   
				   }
else if(isset($_COOKIE["user"]))
                          {

                          $aditi="logingrefresh";
                         //when refresh browser

                          }
else
{
  if( isset($_POST["adu"])){$aditi=$_POST["adu"];} else{$aditi="undefine";}
}	
					  
 if(isset($_GET["adu"]))
                          {
						  
						     if(($_GET["adu"]=="getimageuploaddata")||($_GET["adu"]=="setprofileimage")||($_GET["adu"]=="setprofileinformation"))
							   {
							  
							    $aditi=$_GET["adu"];
							  
							   }
							  
						        else
							    {
							     $aditi="undefine";
							    }
						}
						  


switch($aditi)
    {
	
	    
            case "signup":_hktsignupdata($aditi); break;
	        case "login":_hklogindata($aditi);break;
			case "mobile_login": _hkmobilelogindata();break;
			case "logingrefresh": _hkloginrefreshdata(); break;				
            case "profile_update": _hkprofileupdatedata(); break;
		    case "comment": comment($aditi); break;
            case "rld":reload($aditi);break;
            case "statuspost": _hkstatuspostdata($aditi);break;	
            case "update": _hkdesktopupdatedatat($aditi); break;
            case "current_mobile_update": _hkcurrentmobileupdatedata($aditi); break;
            case "mobile_update": _hkmobileupdatedata($aditi);break;//mobile update part update status for mobile site when  login refresh......
 			case "like_update": _hklikeupdatebuttondata($aditi);break;/// like button done by me(haikent kumar hites ) not it working with updating... so me try its work with ajax respons...  //17/6/2013 9:15 <time .almost 10 hr > dedicate to some one...									   
            case "likeupdate":_hklikeupdatedata($aditi);break;
            case "cmntupdate":_hkcommentupdatedata($aditi);break;							
			case "statusimageupload": _hkstatusimageupload($aditi); break;
            case "profilepicupload":_hkprofilepicuploaddata($aditi);break;
			case "getimageuploaddata": _hkimageuploadhtmldata(); break;
			case "setprofileinformation":_hksetprofileinformationsignuptime();break;						
			case "setprofileimage": _hksetprofileimagehtmldata();break;						 
            case "linkclick":_hklinkclick();break;
			case "timeline": header("Refresh:0; url=http://localhost/mycollegeday/php/timeline.php"); break;
			case "logout": _hklogout();break;												 
            case "ebooks": _hkebookpage();break;
			case "search": _hksearchdatagroup();break;											 
			case "seeallliker": _hkseealllikerlist(); break;
			case "friends": _hkmenutagfriends(); break;
		    case "relation": _hkrelation(); break;
			case "bodypart1": _hkprofilemainmenu();break;
			case "notes": _hknotes();break;
			case "result": _hkresult();break;
			case "news":_hknews();break;
			case "movies":_hkmovies();break;
			case "songs":_hksong();break;
			case "picture":_hkpicture();break;
			case "Game":_hkgame();break;
			case "apkapps":_hkapkapps();break;
			case "software":_hksoftware();break;
			case "webdesign": _hkwebdesign();break;
			case "codehunt": _hkcodehunt();break;
			case "onlineEarnmony": _hkonlineEarnmony();break;
		
			default:
					 header("Refresh:0; url=http://localhost/mycollegeday/php/msycollegephp.php");	
					if(1)
					{
					
					echo '<script>alert("Something is going on wrong ,,,as soon as we solve this ... ...")</script>';
					
					} 
						
	}		

	
	
?>			
						
 
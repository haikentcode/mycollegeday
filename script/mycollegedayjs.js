function post(str)
{
 var hkid=document.getElementById("hkid").value;
 var adu=document.getElementById("post").value;
 document.getElementById("status_input").value="";
 
if (str=="")
  {
  document.getElementById("status_input").innerHTML="";
  return;
  }
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  

xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("hkid="+hkid+"&adu="+adu+"&status="+str);

//update("<?php echo $id; ?>");

}
function bodypart1()
{

if (window.XMLHttpRequest)
                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp=new XMLHttpRequest();
                      }
                  else
                     {// code for IE6, IE5
                         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                        
						    xmlhttp.onreadystatechange=function()
                                    {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                             {
                                              var response=xmlhttp.responseText;
											    document.getElementById("bodypart1").innerHTML=response;
											    
                                             }
                                    }
									
                                     
                            xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
                            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            xmlhttp.send("adu=bodypart1");



}

//update 
function autoupdate()
{



var t=setTimeout( 'autoupdate()',1000);
}


function update()
{


 if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
   }
 else
   {// code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
 xmlhttp.onreadystatechange=function()
   {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
     document.getElementById("status_show_part").innerHTML=xmlhttp.responseText;
	// bodypart1(); i dont why profilemaunu.js not work with update part :( 
     }
   }
 
       xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
       xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       xmlhttp.send("adu=update");

    
 var t=setTimeout( 'autoupdate()',1000);
}







var width=document.documentElement.clientWidth;
var height=document.documentElement.clientHeight;


    function div_1_click(x)
            {
			       if(x=="newsfeed"){update();}
				     else {
                               if (window.XMLHttpRequest)
                          {// code for IE7+, Firefox, Chrome, Opera, Safari
                                       xmlhttp=new XMLHttpRequest();
                          }
                           else
                                {// code for IE6, IE5
                                     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                       xmlhttp.onreadystatechange=function()
                                {
                                 if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                      {
									   
                                       document.getElementById("status_show_part").innerHTML=xmlhttp.responseText;
                                      }
                                }
 
                                xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
                                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                                xmlhttp.send("adu="+x);
                         }
								
                                 
             }   
	
	function like(sid,like_Q,nhkid)
	{
	// alert("i m i like function");
  
    if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
                      xmlhttp=new XMLHttpRequest();
              }
            else
                   {// code for IE6, IE5
                       xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }
  
                      var adu="like_update";
					  xmlhttp.onreadystatechange=function()
                                    {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                             {
                                                var adu="likeupdate";
					                            likeupgate(nhkid,sid,adu);
										        
										   
                                              }
                                    }
					  
					  
 
					  
					  
                         
                      xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
					  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                      xmlhttp.send("adu="+adu+"&nhkid="+nhkid+"&sid="+sid);
					 
             
                  }
	function comment(sid,nhkid,cmnt,evt)
	{
	 if ( evt.keyCode==13 || evt.which==13 )
	 {
	             //  alert("cmnt");
	                                        if (cmnt=="")
                                                     {
								
                                                document.getElementById(sid).value="";
                                                        return;
                                                      }
  
                                                   if (window.XMLHttpRequest)
                                                       {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                          xmlhttp=new XMLHttpRequest();
                                                       }
                                                        else
                                                          {// code for IE6, IE5
                                                              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                                                           }
														   
														    xmlhttp.onreadystatechange=function()
                                                             {
                                                               if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                                                     {
                                                                     
                                                                      cmntupdate(sid,nhkid);
																	  
																	
										                             }
                                                               }
                                                  
                                 
                                                 xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
												 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                                                 xmlhttp.send("sid="+sid+"&adu=comment&comment="+cmnt+"&hkid="+nhkid);
												 document.getElementById(sid).value="";
                                     
										    
	                              }
	}

	
	function enter_event(id,evt)
	{
	
	 if ( evt.keyCode==13 || evt.which==13 )
	 {
	 document.getElementById(id).style.height=document.getElementById(id).offsetHeight+15+"px";// I have created it, 20/6/2013 7:50 dedicate to my pagal friend sanah
	// alert(document.getElementById(id).offsetHeight+3);
	 }
	 if (document.getElementById(id).value==""){document.getElementById(id).style.height=40+"px";}
	
	}
	
	function cmntupdate(sid,nhkid)
	{
	     if (window.XMLHttpRequest)
                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp=new XMLHttpRequest();
                      }
                  else
                     {// code for IE6, IE5
                         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                        
						    xmlhttp.onreadystatechange=function()
                                    {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                             {
                                              var response=xmlhttp.responseText;
											  var sid_scmnt=sid+"^scmnt";
											  document.getElementById(sid_scmnt).innerHTML=response;
											  likeupgate(nhkid,sid,"likeupdate");
										   
                                              }
                                    }
									
                                     
                            xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
                            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            xmlhttp.send("adu=cmntupdate&sid="+sid+"&nhkid="+nhkid);
 
	                       
	

	
	}
	
	function likeupgate(nhkid,sid,adu)
	
	{
	  
      if (window.XMLHttpRequest)
                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp=new XMLHttpRequest();
                      }
                  else
                     {// code for IE6, IE5
                         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                        
						    xmlhttp.onreadystatechange=function()
                                    {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                             {
                                              var response=xmlhttp.responseText;
											  var res=response.split("==");
											  rid=sid+"^statusinfo";
                                             document.getElementById(rid).innerHTML=response;
                                              }
                                    }
									
                                     
                            xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
                            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            xmlhttp.send("adu="+adu+"&sid="+sid+"&nhkid="+nhkid);
 
	                       
	
	

	    }
		
		
		
		
		
		
		
		
		function linkclick(hkid,sid,nhkid)
{
 
 if (window.XMLHttpRequest)
                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp=new XMLHttpRequest();
                      }
                  else
                     {// code for IE6, IE5
                         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                        
						    xmlhttp.onreadystatechange=function()
                                    {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                             {
                                              var response=xmlhttp.responseText;
											   alert(response);
                                              }
                                    }
									
                                     
                            xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
                            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            xmlhttp.send("adu=linkclick&hkid="+hkid+"&nhkid="+nhkid+"&sid="+sid);
 



 }
 
 function agclick(likerlist,sid,nhkid)
 {
 
 var liker=likerlist.split(",");
 
 if (window.XMLHttpRequest)
                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp=new XMLHttpRequest();
                      }
                  else
                     {// code for IE6, IE5
                         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                        
						    xmlhttp.onreadystatechange=function()
                                    {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                             {
                                              var response=xmlhttp.responseText;
											  $("#xyz").show();
											  $("#xyzbackground").show();
											    document.getElementById("xyz").innerHTML=response;
                                              }
                                    }
									
                                     
                            xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
                            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            xmlhttp.send("adu=seeallliker&nhkid="+nhkid+"&sid="+sid);
 
 }
 
 function logout()
 {
 if (window.XMLHttpRequest)
                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp=new XMLHttpRequest();
                      }
                  else
                     {// code for IE6, IE5
                         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                        
						    xmlhttp.onreadystatechange=function()
                                    {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                             {
                                              open("http://localhost/mycollegeday","_self");
                                             }
                                    }
									
                                     
                            xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
                            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            xmlhttp.send("adu=logout");
 
 }
 
 
 
 
 
 function comment_hide_show_button(sid)
{
sid_scmnt=sid+"_comment";
/*
if($(sid_scmnt).css("visibility")=='visible')
{
$("#"+sid_scmnt).hide()
}
else{$("#"+sid_scmnt).show();}
*/
$("#"+sid_scmnt).show();

}

function search(tablename,keywords)
{
if (window.XMLHttpRequest)
                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp=new XMLHttpRequest();
                      }
                  else
                     {// code for IE6, IE5
                         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                        
						    xmlhttp.onreadystatechange=function()
                                    {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                             {
                                              var response=xmlhttp.responseText;
											    
											    document.getElementById(tablename+"searchresult").innerHTML=response;
                                             }
                                    }
									
                                     
                            xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
                            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            xmlhttp.send("tablename="+tablename+"&k="+keywords+"&adu=search");
}

function relation(nhkid,tohkid,status,htmltagid)
{
    var r=confirm(status);
	
  if(r==true)
  {
if (window.XMLHttpRequest)
                      {// code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp=new XMLHttpRequest();
                      }
                  else
                     {// code for IE6, IE5
                         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                        
						    xmlhttp.onreadystatechange=function()
                                    {
                                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                             {
                                              var response=xmlhttp.responseText;
											    //alert(response);
											    $("#"+htmltagid).hide();
                                             }
                                    }
									
                                     
                            xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
                            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            xmlhttp.send("adu=relation&nhkid="+nhkid+"&tohkid="+tohkid+"&status="+status);

			}				 
}


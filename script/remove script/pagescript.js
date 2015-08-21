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

update("<?php echo $id; ?>");
}


update("<?php echo $id; ?>");

 
function update(user_id)
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
     }
   }
 
       xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegedaygetphp.php",true);
       xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       xmlhttp.send("id="+user_id+"&adu=update");
 
 //var t=setTimeout("update(\"<?php echo $id?>\")",1000);
}


 var width=document.documentElement.clientWidth;
var height=document.documentElement.clientHeight;


 function div_1_click(x)
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
                                      }
                                }
 
                                xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegedaygetphp.php",true);
                                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                                xmlhttp.send("adu="+x);
              
								alert("hello click u");
 
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
					                          //update("<?php echo $id; ?>");
                                               hkupdate(nhkid,sid,adu);
										        
										   
                                              }
                                    }
					  
					  
 
					  
					  
                         
                      xmlhttp.open("POST","http://localhost/mycollegeday/php/h_click.php",true);
					  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                      xmlhttp.send("adu="+adu+"&nhkid="+nhkid+"&sid="+sid);
					 
             
                  }
	function comment(sid,nhkid,cmnt,evt)
	{
	 if ( evt.keyCode==13 || evt.which==13 )
	 {
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
                                                                     
                                                                      update("<?php echo $id; ?>");
										                             }
                                                               }
                                                  alert(nhkid);
  

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
	
	function hkupdate(nhkid,sid,adu)
	
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
											  //alert(res[0]+","+res[1]+",")
											  document.getElementById(rid).innerHTML='<button value="'+sid+'" name="like_button"  onclick=\'like(this.value,\"'+res[1]+'\",\"'+nhkid+'\")\'  >'+res[1]+'</button>'+res[0]+'<span name="commnet_tag" style="padding-left:10px;"><a href="#" >Comment</a></span></span>';
										     // alert(res[0]+"\n"+res[1]);
										   
										   
                                              }
                                    }
									
                                     
                            xmlhttp.open("POST","http://localhost/mycollegeday/php/hkupdatephp.php",true);
                            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            xmlhttp.send("adu="+adu+"&sid="+sid+"&nhkid="+nhkid);
 
	                       
	
	

	    }
		

    
	
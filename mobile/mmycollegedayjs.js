// JavaScript Document for mycollegeday mobile main page
function current_update(user_id)
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
     
	 var list=document.getElementById("show");
     //list.insertBefore(xmlhttp.responseText,list.childNodes[0]);
	 list.innerHTML=xmlhttp.responseText+list.innerHTML;
	 
     }
   }
 
       xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
       xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       xmlhttp.send("id="+user_id+"&adu=current_mobile_update");

 var t=setTimeout("current_update()",2000);
	
}

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
     document.getElementById("show").innerHTML=xmlhttp.responseText;
     }
   }
 
       xmlhttp.open("POST","http://localhost/mycollegeday/php/mycollegephp.php",true);
       xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       xmlhttp.send("id="+user_id+"&adu=mobile_update");

         var t=setTimeout("current_update()",5000);
 
}





// function for post status dedicate to angel <3

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

}
 
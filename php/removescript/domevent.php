<!DOCTYPE html>
<html>
<head>
</head>
<body>

<p>Click the button to execute the <em>displayDate()</em> function.</p>

<button id="myBtn">Try it</button>

<script>
document.getElementById("myBtn").onclick=function(){displayDate()};
function displayDate()
{
document.getElementById("demo").innerHTML=Date();
}
</script>

<p id="demo"></p>

</body>
</html> 

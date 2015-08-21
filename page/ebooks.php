<!-- Ebooks -->
<style type="text/css">
#ebooks_page
{
width:100%;
height:100%;
text-align:center;
background-color:;
}
.ebs
{
height:30px;
width:200px;


}
.ebook_head
{
width:100%;
height:100px;
background-color:green;
float:left;

}

.ebook_head_1
{
width:60%;
height:100%;
float:left;
}

.ebook_head_2
{
widht:40%:
height:100%;
float:left;
}

.ebook_main_1
{
width:20%;
height:550px;
background-color:blue;
float:left;
}

.ebook_main_2
{
width:65%;
height:550px;
background-color:orange;
float:left;
}


.ebook_main_3
{
width:15%;
height:550px;
background-color:black;
float:left;
}
</style>
<script type="text/javascript">
function ebookserch()
{
var string;
string=document.getElementById("ebs").value;
var spart=string.split(" ");
var spart2=string.split(",");

document.getElementById("serchresult").innerHTML=string;
}
</script>
<div name="ebooks_page" id="ebooks_page">
<div name="ebook_head" id="ebook_head" class="ebook_head" >
<div name="ebook_head_1" class="ebook_head_1"></div>

<div name="ebook_head_2" class="ebook_head_2">

<div style="position:absolute;top:70px;right:10px;">
<div style="float:left"><input name="ebook_search" class="ebs" id="ebs" ></div>
<div style="float:left">
<button name="serchbtn" class="serchbtn" id="serchbtn" onclick='ebookserch()'>
<img src="http://localhost/mycollegeday/image/siteicon/serch2.ico" style="width:20px;height:24px;"></button>
</div>
</div>

</div>

</div>

<div name="ebook_main" id="ebook_main" class="ebook_main">
<div name="eboop_main_1" id="ebook_main_1" class="ebook_main_1"></div>
<div name="ebook_main_2" id="ebook_main_2" class="ebook_main_2"></div>
<div name="ebook_main_3" id="ebook_main_3" class="ebook_main_3"></div>

</div>

</div>
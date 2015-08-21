$(document).ready(function(){ 

$("dd").mouseover(function(){ if($(this).css("background-color")=="rgb(200, 200, 200)"){}else $(this).css("background-color","#E8E8E8");});

$("dd").mouseleave(function(){if($(this).css("background-color")=="rgb(200, 200, 200)"){}else $(this).css("background-color",""); });

$("dd").click(function(){$("dd").css("background-color","");$(this).css("background-color","#C8C8C8"); } );



}); 
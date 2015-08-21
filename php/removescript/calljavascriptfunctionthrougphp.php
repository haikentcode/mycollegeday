<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">

function inc(i)
{
document.write(i);
document.write('<br>');
adu(i);
}

function adu(i)
{

   document.write(" *"+i+" ");

}
</script>
</head>


<body>
   <?php
for($i=0; $i<=4; $i++)
         {
echo '<script type="text/javascript"></script>';
echo '<script type="text/javascript">inc('.$i.');</script>';
          }

  ?>


</body>
</html>
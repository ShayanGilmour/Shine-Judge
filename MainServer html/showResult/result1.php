

<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="logo_only.png" />
</head>

<body>



<style>
.unselectable {

   user-drag: none;
  user-select: none;
  -moz-user-select: none;
  -webkit-user-drag: none;
  -webkit-user-select: none;
  -ms-user-select: none;
}

div.c {
    font-size: 220%;
}

div.c {
    font-size: 150%;
}


</style>
<title>Shine Judge</title>

<center>
<a href="../index.html"> <img  draggable="false" (dragstart)="false;" class="unselectable"  src="../logo_only.png" width="150"></a>
<a style="text-decoration:none"> <draggable="false" (dragstart)="false;" class="unselectable" style="pointer-events: none;"><br></a>

<div class="c"> <draggable="false" (dragstart)="false;" class="unselectable" style="pointer-events: none;">Result</a> </div>
<br><br>
 <font size="+2">


<?php

shell_exec("bash prepairResult.sh");

$text = file_get_contents("result");
$text=str_replace("\n","<br />",$text);
echo "<td align=centre>$text</td>"; 
echo "<br />";

if (file_exists("/var/www/html/showResult/wrong"))
{
	echo "<a href='wrong'>See the test</a>";
}


?>
</body>
</html>





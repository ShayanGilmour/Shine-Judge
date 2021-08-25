<html>
<body>


<?php

$directory = "/var/www/html/readme/letters/";
$filecount = 0;
$fileList = glob($directory . "*");
if ($fileList){
 $filecount = count($fileList);
}
echo "There were $filecount files";

if ($filecount > 10)
{
	header('Location: /errors/error_flooded.html');
	exit();
}

    $file = "/var/www/html/readme/letters/$filecount.note";
    file_put_contents($file,$_POST["content"]);

	header('Location: /readme/sentReq.html');
?>

</body>
</html>

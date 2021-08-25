<html>
<body>

<?php


$N = 0;
while (file_exists("/var/www/html/working"))
{
++$N;
sleep (1);
if ($N > 10)
{
shell_exec("bash down.sh");
header('Location: http://MainIP/showResult/result.php');
exit;
}
}

if ($N > 0)
{
sleep(2);
}

shell_exec("bash starter.sh");
header('Location: http://MainIP/showResult/result.php');

?>

</body>
</html>

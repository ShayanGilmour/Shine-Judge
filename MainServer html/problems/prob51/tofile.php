<html>
<body>

<?php

    $InUse = "/var/www/html/submitReq/InUse";
    $x = 0;
    while(x <= 5) {
	if (!file_exists($InUse)) {
	    break;
	}
        $x++;
	if ($x == 6) {
		header('Location: /errors/error_timeout.html');
		exit();
	}
	sleep(2);
    }

    shell_exec("echo 1 >> /var/www/html/submitReq/InUse &> /var/www/html/wth");
    $file = "/var/www/html/submitReq/code.cpp";
    file_put_contents($file,$_POST["content"]);
    $file = "/var/www/html/submitReq/passtmp";
    file_put_contents($file,$_POST["password"]);
    $file = "/var/www/html/submitReq/usertmp";
    file_put_contents($file,$_POST["username"]);

    shell_exec("bash /var/www/html/securityCheck.sh");
    $Permission = "/var/www/html/submitPermission";
    if (!file_exists($Permission)) {
        shell_exec("echo 1 >> /var/www/html/badLog");
        header('Location: /errors/error1.html');
        exit();
    }

    shell_exec("bash prepair.sh");
    $Granted = "/var/www/html/guard/granted";
    if (!file_exists($Granted)) {
        header('Location: /errors/error_incorrect.html');
        exit();
    }
	shell_exec("rm /var/www/html/guard/granted");
	header('Location: http://ExecuterIP/starter.php');
?>

</body>
</html>

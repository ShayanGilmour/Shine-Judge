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

//    shell_exec("echo 1 >> /var/www/html/submitReq/InUse");
    $Direc = $_POST["username"].$_POST["passtmp"];
    $file = "/var/www/html/submitReq/passtmp";
    file_put_contents($file,$_POST["passtmp"]);

    $file = "/var/www/html/submitReq/usertmp";
    file_put_contents($file,$_POST["username"]);

//	shell_exec("echo $Direc >> /var/www/html/Accepted/wth");
//	shell_exec("ls /var/www/html/Acceptec/ >> wth");
//        shell_exec("ls /var/www/html/Acceptec/$Direc >> wth");

    shell_exec("bash /var/www/html/securityCheck.sh");
    $Permission = "/var/www/html/submitPermission";
    if (!file_exists($Permission)) {
        shell_exec("echo 1 >> /var/www/html/badLog");
	shell_exec("rm /var/www/html/submitReq/InUse");
        header('Location: /errors/error1.html');
        exit();
    }

    shell_exec("bash prepair.sh");
    $Granted = "/var/www/html/guard/granted";
    if (!file_exists($Granted)) {
        shell_exec("rm /var/www/html/submitReq/*");
        header('Location: /errors/error_incorrect.html');
        exit();
    }
	shell_exec("rm /var/www/html/guard/granted");

    $Error = "/var/www/html/errors/error_msg";
    if (file_exists($Error)) {
        shell_exec("rm /var/www/html/submitReq/*");
        header('Location: /errors/error_msg.php');
        exit();
    }

        shell_exec("rm /var/www/html/submitReq/*");
	
        header("LOCATION: /Accepted/$Direc");

?>

</body>
</html>

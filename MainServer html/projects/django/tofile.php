<html>
<body>


<?php

    $file = "/var/www/html/submitReq/passtmp";
    file_put_contents($file,$_POST["password"]);
    $file = "/var/www/html/submitReq/usertmp";
    file_put_contents($file,$_POST["username"]);

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
        shell_exec("rm /var/www/html/submitReq/InUse");
        header('Location: /errors/error_incorrect.html');
        exit();
    }
        shell_exec("rm /var/www/html/guard/granted");
        shell_exec("rm /var/www/html/submitReq/passtmp");

        header('Location: index.php');
?>

</body>
</html>


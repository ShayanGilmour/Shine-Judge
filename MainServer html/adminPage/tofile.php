<html>
<body>


<?php

    $file = "/var/www/html/adminReq/passtmp";
    file_put_contents($file,$_POST["password"]);
    $file = "/var/www/html/adminReq/usertmp";
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
    $Granted = "/var/www/html/guard/granted-admin";
    if (!file_exists($Granted)) {
        header('Location: /errors/error_incorrect.html');
        exit();
    }
        shell_exec("rm /var/www/html/guard/granted-admin");
        shell_exec("rm /var/www/html/adminReq/passtmp");

        shell_exec("cp admin* admin.php");
        header('Location: admin.php');
?>

</body>
</html>


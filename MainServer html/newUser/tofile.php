<html>
<body>


<?php

    $file = "/var/www/html/adminReq/passtmp";
    file_put_contents($file,$_POST["password"]);
    $file = "/var/www/html/adminReq/usertmp";
    file_put_contents($file,$_POST["username"]);
    $file = "/var/www/html/edit/content/prob";
    file_put_contents($file,$_POST["prob"]);


    shell_exec("bash /var/www/html/securityCheck.sh");
    $Permission = "/var/www/html/submitPermission";
    if (!file_exists($Permission)) {
        shell_exec("echo 1 >> /var/www/html/badLog");
        header('Location: /errors/error1.html');
        exit();
    }


	$file = "/var/www/html/newUser/name";
	file_put_contents($file,$_POST["name"]);
        $file = "/var/www/html/newUser/family";
        file_put_contents($file,$_POST["family"]);
        $file = "/var/www/html/newUser/ID";
        file_put_contents($file,$_POST["ID"]);


    shell_exec("bash prepair.sh");
    $Granted = "/var/www/html/guard/granted-admin";
    if (!file_exists($Granted)) {
        header('Location: /errors/error_incorrect.html');
        exit();
    }
	shell_exec("rm /var/www/html/guard/granted-admin");


        shell_exec("bash /var/www/html/newUser/apply.sh");
        header('Location: /adminPage');

?>

</body>
</html>

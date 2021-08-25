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

    shell_exec("bash prepair.sh");
    $Granted = "/var/www/html/guard/granted-admin";
    if (!file_exists($Granted)) {
        header('Location: /errors/error_incorrect.html');
        exit();
    }
	shell_exec("rm /var/www/html/guard/granted-admin");

	$file = "/var/www/html/edit/content/owner";
	file_put_contents($file,$_POST["owner"]);
        $file = "/var/www/html/edit/content/name";
        file_put_contents($file,$_POST["name"]);
        $file = "/var/www/html/edit/content/statement";
        file_put_contents($file,$_POST["statement"]);
        $file = "/var/www/html/edit/content/input";
        file_put_contents($file,$_POST["input"]);
        $file = "/var/www/html/edit/content/output";
        file_put_contents($file,$_POST["output"]);
        $file = "/var/www/html/edit/content/sampleInput1";
        file_put_contents($file,$_POST["sampleInput1"]);
        $file = "/var/www/html/edit/content/sampleOutput1";
        file_put_contents($file,$_POST["sampleOutput1"]);

        shell_exec("bash /var/www/html/edit/apply.sh");
        header('Location: /edit/');

?>

</body>
</html>

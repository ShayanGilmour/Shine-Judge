<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shine Judge</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/mainV9.css" />
    <!-- <script src="/css/main.js"></script> -->
    <link rel="shortcut icon" href="/pictures/logo_favicon.png">

</head>
<script>
function goBack() {
    window.history.back();
}
</script>
<body>
    <div class="header">
        <h1>Shine Judge</h1>
    </div>
    <div class="container">
        <div class="blank"></div>
        <div class="MediumLogo">
	    <a>
            <img src="/pictures/logo_main.png" onclick="goBack()">
            </a>
        </div>

        <div class="box">
            <div class="box header">
                <h2 style="font-size: 26px;"><b>Result</b></h2>
            </div>
            <div class="box main">
                <p class="content">
		<center>
			 <font size="+2">
	
			<?php
				shell_exec("bash prepairResult.sh");

				$text = file_get_contents("result");
				$text=str_replace("\n","<br />",$text);
				echo "<td align=centre>$text</td>"; 
			//	echo "<br />";

				if (file_exists("/var/www/html/showResult/wrong"))
				{
				        echo "<a href='wrong.php'>See the test</a>";
				}

                                if (file_exists("/var/www/html/showResult/codeAccepted"))
                                {
                                        shell_exec("bash /var/www/html/accepted.sh");

                                }

                                shell_exec("rm /var/www/html/submitReq/*");



			?>

		</center>

                </p>
            </div>
        </div>
       
<!--        <div class="blank"></div> -->
    </div>
</body>
</html>



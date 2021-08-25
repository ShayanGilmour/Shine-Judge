
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shine Judge</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/mainV3.css" />
    <!-- <script src="main.js"></script> -->
    <link rel="shortcut icon" href="/pictures/logo_favicon.png">

</head>
<body>
    <div class="header">
        <h1>Shine Judge</h1>
    </div>
    <div class="container">
        <div class="blank"></div>
        <div class="MediumLogo">
	<a href="../">

            <img src="/pictures/logo_main.png">
        </a>
	</div>
        <div class="box">
            <div class="box header">
                <h2 style="font-size: 24px;">Error</h2>
            </div>
            <div class="box main">
                <p class="content">
		
		<font size="+1">

		<center>
		<b><font size="5">
	<?php $text = file_get_contents("error_msg"); $text=str_replace("\n","<br />",$text); echo "<td align=centre>$text</td>"; ?>
	<?php shell_exec("rm error_msg"); ?>

	</font></b>
                </center>
		</p>
            </div>
        </div>
        <div class="blank"></div>
    </div>
</body>
</html>

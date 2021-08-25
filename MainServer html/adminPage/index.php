<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shine Judge</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/mainV9.css">
    <!-- <script src="main.js"></script> -->
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
                <h2 style="font-size: 22px;">Login</h2>
            </div>
            <div class="box main" style="margin-bottom: 15px">
	        <div class="submitpart">
	            <form action="tofile.php" method="post">

		<?php        shell_exec("rm /var/www/html/adminPage/admin.php"); ?>

	                <center>
			<font size=5><b>Admin Page:</b><br><br></font>
	                Username:<br><input type="text" name="username"><br>Password:<br><input type="password" name="password">
	                </center>
	                <input class="submitbutton" type="submit" value="Access">
	            </form>
	        </div>

            </div>
        </div>

        <div class="blank"></div>
    </div>




</body></html>

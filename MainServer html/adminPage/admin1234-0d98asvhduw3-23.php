<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shine Judge</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/main_adminV1.css" />
    <script src="prism.js"></script>
    <link rel="shortcut icon" href="/pictures/logo_favicon.png">
</head>
<body>


    <div class="header">
        <h1>Admin Page</h1>
    </div>
    <div class="container">
        <div class="blank"></div>
        <div class="box">
            <div class="box header">
                <h2><font size=6><b>High level access</b></font></h2>
            </div>
	    
            <div class="box main">
		<br>
                <div class="Logoarea">
                    <img src="/pictures/logo_yellow.png">
                </div>
               <!-- <div class="sitename">
                    <b>Shine Judge</b>
                </div>-->
                <div class="buttonarea">

                    <div class="button" style="margin-left: 10%;margin-top:10px;width:465px;">
                        <a href="/edit/"><span class="clickable">Edit Questions</span></a>
                    </div>
                    <div class="button" style="margin-left: 10%;margin-top:10px;width:465px;">
                        <a href="/newUser/"><span class="clickable">New User</span></a>
                    </div>

                    <div class="button" style="margin-left: 10%;margin-top:10px;width:465px;">
                        <a href="/seeLog/"><span class="clickable">Server Log</span></a>
                    </div>

<!--		    <div class="button" style="margin-left: 10%; margin-top:10px;width:227px">
                        <a href="projects/index.html"><span class="clickable">Projects</span></a>
                    </div>-->


                </div>
            </div>
        </div>
        <div class="blank"></div>
        <div class="blank"></div>
    </div>

<?php     shell_exec("rm /var/www/html/adminPage/admin.php"); ?>
</body>
</html>





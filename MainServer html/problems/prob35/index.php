<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shine Judge</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/mainV8.css">
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

        <center><font size=6 style="font-family: 'Times New Roman'"><b>
	<?php $text = file_get_contents("content/owner"); $text=str_replace("\n","<br />",$text); echo "<td align=centre>$text</td>"; ?>
	</b></font></center>

	<br>
        <div class="box">
            <div class="box header">
                <h2 style="font-size: 26px;"><b>
        	<?php $text = file_get_contents("content/name");echo "<td align=centre>$text</td>"; ?>
</b></h2>
            </div>
            <div class="box main">
                <p class="content">
			<?php $text = file_get_contents("content/statement"); $text=str_replace("\n","<br />",$text); echo "<td align=centre>$text</td>"; ?>
                </p>
            </div>
        </div>
        <div class="box">
            <div class="box header">
                <h2 style="font-size: 18px;">Input</h2>
            </div>
            <div class="box main" style="margin-bottom: 15px">
                <p class="content">
            	<?php $text = file_get_contents("content/input"); $text=str_replace("\n","<br />",$text); echo "<td align=centre>$text</td>"; ?>
                </p>
            </div>
        </div>
        <div class="box">
            <div class="box header">
                <h2 style="font-size: 18px;">Output</h2>
            </div>
            <div class="box main">
                <p class="content">
            	<?php $text = file_get_contents("content/output"); $text=str_replace("\n","<br />",$text); echo "<td align=centre>$text</td>"; ?>
                </p>
            </div>
        </div>


        <div class="box">
            <div class="box header">
 
              <h2 style="font-size: 18px;">Sample Tests</h2>
            </div>
            <div class="box main">

	    <?php

	    for ($i = 1; $i <= 10; $i++)
    	    {
                    if (file_exists("content/sampleInput$i"))
                    {

	            $text = file_get_contents("content/sample_part1"); echo "<td align=centre>$text</td>"; 
	            $text = file_get_contents("content/sampleInput$i"); $text=str_replace("\n","<br />",$text); echo "<td align=centre>$text</td>"; 
	            $text = file_get_contents("content/sample_part2"); echo "<td align=centre>$text</td>"; 
	            $text = file_get_contents("content/sampleOutput$i"); $text=str_replace("\n","<br />",$text); echo "<td align=centre>$text</td>"; 
	            $text = file_get_contents("content/sample_part3"); echo "<td align=centre>$text</td>"; 
		    }
	    }
	    ?>

	</div>
        </div>



<!--        <div class="submitpart">
            <div class="heading">Your Code:</div>
            <form action="tofile.php" method="post">
		<center>
		Username:<br><input type="text" name="username"><br>Password:<br><input type="password" name="password">
		</center>
                <textarea class="submitcontent" name="content" maxlength="30000"></textarea>
                <input class="submitbutton" type="submit">
            </form>
        </div>

        <div class="blank"></div>
    </div>
-->


</body></html>

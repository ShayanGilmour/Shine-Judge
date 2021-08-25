<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shine Judge</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/mainV9_foredit.css">
    <!-- <script src="/css/main.js"></script> -->
    <link rel="shortcut icon" href="/pictures/logo_favicon.png">

</head>
<script>
function goBack() {
    window.history.back();
}
</script>
<body>
<div class="submitpart">
            <form action="tofile.php" method="post">
            <div class="heading">Edit: <input type="text" name="prob" value="prob"></div>


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
        <input type="text" name="owner">
	</b></font></center>

        <center>
        <font size="2"><b>Time limit: 0.1 seconds &nbsp;&nbsp; Memory Limit: Fair</b><br><br></font>
        </center>

        <div class="box">
            <div class="box header">
                <h2 style="font-size: 26px;"><b>
		<input type="text" name="name">
</b></h2>
            </div>
            <div class="box main">
                <p class="content">
                <textarea class="submitcontent" name="statement" maxlength="2000"></textarea>

                </p>
            </div>
        </div>
        <div class="box">
            <div class="box header">
                <h2 style="font-size: 18px;">Input</h2>
            </div>
            <div class="box main" style="margin-bottom: 15px">
                <p class="content">
                <textarea class="submitcontent" name="input" maxlength="2000"></textarea>
                </p>
            </div>
        </div>
        <div class="box">
            <div class="box header">
                <h2 style="font-size: 18px;">Output</h2>
            </div>
            <div class="box main">
                <p class="content">
                <textarea class="submitcontent" name="output" maxlength="2000"></textarea>
                </p>
            </div>
        </div>


        <div class="box">
            <div class="box header">
 
              <h2 style="font-size: 18px;">Sample Tests</h2>
            </div>
            <div class="box main">
                <div class="testbox">
                    <div class="inputheader">Input</div>
                    <div class="terminal">
                        <p>
                                <textarea class="submitcontent" name="sampleInput1" maxlength="2000"></textarea>
                        </p>
                    </div>
                    <div class="outputheader">Output</div>
                    <div class="terminal" style="box-shadow: none;">
                        <p>
                                <textarea class="submitcontent" name="sampleOutput1" maxlength="2000"></textarea>
                        </p>
                    </div>
                </div>

	</div>
        </div>




		<center>
		Username:<br><input type="text" name="username"><br>Password:<br><input type="password" name="password">
		</center>
                <input class="submitbutton" type="submit">
            </form>
        </div>


        <div class="blank"></div>
    </div>



</body></html>

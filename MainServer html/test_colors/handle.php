<html>
<body>

<?php


$colour = $_POST["color1"];
$colour = substr($colour, 1);
shell_exec("echo $colour > colorfile");
$colour = $_POST["color2"];
$colour = substr($colour, 1);
shell_exec("echo $colour >> colorfile");
$colour = $_POST["color3"];
$colour = substr($colour, 1);
shell_exec("echo $colour >> colorfile");
$colour = $_POST["color4"];
$colour = substr($colour, 1);
shell_exec("echo $colour >> colorfile");
$colour = $_POST["color5"];
$colour = substr($colour, 1);
shell_exec("echo $colour >> colorfile");

shell_exec("bash handle.sh");
header('Location: test/index.html');
?>

</body>
</html>

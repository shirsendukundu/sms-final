<!DOCTYPE html>
<html>
<head>
	<title>logout </title>
</head>
<body>

<?php
session_start();
unset($_SESSION['user']);
session_destroy();

header("Location: index.html");
exit;
?>
</body>
</html>
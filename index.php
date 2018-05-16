<!DOCTYPE html>
<html lang="en">
<head>
<title>Instagram OAuth Login</title>
<style type="text/css">
	body {
		font-family: Arial;
	}

	a.button {
		background: url(instagram-login-button.png) no-repeat transparent;
        cursor: pointer;
        display: block;
        height: 29px;
        margin: 50px auto;
        overflow: hidden;
        text-indent: -9999px;
        width: 200px;
	}

	a.button:hover {
		background-position: 0 -29px;
	}
</style>
</head>
<body>
<div style='text-align:center'>
<h1>Login with Instragram</h1>
<?php
session_start();

if(isset($_SESSION['userdetails']))
{
	header('Location: home.php');
}

require 'instagram.class.php';
require 'instagram.config.php';

$loginUrl = $instagram->getLoginUrl();

echo '<a class="button" href="'.$loginUrl.'">Login with Instagram</a>';

?>
</body>
</html>
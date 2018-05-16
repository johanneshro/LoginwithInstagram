<html>
<head>
<title>Login with Instagram</title>
<style>
	body {
		font-family: Arial;
	}

	span a {
		color:#cc0000;
	}
	div {
		word-wrap: break-word;
	}
</style>
</head>
<body>

<div>
<h1>Login with Instagram</h1><span style='float:right'><a href='?id=logout'>Logout</a></span>
</div>
<h2>User Details</h2>
<?php
session_start();

if(isset($_GET['id']) && $_GET['id'] == 'logout')
{
	unset($_SESSION['userdetails']);
	session_destroy();
}

require 'instagram.class.php';
require 'instagram.config.php';

if (isset($_SESSION['userdetails'])) {

	$data = $_SESSION['userdetails'];

	echo '<div style="float:left;margin-right:10px"><img src="'.$data->user->profile_picture.'"></div><div style="float:left">';
	echo '<b>Name:</b> '.$data->user->full_name.'</br>';
	echo '<b>Username:</b> '.$data->user->username.'</br>';
	echo '<b>User ID:</b> '.$data->user->id.'</br>';
	echo '<b>Bio:</b> '.$data->user->bio.'</br>';
	echo '<b>Website:</b> '.$data->user->website.'</br>';
	echo '<b>Profile Pic:</b> '.$data->user->profile_picture.'</br>';
	echo '<b>Access Token:</b> '.$data->access_token.'</br></div>';

	$instagram->setAccessToken($data);

} else {
	header("Location: index.php");
}

?>
<div style='clear:both'></div>

<h2>Instagram Data Array</h2>
<div>
<?php
echo '<pre>';
print_r($data);
echo '</pre>';
?>
</div>
</body>
</html>
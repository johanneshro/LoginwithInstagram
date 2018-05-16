<?php
require 'instagram.class.php';
require 'instagram.config.php';

$code = $_GET['code'];

if(isset($code)) {

	$data = $instagram->getOAuthToken($code);

	if(empty($data->user->username))
	{
		header('Location: index.php');
	} else {

		session_start();

		$_SESSION['userdetails'] = $data;

		header('Location: home.php');
	}

} else {

	if(isset($_GET['error']))
	{
		echo 'An error occurred: '.$_GET['error_description'];
	}

}

?>
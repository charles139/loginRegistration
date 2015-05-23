<?php
$user_info = $this->session->userdata;
// var_dump($user_info);
?>

<html>
<head>
	<title>Welcome</title>
	<style type="text/css">
		* {
			margin: 0 auto;
		}
		#container {
			width: 420px;
			padding: 10px;
		}
		h1 {
			text-align: center;
			margin: 20px 0px;
		}
		h4 {
			display: inline-block;
			border: solid black 1px;
			position: absolute;
			background-color: white;
			margin: -10px 0px 0px 15px;
		}
		#logOff {
			font-size: 12px;
		}
		#welcomeBox {
			width: 400px;
			border: solid black 3px;
			padding: 15px;
		}
		.left {
			display: inline-block;
			width: 180px
		}
		.right {
			display: inline-block;
			width: 180px
		}
	</style>
</head>
<body>
	<div id='container'>
	<h1>Welcome <?= $user_info['users']['first_name'] ?>!<a id='logOff' href="/Login/logoff">log off</a></h1>
	<h4>User Information</h4>
		<div id='welcomeBox'>
			<p class='left'>First Name:</p>
			<p class='right'><?= $user_info['users']['first_name'] ?></p>
			<p class='left'>Last Name:</p>
			<p class='right'><?= $user_info['users']['last_name'] ?></p>
			<p class='left'>Email Address:</p>
			<p class='right'><?= $user_info['users']['email'] ?></p>
		</div>
	</div>
</body>
</html>
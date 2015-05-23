<?php
$this->load->helper('form');
?>

<html>
<head>
	<title>Login Registration</title>
	<style type="text/css">
		* {
			margin: 0 auto;
		}
		#container {
			width: 600px;
		}
		.logRegBox {
			width: 580px;
			border:solid black 3px;
			margin: 10px;
		}
		h1 {
			font-size: 12px;
			display: block;
		}
		.left {
			display: inline-block;
			width: 280px;
		}
		.right {
			display: inline-block;
			width: 280px;
		}
		.loginButt {
			margin-left: 507px;
		}
		#error {
			color: red;
			font-weight: bold;
			margin-left: 440px;
		}
	</style>
</head>
<body>
	<div id='container'>
		<p id='error'><?php if($this->session->userdata('error'))
				{
					echo $this->session->userdata('error');
					$this->session->sess_destroy();
				 } ?></p>
		<div class='logRegBox'>
			<h1>LogIn</h1>
			<form action='/Login/log_in' method='post'>
				<p class='left'>Email: </p>
				<input class='right' type='text' name='email'>
				<p class='left'>Password: </p>
				<input class='right' type='password' name='password'>
				<input class='loginButt' type='submit' name='login'>
				<input type='hidden' name='action' value='login'>
			</form>
		</div>
		<div class='logRegBox'>
			<h1>Or Register</h1>
			<form action='/Login/register' method='post'>
				<p class='left'>First Name: </p>
				<input class='right' type='text' name='first_name'>
				<p class='left'>Last Name: </p>
				<input class='right' type='text' name='last_name'>
				<p class='left'>Email Address: </p>
				<input class='right' type='text' name='email'>
				<p class='left'>Password:</p>
				<input class='right' type='password' name='password'>
				<p class='left'>Confirn Password:</p>
				<input class='right' type='password' name='confirm_password'>
				<input class='loginButt' type='submit' name='register'>
				<input type='hidden' name='action' value='login'>
			</form>
		</div>
	</div>
	<p><?= validation_errors() ?></p>
</body>
</html>
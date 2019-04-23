<!DOCTYPE html>
<html>

<head>
	<title>login</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/log/style.css">
	<title>Login Line Today</title>
	<meta charset="UTF-8">
</head>

<body>
	<div class="login">
		<h2>
			<center>
				<div class="logo"><a href="#"><img src="<?php echo base_url(); ?>assets/log/line.png"></a></div>
			</center>
		</h2>
		<form method="post" action="<?php echo base_url(); ?>line/login" class="login100-form validate-form">
			<div class="inputBox" data-validate="Enter username">
				<?php echo form_error('username', '<small><font color="red">', '</font></small>'); ?>
				<input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" required>
				<label>username</label>
			</div>
			<div class="inputBox" data-validate="Enter password">
				<?php echo form_error('password', '<small><font color="red">', '</font></small>'); ?>
				<input type="password" name="password" id="password" required>
				<label>Password</label>
			</div>
			<div class="form-group form-button">
				<center>
					<button type="submit" name="login" value="Log in" id=login class="form-submit">Login</button>
				</center>
			</div>
			<br>
		</form>
		<?php
		echo "<center><font color='red'>";
		echo $this->session->flashdata('message1');
		echo "</font></center>";
		?>
		<center>
			<a href="<?php echo base_url(); ?>line/registrasi" title="Registrasi" class="txt3">
				Creat an Account
			</a>
		</center>
	</div>

</body>

</html>
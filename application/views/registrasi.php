<html>

<head>
	<title>Registration Page Design</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/regis/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>
<?php
if ($this->session->flashdata('alert') == 'berhasil') {
	echo "<script>alert('Sukses Update Data');</script>";
}
?>

<body>
	<script src="<?php echo base_url(); ?>assets/regis/bootstrap-show-password.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset=md-1">
				<div class="row">
					<div class="col-md-5 register-left">
						<img src="<?php echo base_url(); ?>assets/regis/LINE.png">
						<h3>LINE TODAY ACCOUNT</h3>
						<p>Sign up for a Line Today account to learn or share your insights about any topic on Website.</p>
					</div>
					<div class="col-md-7 register-right">
						<h2>Register Here</h2>
						<form method="post" action="<?php echo base_url(); ?>line/registrasi" class="login100-form validate-form">
							<div class="register-form">
								<div class="form-group" data-validate="Enter username">
									<input type="text" id="username" class="form-control" placeholder="Username" name="username" value="<?php echo set_value('username') ?>">
									<?php echo form_error('username', '<small><font color="red">', '</font></small>'); ?>
								</div>
								<div class="form-group" data-validate="Enter email">
									<input type="text" id="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email') ?>">
									<?php echo form_error('email', '<small><font color="red">', '</font></small>'); ?>
								</div>
								<div class="form-group" data-validate="Enter password">
									<input type="password" name="password" id="password" class="form-control" placeholder="Password">
									<?php echo form_error('password', '<small><font color="red">', '</font></small>'); ?>
								</div>
								<button type="submit" name="signup" id="signup" class="form-submit" value="Register">Register</button>
							</div>
							<center>
								<a href="<?php echo base_url(); ?>line/login" title="Registrasi" class="txt3">
									Alredy have an account? Login!
								</a>
							</center>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

</body>
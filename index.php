<?php
include 'header.php';
?>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method = "POST" action="/mesprojets/BanqueDuPeuple/src/controller/userController.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="login" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="mdp" class="form-control" placeholder="password" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" id="remember">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" name="connexion" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<?php
						if(isset($_GET['connexion']) && $_GET['connexion'] == '0')
						{
							?>
							<a href="#" style="color:red">ERREUR DE CONNEXION</a>
					<?php	}
					else{ ?>
					<a href="#">Forgot your password?</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>
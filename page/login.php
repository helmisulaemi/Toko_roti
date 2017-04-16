		<div class="content login-box">
			<div class="login-main">
				<div class="wrap">
					<h1>LOGIN OR CREATE AN ACCOUNT</h1>
					<div class="login-left">
						<h3>NEW CUSTOMERS</h3>
						<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
						<a class="acount-btn" href="index.php?menu=register">Creat an Account</a>
					</div>
					<div class="login-right">
						<h3>Login</h3>
						<p>Masukan akun Anda dengan benar !</p>
                        <?php include "login_action.php";?>
						<form method="post">
							<div>
								<input type="text" name="username" placeholder="Username" required > 
							</div>
							<div>
								
								<input type="password" name="password" placeholder="Password" required> 
							</div>
							<input type="submit" name="login" value="Login" />
						</form>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
		</div>

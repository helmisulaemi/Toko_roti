		<div class="content login-box">
			<div class="login-main">
				<div class="wrap">
					<h1>CREATE AN ACCOUNT</h1>
					<div class="register-grids">
                    	<?php include "register_action.php";?>
						<form method="post"> 
								<div class="register-top-grid">
										<h3>PERSONAL INFORMATION</h3>
										<div>
											<span>Nama</span>
											<input type="text" name="nama" required> 
										</div>
										<div>
											<span>Alamat</span>
											<textarea class="textarea" name="alamat" required></textarea> 
										</div>
                                        <div>
                                        	<span>Jenis Kelamin</span>
                                            	<label class="checkbox"><input type="radio" name="jk" value="L" required><i> </i>Laki - laki</label>
                                                	
                                                <label class="checkbox"><input type="radio" name="jk" value="P" required><i> </i>Perempuan</label>
                                        </div>
                                        <div>
											<span>Kota</span>
											<input type="text" name="kota" required> 
										</div>
                                        <div>
											<span>No Handphone</span>
											<input type="text" name="nohp" required> 
										</div>
                                        <div>
											<span>Kode Pos</span>
											<input type="text" name="kode_pos" required> 
										</div>


										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<div class="register-bottom-grid">
										<h3>LOGIN INFORMATION</h3>
										<div>
											<span>Username</span>
											<input type="text" name="username" required>
										</div>
										<div>
											<span>Password</span>
											<input type="password" name="password" required>
										</div>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<input type="submit" name="submit" value="submit" />
						</form>
					</div>
				</div>
			</div>
		</div>
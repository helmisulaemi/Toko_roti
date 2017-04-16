		<div class="content login-box">
			<div class="login-main">
				<div class="wrap">
					<h1>EDIT ACCOUNT</h1>
					<div class="register-grids">
                    <?php
                    	$sql  = mysql_query("SELECT * FROM tbl_pembeli where nama_pengguna = '$_SESSION[nama_pengguna]'");
						$edit = mysql_fetch_array($sql);
						
						if(isset($_POST['ubah'])){
							if(!empty($_POST['passwordbaru'])){
								$field = array('password'=>$_POST['passwordbaru'],
									 		   'nama'=>$_POST['nama'],
										  	   'alamat'=>$_POST['alamat'],
										  	   'jk'=>$_POST['jk'],
										   	   'kota'=>$_POST['kota'],
										  	   'no_hp'=>$_POST['nohp'],
										  	   'kode_pos'=>$_POST['kode_pos']);
								$perintah->update("tbl_pembeli",$field,"nama_pengguna = '$_SESSION[nama_pengguna]'","index.php");
							}else{
							$field = array('nama'=>$_POST['nama'],
										   'alamat'=>$_POST['alamat'],
										   'jk'=>$_POST['jk'],
										   'kota'=>$_POST['kota'],
										   'no_hp'=>$_POST['nohp'],
										   'kode_pos'=>$_POST['kode_pos']);
							$perintah->update("tbl_pembeli",$field,"nama_pengguna = '$_SESSION[nama_pengguna]'","index.php");
							}
						}
					?>
						<form method="post"> 
								<div class="register-top-grid">
										<h3>PERSONAL INFORMATION</h3>
										<div>
											<span>Nama</span>
											<input type="text" name="nama" value="<?php echo $edit[1] ?>" required> 
										</div>
										<div>
											<span>Alamat</span>
											<textarea class="textarea" name="alamat" required><?php echo $edit[3] ?></textarea> 
										</div>
                                        <div>
                                        <?php
                                        	if($edit[2]=='L'){
												$l = "checked";
											}else{
												$p = "checked";
											}
										?>
                                        	<span>Jenis Kelamin</span>
                                            	<label class="checkbox"><input type="radio" name="jk" value="L" <?php echo @$l ?> required><i> 
                                                </i>Laki - laki</label>
                                                	
                                                <label class="checkbox"><input type="radio" name="jk" value="P" <?php echo @$p ?> required><i>
                                                 </i>Perempuan</label>
                                        </div>
                                        <div>
											<span>Kota</span>
											<input type="text" name="kota" value="<?php echo $edit[4] ?>" required> 
										</div>
                                        <div>
											<span>No Handphone</span>
											<input type="text" name="nohp" value="<?php echo $edit[6] ?>" required> 
										</div>
                                        <div>
											<span>Kode Pos</span>
											<input type="text" name="kode_pos" value="<?php echo $edit[5] ?>" required> 
										</div>

										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<div class="register-bottom-grid">
										<h3>Change Password</h3>
										<div>
											<span>Password Lama</span>
											<input type="text" name="passwordlama" value="<?php echo $edit[8]?>">
										</div>
										<div>
											<span>Password Baru</span>
											<input type="text" name="passwordbaru" >
										</div>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<input type="submit" name="ubah" value="UPDATE" />
						</form>
					</div>
				</div>
			</div>
		</div>
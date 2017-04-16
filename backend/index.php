<?php
@session_start();

include "../config/koneksi.php";
include "../page/controllers.php";


$perintah = new oop();

@$username = $_POST['username'];
@$password = md5(trim($_POST['password']));

if(isset($_POST['login'])){
		$perintah->login("tbl_admin",$username,$password,"admin/index.php?menu=tambahbr","?error");
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
	</head>
    <link rel="stylesheet" type="text/css" href="../style/css/style.css">
    
	<body bgcolor="#ECECEC">
    <br/><br/><br/>
    <div class="wrap">
      <form method="post">
      <p><h3><center>Form Login</center></h3></p>
      <hr>
    	<table align="center" width="100%">
        	<tr>
                <td><input type="text" name="username" class="form" placeholder="Username" required></td>
            </tr>
            <tr>
                <td><input type="password" name="password" class="form" placeholder="Password" required></td>
            </tr>
             
            <tr>
                <td><input type="submit" class="button" name="login" value="Login"></td>
            </tr>
           
        </table>
      </form>
    </div>
    </body>
</html>
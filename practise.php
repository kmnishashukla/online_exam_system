<?php

$connect = mysqli_connect('localhost','root','','myexam');
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$check_email=mysqli_query($connect,"select * from userregistration where email='".$email."'");
	if(mysqli_num_rows($check_email)==1){
		header('location:resetpass.php?email='.$email);
	}else{
		echo 'wrong email';
	}
}
?>
<html>
<head>
<title>resetpassword </title>
</head>
<body>
<form method="post">
<table>
<tr>
<td><input type="text" name="email" placeholder="enter your email"></td>
</tr>
<tr>
<td><button name="submit">check</button></td>
</tr>
</table>
</form>
</body>

</html>










----------------------------reset-------
<?php
$connect = mysqli_connect('localhost','root','','myexam');
if(isset($_POST['submit'])){
	$password = $_POST['password'];
	$password = password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);

	$email = $_GET['email'];
	$changepass = mysqli_query($connect,"update userregistration set password='".$password."' where email='".$email."'");
    if($changepass){
		//echo 'your password is changed';
		//alert("password generated Successfully");
		header("location:login.php");
		//header('Refesh:2;url=index.php');
	}else {
		echo 'error';
	}
}


?>'
<html>
<head>
<title>reset password</title>
</head>
<body>
<form method="post">
<table>
<tr>
<td><input type="text" name="password" placeholder="enter your new pass"></td>
</tr>
<tr>
<td><button name="submit">submit</button></td>
</tr>
</table>
</body>
</html>
----------adminreset----
<?php
include ('lib/Session.php');
Session::checkadminLogin();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Password Reset</title>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/login_register_style.css" />
		<script src="js/login_register_style.css.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
<?php
include 'classes/Login.php';
$lg = new Login();
if(($_SERVER['REQUEST_METHOD']=='POST')){
   $msg = $lg->adminresetpassword($_POST); 
}

?>
    <body style="background:url('img/bg.jpg') repeat;>
        <div class="container">	
			<header>
			  <div class="title">
				<h1><strong>Admin Password Reset Form</strong> </h1>
				<p><i>Please Enter Your Username Or Email,Which you used in Registration Time.</i></p>
			  </div>
			</header>
			<section class="main">
				<form class="form-1" action="#" method="POST">
					<p class="field">
						<input type="text" name="useremail" placeholder="Username or email">
						<i class="fw-icon-user icon-large"></i>
					</p>
					<button type="submit" name="submit"><i class="fw-icon-arrow-right icon-large"></i></button>
				</form>
			</section>
			<section>
			<?php
               if(isset($msg)) { ?>
				<div style="text-align: center;background:#4CAF50;padding: 10px; width: 400px;margin-left: 480px;border-radius: 7px;color:#fff;">
					
                      <?php echo '<h4><i>'.$msg.'</i><h4>'; ?>
				</div>
				<?php } ?>
			</section>
        </div>
    </body>
</html>








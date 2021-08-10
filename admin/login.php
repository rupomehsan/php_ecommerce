<?php $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Adminlogin.php');
?>

<?php 
$al = new Adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$adminUser = $_POST['adminUser'];
	$adminPass = md5($_POST['adminPass']);
	$loginChk = $al->adminLogin($adminUser,$adminPass);
}
?>




<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>


<span class="red">
	
	<?php 
      
      if (isset($loginChk)) {
      	echo $loginChk;
      	
      }

	?>
</span>

			<div>
				<input type="text" placeholder="Username"  name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="adminPass"  name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgatepassword.php">Forgate password!!!!</a>
			
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
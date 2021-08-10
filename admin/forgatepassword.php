<?php
$filepath = realpath(dirname(__FILE__));
 include ($filepath.'/../classes/Adminlogin.php');
?>

<?php 

$al = new Adminlogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$email = $_POST['email'];

	$recover = $al->recoverpass($email);
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
		<form action="" method="post">
			<h1>Admin Login</h1>


<span class="red">
	
	<?php 
      
      if (isset($recover)) {
      	echo $recover;
      	
      }

	?>
</span>

			<div>
				<input type="text" placeholder="enter valid email"  name="email"/>
			</div>
			
			<div>
				<input type="submit" value="Recover" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgatepassword.php">Forgate password!!!!</a>
				<a href="login.php">Login</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
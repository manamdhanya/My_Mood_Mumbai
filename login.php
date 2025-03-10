<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>LOGIN</title>
</head>
<body>
	<div class="center">
		<h1>Login</h1>
		<form class="form" action="#" method="POST" autocomplete="off">
		<div class="form">
			<input type="text" name="username" class="textfield" placeholder="Username">
			<input type="text" name="password" class="textfield" placeholder="Password">
			<input type="submit" name="login" value="Login" class="btn">
			<div class="signup">New Member ? <a href="form.php" class="link">Signup Here</a></div>
		</div>
	</div>
	</form>
</body>
</html>
<?php

   include("connection.php");

   if(isset($_POST['login']))
   {
   	   $username = $_POST['username'];
   	   $password = $_POST['password'];

   	   $query = "SELECT * FROM form WHERE email = '$username' && password = '$password'";


   	   $data = mysqli_query($conn,$query);

   	   $total = mysqli_num_rows($data);

   	   //echo $total;
   	   if($total == 1)
   	   {
   	   	  $row = mysqli_fetch_assoc($data);

        // Store user details in the session
        $_SESSION['username'] = $username;
        $_SESSION['fname'] = $row['fname'];
   	   	  header('location:afterloggedin.html');
   	   	  
   	   }

   	   else
   	   {
   	   	  echo '<script>alert("Login details are wrong");</script>';
   	   }
   }

?>
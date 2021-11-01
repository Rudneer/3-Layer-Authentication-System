<?php

  $error = "";

  $conn = mysqli_connect('localhost','root','','authentication system');
  if($conn->connect_error){
	  die("Connection Failed ! ". $conn->connect_error);
  }	

  if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "Select username,password,color_pass from registration_table";
    $result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result)){
		if($username == $row['username']){
			if($password == $row['password']){
				$color_pass = $row['color_pass'];
				session_start();
				$_SESSION['color_pass'] = $color_pass;
				$_SESSION['username'] = $username;
				
				header('Location: Login_L2.php');
			}
		}
		else{ $error = "Invalid username or password !"; }
	}
	$conn->close();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JS project</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:wght@100;200;300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
	<div class="main_div">
        <p>Three Level Authentication System</p>
		<div class="form_back">
			<h1>Login Form</h1>
			<form action="index.php" method="POST">

                <i class="fa fa-user-circle-o" aria-hidden="true" id="icons"></i>
                <div class="inputs">
					<input type="text" name="username" autocomplete="off" required>
					<label>Username</label>
				</div>

                <i class="fa fa-key" aria-hidden="true" id="icons"></i>
				<div class="inputs">
					<input type="Password" name="password" autocomplete="off" required>
					<label>Password</label>
				</div>

				<div class="throwback" style="color: red; text-align: center;" ><?php echo $error; ?></div>

				<div class="submits">
					<input type="submit" name="submit" value="Login">
                    <a style="align-items: center;" href="Register_L1.php">Haven't register yet? Register now!</a>
				</div>

			</form>
			
		</div>
		
	</div>
</body>
</html>


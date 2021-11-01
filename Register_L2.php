<?php

session_start();
$full_name = $_SESSION['full_name'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];

$error = "" ;

$conn = new mysqli('localhost','root','','authentication system');
if($conn->connect_error){
    die('Connection Failed'. $conn->connect_error );
}

if(isset($_POST['reset'])){
    $_POST['color_pass'] = "";
}

if(isset($_POST['submit'])){

    if(empty($_POST['color_pass'])){
        $error = "Please create a password !";
    }
    else{
        $color_pass = $_POST['color_pass'];

        $query = "Insert into registration_table(full_name,username,password,color_pass)values('$full_name','$username','$password','$color_pass')";
        if(mysqli_query($conn,$query)){
            header('Location: Register_L3.php');
        }
        else{
            echo "Registration Unsuccessful !". mysqli_error($conn);
        }
    }

$conn->close();
     
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/Register_L2.css">

	<title>Login Form</title>
</head>

<body>
    <div class="background">
        <div class="container">
            <form class="login-email" action="Register_L2.php" method="POST" >
                <p class="login-text" style="font-size: 2rem; font-weight: 600;">Colour Based Security Check</p>
                <div>
                <button id="red" >
                    red
                </button>
                <button id="green">
                    green
                    </button>
                <button id="blue">
                    blue
                </button>
            </div>
           
            <div class="input-group">
                <input id="omkar" type="text" name="color_pass">
                <button  name="reset" style="width: 80px; height:39px;" >Reset</button>
            </div>

            <div style="color: red; " ><?php echo $error; ?></div>

            <div class="input-group">
                <button type="submit" name="submit" class="btn" id="btn">Save</button>
            </div>
        </form>
        </div>
    </div>

<script type="text/javascript" src="js/index.js" >
</script>
</body>
</html>
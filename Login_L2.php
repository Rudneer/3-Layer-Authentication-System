<?php

session_start();
$color_pass = $_SESSION['color_pass'];

$error = "" ;

if(isset($_POST['reset'])){
    $_POST['color_pass'] = "";
}

if(isset($_POST['submit'])){
   
    if(empty($_POST['color_pass'])){
        $error = "Please enter a password !";
    }
    else{
        $password = $_POST['color_pass'];
        if($password!=$color_pass){
            $error = "Incorrect Password !";
            $password = "";
        }
        else{
            header('Location: Login_L3.php');
        }
 
    }

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/Login_L2.css">

	<title>Login Form</title>
</head>

<body>
    <div class="background">
        <div class="container">
            <form class="login-email" action="Login_L2.php" method="POST" >
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
                <button type="submit" name="submit" class="btn" id="btn">Submit</button>
            </div>
        </form>
        </div>
    </div>

<script type="text/javascript" src="js/index.js" >
</script>
</body>
</html>
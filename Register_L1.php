<?php

  $full_name = "";
  $username = "";
  $password = "";
  $confirm_pass = "";

  $errors = array('full_name'=>'','username'=>'','password'=>'','confirm_pass'=>'');


  $conn = new mysqli('localhost','root','','authentication system');
  if($conn->connect_error){
      die('Connection Failed: '.$conn->connect_error);
  }

  

  if(isset($_POST['submit'])){

   

  if(empty($_POST['full_name'])){
      $errors['full_name'] = "Full Name is required !";
  }else{
     $full_name = $_POST['full_name'];
     if(!preg_match('/^[a-zA-Z\s]+$/',$full_name)){
        $errors['full_name'] = "Use letters and spaces only !";        
     }
  }


  if(empty($_POST['username'])){
    $errors['username'] = "Username is required !";
  }else{
      $username = $_POST['username'];
      
      $query_user = "Select username from registration_table";
      $result = mysqli_query($conn,$query_user);

      if(!preg_match('/^[a-zA-Z0-9!@#$&]{5,15}$/',$username)){
        $errors['username'] = "Length must be between 5-15! ";        
      }

      while($row = mysqli_fetch_assoc($result)){
        if($username==$row['username']){
          $errors['username'] = "Username already exist !";
        }
      }
  }


  if(empty($_POST['password'])){
    $errors['password'] = "Password is required !";
  }else{
     $password = $_POST['password'];
     if(!preg_match('/^[a-zA-Z0-9!@#$&]{5,15}$/',$password)){
        $errors['password'] = "Length must be between 5-15! ";        
      }
  }


  if(empty($_POST['confirm_pass'])){
    $errors['confirm_pass'] = "Please confirm the password !";
  }else{
      $confirm_pass =  $_POST['confirm_pass'];
      if($password!=$confirm_pass){
        $errors['confirm_pass'] = "Password does not match !";
      }
  }

  $id = '';
  if(!array_filter($errors)){
   
    session_start();
    $_SESSION['full_name'] = $full_name;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
   
    header('Location: Register_L2.php');  
      
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
    <title>Register Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Poppins:wght@100;200;300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Register_L1.css">
</head>

<body>
    <div class="maindiv">
        <a href="index.php" class="arrow"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a>
    
        <div class="forms">
        <form action="Register_L1.php" method="POST">
            <h1>Registration Form</h1>
            <p>Full Name</p>
            <div> <input type="text" name="full_name" value="<?php echo $full_name; ?>" ></div>
            <div class="throwback" ><?php echo  $errors['full_name']; ?></div>
            <p>Username</p>
            <div> <input type="username" name="username" value="<?php echo $username; ?>" > </div>
            <div class="throwback" ><?php echo $errors['username']; ?></div>
            <p>Password</p>
            <div> <input type="password" name="password" value="<?php echo $password; ?>" > </div>
            <div class="throwback" ><?php echo $errors['password']; ?></div>
            <p>Confirm Password</p>
            <div> <input type="password" name="confirm_pass" value="<?php echo $confirm_pass; ?>" > </div>
            <div class="throwback" ><?php echo $errors['confirm_pass']; ?></div>
            <div> <input type="submit" name="submit" value="submit" id="submit">
        </form>
    </div>
    </div>
    
</body>
</html>
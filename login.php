<?php
$login = 0;
$invalid = 0;


if($_SERVER['REQUEST_METHOD'] =='POST'){
    include "connectfiles/connect_db.php";
    $registration_no = $_POST['registration_no'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students WHERE registration_no='$registration_no' AND password='$password' ";
    $result=mysqli_query($conn, $sql) or die("Error: User not Found! Please Register");
    
    if($result) {
        $num=mysqli_num_rows($result);
        if($num>0){
            $login=1;
            session_start();
            $_SESSION['registration_no'] = $registration_no;
            
        }
        header('location: index.php');
    }else{
        die("<p style='color:red;text-align: center;'>Invalid Login Credentials</p>");
    }
}
?>
<?php
if($login){
    echo 'Log In Successfull!! ';
    
}
?>
<?php
if($invalid){
    echo 'Invalid Login Credentials';
}
?>
<html lang="en">
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="first.css" />
    <title>Login Form</title>
</head>
<body>
<?php
if($login){
    echo 'Log In Successfull!! ';
}
?>
<?php
if($invalid){
    echo 'Invalid Login Credentials';
}
?>
    <div class = "header">
        <h3>Login</h3>
           
    </div>
    <form role="form" method="post">
      
        <div class = "input-group">
            <label>Student Registration Number: </label>
            <input type = "text" name = "registration_no"  pattern = "[^ /]*/[^ /]*/[^ /]*" class= "form-control"  id = "registration_no"  required/>
        </div>
        <div class = "input-group">
            <label>Password: </label>
            <input type = "password" name = "password" class= "form-control" id = "password" required/>
        </div>
        <div class="btn">
            <button type="login" name="login" class="btn">Login</button>
        </div>
        <p> Not yet a member? <a href="signup.php"> Register Now!</a>
    </form>
</body>
</html>

<!-- pattern = "[^ /]*/[^ /]*/[^ /]*"-->
<?php
$success = 0;
$user = 0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connectfiles/connect_db.php';
    $student_name = $_POST['student_name'];
    $registration_no = $_POST['registration_no'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $sql = "SELECT * FROM students WHERE student_name='$student_name'";

    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $user=1;
        }else{
            if($password == $confirm_password){
                $encrypted_password=hash('md5', $password);
            
                $sql="INSERT INTO students(student_name,registration_no,password) 
                VALUES('$student_name','$registration_no', '$encrypted_password')";
                $result=mysqli_query($conn, $sql);
                if($result){
                    $success=1;
                    
                }else{
                    die('Connection Failed..');
                }
                header('location: login.php');
            }else{

                echo "<p style='color:red;text-align: center;'>Please Re-Confirm Your Password</p>";
            }
        
        }
    }
}

?>

<html lang="en">
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="first.css" />
    <title>Registration/ Sign-Up Form</title>
    
</head>
<body>
<?php
if($user){
    echo 'User Already Exists!! ';
}
?>
<?php
if($success){
    echo 'Registration Succesfull!! ';
}
?>
    <div class = "header">
        <h3>Registration Form</h3>
           
    </div>
    <form  role="form" method="post">
        <div class = "input-group">
            <label>Student Name: </label>
            <input type = "text" class= "form-control" id = "student_name" name = "student_name"  required/>
        </div>
        <div class = "input-group">
            <label>Student Registration Number: </label>
            <input type = "text" name = "registration_no" pattern = "[^ /]*/[^ /]*/[^ /]*" class= "form-control"  id = "registration_no"  required/>
        </div>
        <div class = "input-group">
            <label>Password: </label>
            <input type = "password" class= "form-control" id = "password" name = "password" required/>
        </div>
        <div class = "input-group">
            <label>Confirm Password: </label>
            <input type = "password" class= "form-control" id = "confirm_password" name = "confirm_password" required/>
        </div>
        <div class="input-group">
            <button type="submit" class="btn">Submit</button>
        </div>
        <p> Already a member? <a href="login.php"> Sign In</a>
    </form>

          
</html>
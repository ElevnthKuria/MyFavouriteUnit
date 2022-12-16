<?php
include 'connectfiles/connect_db.php';

$unit_id = $_GET['changeId'];
$sql = "SELECT * FROM units WHERE unit_id=$unit_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$unit_name =  $row['unit_name']; 
$unit_code =  $row['unit_code'];
$year_taught = $row['year_taught'];
$sem_taught = $row['sem_taught']; 


if(isset($_POST['change'])){
    $unit_name =  $_POST['unit_name']; 
    $unit_code =  $_POST['unit_code'];
    $year_taught = $_POST['year_taught'];
    $sem_taught = $_POST['sem_taught'];  
    

    $sql = "UPDATE units SET unit_id= $unit_id, unit_name = '$unit_name', unit_code='$unit_code', year_taught='$year_taught', sem_taught='$sem_taught' WHERE unit_id=$unit_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "Favourite Unit Details Changed Successfully!!";
        header('location: main.php');
    }else{
        die('Changing Details Failed!');
    }

}
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="first.css" />
    <title>Favourite Unit</title>
  </head>
  <body>
    <div class = "header">
        <h3>Unit Form</h3>
    </div>
    
    <div>
    <form role="form" method="post">
        <div class = "input-group">
            <label>Unit Name: </label>
            <input name="unit_name" id="unit_name" type = "text" class= "form-control" required value=<?php echo $unit_name;?> ></input>
        <div class = "input-group">
            <label for="code">Unit Code: </label>
            <input name="unit_code" id="unit_code" type = "text" class= "form-control" required value=<?php echo $unit_code;?>></input>
        </div>
        <div class = "input-group">
        <label>Year Taught: </label>
            <select for="year"name="year_taught" id="year_taught"  type = "option" class= "form-control" required value=<?php echo $year_taught;?>>
                <option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
                <option value="Fourth">Fourth</option>
                <option value="Self Taught">Self Taught</option>
            </select> 
        </div>
        <div class = "input-group">
            <label>Semester Taught: </label>
            <select name="sem_taught" id="sem_taught" type = "option" class= "form-control"  required value=<?php echo $sem_taught;?>>
                <option value="I">I</option>
                <option value="II">II</option>
            </select>
        
        <div class="btn">
            <button type="change" name="change" class="btn">Change</button>         
        </div>
    </div>
    
    
  </body>
</html>
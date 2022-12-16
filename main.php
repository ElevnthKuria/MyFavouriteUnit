<?php

include 'connectfiles/connect_db.php';

?>
<html lang="en">
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="first.css" />
    <title>My Favourite Units</title>
</head>
<!--- Displays Units the User is Undertaking after entering the values-->
<body>    
    
    <div>

    <button class= "btn btn-primary"><a href="index.php" class="text-light">Add Unit</a>
    
    </button>
<table class="col-md-auto" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Unit Name</th>
      <th scope="col">Unit Code</th>
      <th scope="col">Year Taught</th>
      <th scope="col">Semester Taught</th>
      <th scope="col">Action</th>
      
      
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * from units";
    $result = mysqli_query($conn, $sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $unit_id = $row['unit_id'];
            $unit_name =  $row['unit_name']; 
            $unit_code =  $row['unit_code'];
            $year_taught = $row['year_taught'];
            $sem_taught = $row['sem_taught'];  
           
            echo '<tr>
            <th scope="row">'.$unit_id.'</th>
            <td>'.$unit_name.'</td>
            <td>'.$unit_code.'</td>
            <td>'.$year_taught.'</td>
            <td>'.$sem_taught.'</td>
            <td>
            <button class="btn"><a href="change.php? changeId= '.$unit_id.'" class="text-light">Change</a></button>
            <button class="btn"><a href="delete.php? removeId= '.$unit_id.'" class="text-light">Remove</a></button>
        </td>
            
          </tr>';
        }
    }

    
    ?>
    <button class= "btn btn-primary"><a href="login.php" class="text-light">Log Out</a>

    </button>

  </tbody>
</table>
</div>
</div>
</body>
</html>
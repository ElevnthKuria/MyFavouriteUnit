<?php
include 'connectfiles/connect_db.php';

if(isset($_GET['removeId'])){
    $unit_id = $_GET['removeId'];

    $sql = "DELETE FROM units WHERE unit_id=$unit_id";
    $result=mysqli_query($conn, $sql);
    if($result) {
        //echo "Deleted Successfully";
        header('location: main.php');
    }else{
        die("Delete Failed");
    }
}

?>
<?php
include_once 'header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM `students` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("Sql statement failed!");
    }
    else{
        header("Location: index.php?error=One student has been deleted");
    }
}



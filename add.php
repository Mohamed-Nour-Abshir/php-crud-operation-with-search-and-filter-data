<?php
include_once 'includes/dbh.inc.php';

if(isset($_POST['add_student'])){
    $firstName = $_POST['f_name'];
    $lastName = $_POST['l_name'];
    $age = $_POST['age'];

    if(empty($firstName)){
        header("Location: index.php?error=Please Enter the first name of the student! ");
        exit();
    }
    elseif(empty($lastName)){
        header("Location: index.php?error=Please Enter the last name of the student! ");
        exit();
    }
    elseif(empty($age)){
        header("Location: index.php?error=Please Enter the Age of the student! ");
        exit();
    }
    else{
        $sql = "INSERT INTO `students`(`first_name`, `last_name`, `age`)VALUES('$firstName', '$lastName', '$age')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            die("Sql statement failed!");
        }
        else{
            header("Location: index.php?success=One student has been added to this class Successfully!");
            exit();
        }
    }
}
<?php
include_once 'header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
   
    $sql = "SELECT *FROM `students` WHERE `id` = '$id';";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("Sql statement failed!");
    }
    else{
        $row = mysqli_fetch_assoc($result);
    }
    
}
?>
<?php
 
 if(isset($_POST['update'])){
     $firstName = $_POST['f_name'];
     $lastName = $_POST['l_name'];
     $age = $_POST['age'];

     if(isset($_GET['newId'])){
         $newId = $_GET['newId'];
     $sql = "UPDATE `students` SET `first_name` = '$firstName', `last_name` = '$lastName', `age` = '$age' WHERE `id` = '$newId' ;";
     $result = mysqli_query($conn, $sql);
     if(!$result){
         die("sql statement failed!");
     }
     else{
         header("Location: index.php?success=One data has been updated Successfully!");
     }
    }
 }

?>
<div class="container m-5">
<h1 class="bg-dark text-light p-3 text-center">Update Student Information</h1>
<form action="update.php?newId=<?php echo $id;?>" method="POST">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control"value="<?php echo $row['last_name']; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">
    </div>
    <input type="submit" name="update" value="Edit" class="btn btn-success">
</form>
</div>
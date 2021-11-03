<?php include_once 'header.php'; ?>

<div class="container">
   
    <h1 class="bg-dark text-light p-3 text-center">Student Management System</h1>
    <?php
      if(isset($_GET['error'])){
          $error = $_GET['error'];
          echo "<div class='alert alert-danger'>$error</div>";
      }
      elseif(isset($_GET['success'])){
          $success = $_GET['success'];
          echo "<div class='alert alert-success'>$success</div>";
      }
    ?>

   <form action="" method="GET">
        <div class="input-group mb-3">
        <input type="text" class="form-control" name="search" required placeholder="Search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
        <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
    <?php
     if(isset($_GET['search'])){
         $filterValues = $_GET['search'];
         ?>
         
         <thead>
         <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Age</th>
         </tr>
         </thead>
         <?php
         $sql = "SELECT *FROM students WHERE CONCAT(id, first_name, last_name, age) LIKE '%$filterValues%'";
         $result = mysqli_query($conn, $sql);
         if(mysqli_num_rows($result) > 0){
           foreach($result as $items){
               ?>
               <tbody>
               <tr>
                    <td><?=  $items['id'];?></td>
                    <td><?= $items['first_name'];?></td>
                    <td><?= $items['last_name'];?></td>
                    <td><?= $items['age'];?></td>
                </tr>
                </tbody>
               <?php
           }
         }
         else{
             ?>
             <tr>
                 <td colspan="4">No Result founded!</td>
             </tr>
             <?php
         }
     }
    ?>
        
</table>
    
    <div class="floating">
        <h4 class="float-start">All Students</h4>
        <button class="btn btn-primary float-end mb-2"  data-bs-toggle="modal" data-bs-target="#addStudent">Add Student</button>
    </div>
  <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
         $sql = "SELECT *FROM `students`; ";
         $result = mysqli_query($conn, $sql);
         if(!$result){
             die("sql statement failed!");
         }
         else{
             while($row = mysqli_fetch_assoc($result)){
                 ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['age'];?></td>
                        <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                 <?php
             }
         }
        
        ?>
    </tbody>
</table>
</div>


<!-- add student  -->
<form action="add.php" method="POST">
       <!-- Modal -->
        <div class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD STUDENT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="f_name">First Name</label>
                    <input type="text" name="f_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" name="l_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" name="age" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" name="add_student" value="Add Student" class="btn btn-success">
            </div>
            </div>
        </div>
        </div>
   </form>


<?php include_once 'footer.php'; ?>
    



<?php

$conn =mysqli_connect('localhost','root','saikat112233','test');
 if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $reg = $_POST['reg'];
    
   
    if(!empty($name) && !empty($reg)){
       $query = "INSERT INTO std (name,reg) VALUES('$name','$reg')";

       $createquery = mysqli_query($conn,$query);
       if($createquery){
          echo "Successfully inserted";
       }

       }else{
         echo "Field should not be empty";
    
    }
    }

 
?>
<!-- Delete data start-->
<?php
 if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM std WHERE id={$id}";
    $deletequery = mysqli_query($conn,$query);

    if($deletequery){
       echo "Data Delete successfully";
    }
 }
?>
<!-- Delete data end-->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Crud</title>
</head>

<body>
    <div class="container shadow m-5 p-3">
    <h3 class="text-center">Student List</h3>
        <form action="" method="POST" class="d-flex justify-content-around">
        
            <input type="text" name="name" placeholder="Enter your name" class="form-control">
            <input type="number" name="reg" placeholder="Enter your reg" class="form-control">

            <input type="submit" name="btn" value="Add student" class="btn btn-success">
        </form>
    </div>
  

  <!-- update part start -->

    <div class="container m-5 p-3">
        <form action="" method="POST" class="d-flex justify-content-around">
            <?php
         if(isset($_GET['update'])){
            $id = $_GET['update'];
            $query = "SELECT * FROM std WHERE id={$id}";
            $getdata = mysqli_query($conn,$query);
            while($rx= mysqli_fetch_assoc($getdata)){
               $id =$rx['id'];
               $name =$rx['name'];
               $reg =$rx['reg'];
          
         
         
         ?>
            <input type="text" name="name" value="<?php echo $name;?>" class="form-control">
            <input type="number" name="reg" value="<?php echo $reg;?>" class="form-control">

            <input type="submit" name="update_btn" value="Update" class="btn btn-success">

            <?php  }} ?>
             <?php
             if(isset($_POST['update_btn'])){
               $name = $_POST['name'];
               $reg = $_POST['reg'];

               if(!empty($name) && !empty($reg)){
                  $query = "UPDATE std SET name='$name',reg=$reg WHERE id=$id";
                  $updatequery = mysqli_query($conn,$query);
   
                  if($updatequery){
                     echo "Data updated";
               }
              
               }else{
                  echo "Field should not be empty";
               }
             }
             
             ?>

        </form>
    </div>
     <!-- update part end -->


<!-- Data show part-->
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Reg</th>
                <th>Action</th>
                <th>Action</th>
            </tr>

            <?php
            $query = "SELECT * FROM std";
            $readquery = mysqli_query($conn,$query);
            if($readquery->num_rows >0){
               while($rd = mysqli_fetch_assoc($readquery)){
                  $id =$rd['id'];
                  $name =$rd['name'];
                  $reg =$rd['reg'];
             
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $reg; ?></td>
                <td><a href="index.php?update=<?php echo $id; ?>" class="btn btn-info">UPDATE</a></td>
                <td><a href="index.php?delete=<?php echo $id; ?>" class="btn btn-danger">DELETE</a></td>
            </tr>
            <?php  }}else{echo "Data table is empty";}?>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
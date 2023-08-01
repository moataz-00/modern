
<?php include("./nav.php")?>
<?php

//add admin

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role=$_POST['role'];
   
  
  
  
  
  
       if(empty($name)){
        echo  "<div class='text-center col-5 mx-auto fs-2 alert alert-danger'> enter employee name</div>";
       } else {
  
    // query insert
    $insert = "INSERT INTO `admin` VALUES (NULL,'$name','$password',$role)";
    //run sql query
    $insertconnection = mysqli_query($conn, $insert);
    testmessage($insertconnection, "insert");
       }
  }

  
auth(1);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./crud.css">
  <link rel="stylesheet" href="./bootstrap.min.css">
 <link rel="stylesheet" href="./fontaswme modified/all.min.css">


</head>
<body>



<div class="container text-center" >
    

    <div class="text-center mt-3 fs-2 fb-5">ADD ADMIN</div>




    <form method="post" enctype="multipart/form-data">
      <div class="mb-3 col-8 mx-auto">


        <input  required  type="text" name="name" class="form-control" placeholder="name..." >
      </div>

      <div class="mb-3 col-8 mx-auto">


        <input type="text" name="password" class="form-control" placeholder="password...">
      </div>

      <div class="mb-3 col-8 mx-auto">


        <input type="text" name="role" class="form-control" placeholder="Role...">
      </div> 


      
    
<button class="btn btn-dark" name="send">ADD ADMIN</button>

    </form>



      <script src="./bootstrap.bundle.min.js"></script>
  <script src="./bootstrap.min.js"></script>
 <script src="./fontaswme modified/all.min.js"></script>
</body>
</html>
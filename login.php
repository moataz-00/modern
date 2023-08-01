<?php include("./nav.php")?>
<?php




if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
  
    $select = "SELECT * FROM `admin` WHERE `name`='$name' and `password`='$password'";
    $s = mysqli_query($conn, $select);
    $numofrows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
  
    if ($numofrows == 1) {
      //super global array
        $_SESSION['admin'] = [
            "name" => $row['name'],
            "role"=>$row['role']
            //"image"=>$row['name']
            
        ];

        
        
       header("location:crud.php");
    } else {
        echo  "<div class='text-center mx-auto col-3  alert alert-danger'>please enter a right name or password</div>";
        
    }

    
  
  }



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
    

    <div class="text-center mt-3 fs-2 fb-5">LOG IN</div>




    <form method="post" enctype="multipart/form-data">
      <div class="mb-3 col-8 mx-auto">


        <input  required  type="text" name="name" class="form-control" placeholder="name..." >
      </div>

      <div class="mb-3 col-8 mx-auto">


        <input type="text" name="password" class="form-control" placeholder="password...">
      </div>

      
    
<button class="btn btn-dark" name="login">LOG IN</button>
<a class="btn btn-dark" href="./index.php">BACK</a>

    </form>



      <script src="./bootstrap.bundle.min.js"></script>
  <script src="./bootstrap.min.js"></script>
 <script src="./fontaswme modified/all.min.js"></script>
</body>
</html>


<?php include("./nav.php")?>
<?php






//insert

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
 

//image code
     $image = $_FILES['image']['name'];
     $tempname = $_FILES['image']['tmp_name'];
     $location = "upload/" . $image;
     move_uploaded_file($tempname,$location);



     if(empty($name)){
      echo  "<div class='text-center col-5 mx-auto fs-2 alert alert-danger'> enter employee name</div>";
     } else {

  // query insert
  $insert = "INSERT INTO `employee` VALUES (NULL,'$name','$image')";
  //run sql query
  $insertconnection = mysqli_query($conn, $insert);
  testmessage($insertconnection, "insert");
     }
}

//-----------------------------------------------------------------------------------
//delete all
if(isset($_POST['delete-all'])){
  $delete_all="TRUNCATE TABLE employee";
  $d_all=mysqli_query($conn,$delete_all);
  header("location:crud.php");


}
//------------------------------

//delete
if(isset($_GET['delete'])){
  $id=$_GET['delete'];
  

  //select image to delete
$selectimage="SELECT `image` FROM `employee` where id= $id";
$runselect=mysqli_query($conn,$selectimage);
$row=mysqli_fetch_assoc($runselect);
$image=$row['image'];
unlink("./upload/$image");
  

  //sql delete
  $delete= "DELETE FROM `employee` WHERE id=$id";
  
  $d=mysqli_query($conn,$delete);

  
  header("location:crud.php");
  
  
  }

//--------------------------------------

 //update
 $name="";
 if(isset($_GET['edit'])){
 $id=$_GET['edit'];

 //sql select
 $show = "SELECT * FROM `employee` WHERE id=$id";

 //run
 $ss= mysqli_query($conn, $show);

 $data=mysqli_fetch_assoc($ss);

 $name=$data['name'];

if(isset($_POST['update'])){
$name = $_POST['name'];

//   //image code to edit

     if (!empty($_FILES['image']['name'])) {
       $image = $_FILES['image']['name'];
       $tempname = $_FILES['image']['tmp_name'];
       $location = "upload/" . $image;
       move_uploaded_file($tempname, $location);
       $imagename = $data['image'];
      unlink("./upload/$imagename");
   } else {
       $image = $data['image'];
   };

$update="UPDATE `employee` SET `name`='$name',`image`='$image' WHERE id=$id";
$u=mysqli_query($conn,$update);
header("location:crud.php");
}
} 

  
  


  

  //-------------------------------------------------------------
// select

// sql query
$select = "SELECT * FROM `employee`";
//run
$s = mysqli_query($conn, $select);
//----------------------------------------------------------

//select by name

if (isset($_POST['search'])) {
  $name = $_POST['name'];
  $search = "SELECT * FROM employee WHERE name='$name'";
  $f = mysqli_query($conn, $search);
  //header("location:curd.php");
  //testmessage($f, "found");
}


//-----------------------------------------------------------------------------------

//a-z

if (isset($_POST['asc'])) {
  $asc = "SELECT * FROM employee ORDER BY `name` ASC";
  $a = mysqli_query($conn, $asc);
  //header("location:curd.php");
  //tsestmessage($h, "high");
}

//-----------------------------------------------------------------------------------

//z-a

 if (isset($_POST['desc'])) {
   $desc = "SELECT * FROM employee ORDER BY `name` DESC";
   $d = mysqli_query($conn, $desc);
//   //header("location:curd.php");
   //tsestmessage($h, "high");
 }


 

auth(0);

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






</div>

  <div class="container text-center" >
    <form method="post">
      <div class="mb-3 d-flex col-8 mx-auto " role="search">
        <input class="form-control mt-5 me-2" type="search" name="name" placeholder="Search" aria-label="Search">
        <button class="btn btn-success mt-5 me-2" name="search">Search</button>
        
        
      </div>

      <button class="btn btn-dark me-2" name="asc">A-Z</button> 
        <button class="btn btn-dark me-2" name="desc">Z-A</button> 

    </form>

    <div class="text-center mt-3 fs-2 fb-5">CRUD FORM</div>




    <form method="post" enctype="multipart/form-data">
      <div class="mb-3 col-8 mx-auto">


        <input   type="text" name="name" class="form-control" placeholder="name..." value="<?php echo $name ?>">
      </div>

      <div class="mb-3 col-8 mx-auto">


        <input type="file" name="image" class="form-control" placeholder="image...">
      </div>





      <div class=" col-8  text-center mx-auto">
        <table class="table table-dark table-striped ">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">NAME</th>
              
              <th scope="3">ACTION</th>

             


            </tr>
          </thead>
          <tbody>


          <?php

if (isset($_POST['asc'])) :

    foreach ($a as $data) : ?>
        <tr>
            <th><?php echo $data['id'] ?></th>
            <th><?php echo $data['name'] ?></th>
            <th> <a href="./crud.php?delete=<?php echo $data ['id']?>"><i class="fa-solid fa-trash text-danger mx-1"></i></a>  <a href="./crud.php?edit=<?php echo $data ['id']?>"><i class="fa-solid fa-edit text-info"></i></a> <a href="./show.php?show=<?php echo $data ['id']?>"><i class="fa-solid fa-eye "></i></a></th>            

          
           
           
        </tr>

    <?php endforeach;


elseif (isset($_POST['desc'])) :


    foreach ($d as $data) : ?>
        <tr>
            <th><?php echo $data['id'] ?></th>
            <th><?php echo $data['name'] ?></th>
            <th> <a href="./crud.php?delete=<?php echo $data ['id']?>"><i class="fa-solid fa-trash text-danger mx-1"></i></a>  <a href="./crud.php?edit=<?php echo $data ['id']?>"><i class="fa-solid fa-edit text-info"></i></a> <a href="./show.php?show=<?php echo $data ['id']?>"><i class="fa-solid fa-eye "></i></a></th>            
            
           
           
        </tr>

    <?php endforeach;





elseif (isset($_POST['search'])) :


    foreach ($f as $data) : ?>
        <tr>
            <th><?php echo $data['id'] ?></th>
            <th><?php echo $data['name'] ?></th>
            <th> <a href="./crud.php?delete=<?php echo $data ['id']?>"><i class="fa-solid fa-trash text-danger mx-1"></i></a>  <a href="./crud.php?edit=<?php echo $data ['id']?>"><i class="fa-solid fa-edit text-info"></i></a> <a href="./show.php?show=<?php echo $data ['id']?>"><i class="fa-solid fa-eye "></i></a></th>            

            
           
           
        </tr>

    <?php endforeach;

 else :

    foreach ($s as $data) : ?>
        <tr>
            <th><?php echo $data['id'] ?></th>
            <th><?php echo $data['name'] ?></th>
            
            
            <th> <a href="./crud.php?delete=<?php echo $data ['id']?>"><i class="fa-solid fa-trash text-danger mx-1"></i></a>  <a href="./crud.php?edit=<?php echo $data ['id']?>"><i class="fa-solid fa-edit text-info"></i></a> <a href="./show.php?show=<?php echo $data ['id']?>"><i class="fa-solid fa-eye "></i></a></th>            
           
        </tr>
<?php endforeach;

endif; ?>



          </tbody>
        </table>
      </div>
      


      

      <button name="submit" class="btn btn-dark">SUBMIT</button>
      <button name="update" class="btn btn-success">UPDATE</button>
      <button name="delete-all" class="btn btn-danger">DELETE ALL</button>
      

     
    </form>
  </div>

  

  <script src="./bootstrap.bundle.min.js"></script>
  <script src="./bootstrap.min.js"></script>
 <script src="./fontaswme modified/all.min.js"></script>
 <script src="./aos/aos.js"></script>
 
  

  




</body>

</html>


<?php











// if (empty($name) ) {
//   echo  "<div class='text-center fs-3 alert alert-danger'>PLEASE ENTER PRODUCT NAME</div>";
// }elseif((empty($salary))||(!filter_var($salary,FILTER_VALIDATE_INT))) {
//   echo  "<div class='text-center fs-3 alert alert-danger'>PLEASE ENTER PRODUCT PRICE</div>";
// }elseif(empty($image)){
//   echo  "<div class='text-center fs-3 alert alert-danger'>PLEASE ENTER PRODUCT PICTURE</div>";
// }

?>
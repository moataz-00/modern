<?php include("./nav.php")?>

<?php

// show by id

if (isset($_GET['show'])) {
    $id = $_GET['show'];

    //select
    $select = "SELECT * FROM `employee` WHERE id=$id";
    $s = mysqli_query($conn, $select);
    //----
    $row = mysqli_fetch_assoc($s);
    $name = $row['name']; // amir
    $image = $row['image'];
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
    <link rel="stylesheet" href="./aos/aos.css">
    <link rel="stylesheet" href="./fontaswme modified/all.min.css">
</head>

<body>



    <div data-aos="fade-up" data-aos-duration="3000" class="container">
        
          
            <div class="card text-center mx-auto" style="width: 20rem;">
                <img src="./upload/<?php echo $image ?>" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title">Name: <?php echo $name ?></h5>

                    <div class=" mt-3"> <a href="./crud.php" class="btn btn-dark">Go back</a></div>
                </div>
            
        </div>


        
    </div>



    <script src="./bootstrap.bundle.min.js"></script>
    <script src="./bootstrap.min.js"></script>
    <script src="./fontaswme modified/all.min.js"></script>
    <script src="./aos/aos.js"></script>
    <script src="./app.js"></script>
</body>

</html>
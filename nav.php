
<?php 


session_start();

 if (isset($_GET['logout'])) {
   session_unset();
   session_destroy();
   header("location:login.php");
 };


    function testmessage($condtion, $message)
    {
      if ($condtion) {
        echo "<div class='alert alert-success text-center col-3 mx-auto'>
            $message DONE
            </div>";
      } else {
        echo "<div class='alert alert-danger text-center col-3 mx-auto'>
            $message FAILED
            </div>";
      }
    };


    function path($go){
       echo"<script>location.replace('/modern/$go')</script>";
   }
    
    
     function filter($value){
       $value=trim($value);
       $value=strip_tags($value);
       $value=htmlspecialchars($value);
       $value=stripslashes($value);
       return $value;
           }
    


    function auth($role1=null){
     if($_SESSION['admin']){
         if($_SESSION['admin']['role']==1||$_SESSION['admin']['role']==$role1){
            
         }else{
          path("crud.php");
         }
     }else{
      path("login.php");
     }



   
 }
    
    //------------------------------------------------------------------------------
    //connection
    
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "modern";
    
    $conn = mysqli_connect($host, $user, $pass, $dbname);


?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> Modern</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

<?php if(isset($_SESSION['admin'])) : ?> 
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
             
                
                  <a class="nav-link " href="./crud.php" role="button"  aria-expanded="false">
                    CRUD
                  </a>
              
            </ul>
          </div>


          <?php if($_SESSION['admin']['role']==1) : ?> 

          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              
                <a class="nav-link " href="./register.php" role="button"  aria-expanded="false">
                  Register
                </a>
                
            </ul>
          </div>
       <?php endif ;?>

         <?php endif ;?>

      </div>
      <div class="d-grid gap-2 d-md-flex justify-cont">

<?php if(isset($_SESSION['admin'])) : ?>
       
          <form >

            <button name="logout"  class="  btn btn-danger">LOGOUT</button>

          </form>
<?php else : ?>

          <div>
        <a class="btn btn-success" href="./login.php">LOG IN</a>
      </div>
       
<?php endif ;?>
      </div>

      ``
  </div>
</nav>

<?php 










?>
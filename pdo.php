<?php


//conect data base >PDO > sqlserver 
//mysqli_query(); >mysql only


  $dsn="mysql:host=localhost;dbname=modern";
  $pdo=new PDO($dsn,"root","");
 

  try{
    
    $in="INSERT INTO `employee` VALUES (NULL,'ahmed','dnjfghskjdfg')";
    $i=$pdo->prepare($in);
      $i->execute();
  }catch(Exception $x){
     echo $x->getMessage();
  }
 
//   $i=$pdo->prepare($in);
//   $i->execute();

?>
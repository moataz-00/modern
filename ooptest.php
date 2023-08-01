<?php
//oop
// protected public private 

//encabsulation

//inherntanc


 abstract class body {
    public $name;
    public $age;
    public $birthdate;



    public function eat(){
        echo "eat now <br>";
    }

    public function drink($somth){
        echo "drink $somth now<br>";
    }


    public function setage($crruentyear,$birthdate){
       
        $this->age =$crruentyear-$birthdate;
       echo $this-> age;
    }
    
    //  public function getage(){
    //      return $this->age;
    //  }


    abstract public function work();
    }


    class male extends body {

        
public function work(){
    echo "work hard";
}


//  public function eat(){
//       body::drink("cola");
//      echo"eat please";
//  }
        
    }




    class female extends body {
        public function work(){
            echo "man can work 12 hours";
        }
    }



//$obj=new body() ;
$obj2=new male;
print_r($obj2);
$obj2->work();


//$obj2->eat();




//print_r($obj2);


// echo $obj->name="amr <br>";
// echo $obj->birthdate="21/4/2001 <br>";
// echo $obj->age="21 <br>";



// $obj->drink("water");
//  $obj->setage(2023,2000);


 //print_r($obj)



?>
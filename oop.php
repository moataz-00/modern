

<?php 

// protectrd private public
//encabsulation
//private $age


//inhertance
//abstract
abstract class human{
    public $name;
    public $age;
    public $birthdate;

function drink($name){
    echo "$name drink now";
}
function eat(){
    echo "eat now <br>";
}

public function setage($crruentyear,$birthdate){
    $this->age=$crruentyear-$birthdate;
}

public function getage(){
    return $this->age;
}

abstract public function work();
}



class male extends human{
    public $maledate;
public function eat()
{
    human::eat();
    echo"eat please";
}

public function work(){
echo"work man";
}
    
}

class female extends human{
    public $femaledate;
public function eat()
{
    human::eat();
    echo"eat please";
}
public function work(){
    echo"work woman";
    }
}



$obj=new male();
$obj2=new female();

$obj->work();
$obj2->work();

//print_r($obj2);
//$obj2=new human();

// echo $obj2->name;

//$obj2=new human();

// $obj->name="amr";

//echo $obj->eat();
//$obj->setage(2023,2000);
//echo $obj->getage();

// print_r($obj2);
//print_r($obj);

?>
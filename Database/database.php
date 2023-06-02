<?php
try{
    $host='localhost';
    $dbname='e-commerce';
    $user='root';
    $passowrd='';
    $con=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$passowrd);

}catch(PDOException $e){

    echo $e->getMessage();
}

?>
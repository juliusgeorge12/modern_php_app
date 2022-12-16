<?php

use component\database\connectors\mysql\mysql_connector_factory;
use component\database\connectors\mysql\mysqli_connector;

 require_once "vendor/autoload.php";

  
 $test = (new mysql_connector_factory(new mysqli_connector))
 ->connect('localhost' , 'root' , '' , 'shopflix_database')
 ->get_connection();
 $test->prepare("Select * from product_variant")
  ->execute_query();
  $test->get_result();
 
  var_dump($test->fetch_assoc_prepared());


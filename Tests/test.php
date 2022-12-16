<?php

use component\database\connectors\mysql\mysqli_connector;

 $test = new mysqli_connector;
 $test->connect('localhost' , 'root' , '' , 'shopflix_database');
<?php
include 'ConnectDB.php';
include 'StackController.php';

use Controller\DB\conn;
use controller\Stack\Stack;



$objConDB = new conn();
$objStackPush = new Stack();
$conn = $objConDB->connect('stack', 'localhost', 'root','');
$index = $objStackPush->getIndex($conn)+1;
$objStackPush->push($index, $_REQUEST['data'], $conn);
header('location: ./../index.php');

?>
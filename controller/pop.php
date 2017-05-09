<?php
include 'ConnectDB.php';
include 'StackController.php';

use Controller\DB\conn;
use controller\Stack\Stack;



$objConDB = new conn();
$objStackPop = new Stack();
$conn = $objConDB->connect('stack', 'localhost', 'root','');
$index = $objStackPop->getIndex($conn);
$objStackPop->pop($index, $conn);
header('location: ./../index.php');

?>
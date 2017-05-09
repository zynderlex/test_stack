<?php
include 'ConnectDB.php';
include 'StackController.php';

use Controller\DB\conn;
use controller\Stack\Stack;




$objConDB = new conn();

$objSpecial = new Stack();
$conn = $objConDB->connect('stack', 'localhost', 'root','');
$objSpecial->special($_REQUEST['index']+1,$_REQUEST['insert_data'], $conn);
header('location: ./../index.php');
?>
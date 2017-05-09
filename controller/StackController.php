<?php

namespace controller\Stack;
class Stack {
	
	public static function getIndex($con) {
       	$sql = "SELECT * FROM stack ORDER BY Id DESC LIMIT 1";
    	$query = mysqli_query($con, $sql);
    	$results = mysqli_fetch_object($query);
       		if (isset($results->stack_index)) {
       			return $results->stack_index;
       		}else{

       			return -1;

       		}
   	
    } 

    public static function push($index, $data, $con) {
       	$sql = "INSERT INTO `stack` (`ID`, `stack_index`, `stack_data`) VALUES (NULL, '".$index."', '".$data."');";
       	$query = mysqli_query($con, $sql);
    }

    public static function pop($index, $con) {
       	$sql = "DELETE FROM stack WHERE stack_index = '".$index."'";
       	$query = mysqli_query($con, $sql);
    }

    public static function special($index, $newdata, $con) {
    	$select_index = "SELECT * FROM stack WHERE stack_index >= '".$index."' ORDER BY stack_index DESC ;";
    	$query_select = mysqli_query($con, $select_index);
    	while ($data = mysqli_fetch_object($query_select)) {
    			
                $sql = "UPDATE `stack` SET `stack_index` = stack_index + 1 WHERE stack_index = '".$data->stack_index."'";
         mysqli_query($con, $sql);
            }
       	$sql_insertStack = "INSERT INTO `stack` (`ID`, `stack_index`, `stack_data`) VALUES (NULL, '".$index."', '".$newdata."');";
       	$query = mysqli_query($con, $sql_insertStack); 
    }


    
}

?>
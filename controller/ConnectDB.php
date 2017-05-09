<?php
namespace controller\DB;
class Conn {

    public function connect($database, $hostName, $user, $password) {
       $connect = mysqli_connect($hostName, $user, $password);
        mysqli_select_db($connect, $database);
        mysqli_set_charset($connect, "utf8");

        if($connect) {

            return $connect;

            
        } else {
            return false;
        } 
    }
}
?>
<?php
include './controller/ConnectDB.php';
include './controller/StackController.php';

use Controller\DB\conn;
use controller\Stack\Stack;
$objConDB = new conn();
$con = $objConDB->connect('stack', 'localhost', 'root','');
?>
<table align="center">
<tr>
<td align="center">
<form action="./controller/push.php" method="post">
<h3>--------------- Push ---------------</h3>

Push data : <input type="text" name="data" required>

<button type="submit">Push</button>
</form>
</td>
</tr>


<tr>
<td align="center">
	

<form action="./controller/special.php">
<h3>--------------- Special ---------------</h3>
	Insert after : 
	<select name="index" required>
	<?php

	$sql_index = "SELECT * FROM stack ORDER BY stack_index DESC";
    $query_index = mysqli_query($con, $sql_index);

    while($results_index = mysqli_fetch_object($query_index)){?>
    <option><?php echo $results_index->stack_index ?></option>
 

		<?php } ?>
	</select>
	data <input type="text" name="insert_data" required >
	<button>Insert</button>
</form>
</td>	
</tr>
<tr><td align="center">
<h3>------------------ Pop ------------------</h3>
<a href="./controller/pop.php"><button>Pop</button></a>
</td></tr>
</table>
<br />
<table border="1" align="center">
<tr><th>Index</th><th>Data</th></tr>
<?php
	$sql = "SELECT * FROM stack ORDER BY stack_index DESC";
    $query = mysqli_query($con, $sql);

    while($results = mysqli_fetch_object($query)){?>
    <tr>
    	<td><?php echo $results->stack_index ?></td>
    	<td><?php echo $results->stack_data ?></td>
    </tr>
    
    	
<?php    }
?>
</table>

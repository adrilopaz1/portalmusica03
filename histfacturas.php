<?php
  
   
   include('session_music.php');
   
	$id=$_SESSION['id'];
 
		factura($id, $db);
		

	function factura($id, $db){
	
		$sqlinvoice="select CustomerId, InvoiceDate from invoice where CustomerId=$id";

		
		$resultado1 = mysqli_query( $db, $sqlinvoice);
	
		if(mysqli_num_rows($resultado1) > 0) {
    // output data of each row
		echo "<TABLE border=1>";
		echo "<tr>";
			echo "<td>Cliente</td>";
			echo "<td>Fecha</td>";

		echo "</tr>";
	
    while($row = mysqli_fetch_assoc($resultado1)) {
		
		echo "<tr>";
			echo "<td>".$row['CustomerId']."</td>";
			echo "<td>".$row['InvoiceDate']."</td>";
			
	
		echo "</tr>";

    }
	echo "</table>";

	echo "<input type='button' value='atras' onclick='history.back()'>";
  
	

	}
	
 }
 
  
  
?>
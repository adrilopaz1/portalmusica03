<?php
  
   include('session_music.php');
   
	$date1=$_REQUEST['data1'];
	$date2=$_REQUEST['data2'];
	$id=$_SESSION['id'];
 
		
		
function errores($error_level, $error_message){

	echo "<b> ERROR Codigo error: </br> $error_level - <b> Mensaje: $error_message </br><br>";
	echo "<input type='button' value='atras' onclick='history.back()'>";
	die();
}

set_error_handler("errores");

if($date1==null){

	trigger_error("El campo fecha1 no puede estar vacio");

}
else{	

		factura($id, $date1, $date2, $db);
		
		}
		

?>

<?php


	function factura($id, $date1, $date2, $db){
	
		$sqlinvoice="select InvoiceId, InvoiceDate from invoice where CustomerId=$id and InvoiceDate between '$date1' and '$date2'";

		
		$resultado1 = mysqli_query( $db, $sqlinvoice);
	
		if(mysqli_num_rows($resultado1) > 0) {
    // output data of each row
		echo "<TABLE border=1>";
		echo "<tr>";
			echo "<td>Id Producto</td>";
			echo "<td>Fecha</td>";

		echo "</tr>";
	
    while($row = mysqli_fetch_assoc($resultado1)) {
		
		echo "<tr>";
			echo "<td>".$row['InvoiceId']."</td>";
			echo "<td>".$row['InvoiceDate']."</td>";
			
	
		echo "</tr>";

    }
	echo "</table>";

	echo "<input type='button' value='atras' onclick='history.back()'>";
  
	

	}
	
 }
 ?>
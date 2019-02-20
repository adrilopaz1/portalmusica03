<?php
  include('session_music.php');
	// session_start(); 
 
	$id=$_SESSION['id'];
	$id1=$_SESSION['id'];
	$id2=$_SESSION['id'];
	$hoy=date('Y-m-d');
	$total=0;

	$anadirCancion=unserialize($_COOKIE['canciones']);
 
	foreach($anadirCancion as $indice=>$name){
		
		$sql1="select unitprice from track where name='$name'";

		$resultado1 = mysqli_query($db, $sql1);
	
		if(mysqli_num_rows($resultado1) > 0) {
    
		while($row = mysqli_fetch_assoc($resultado1)) {
		
			$precio=$row['unitprice'];
			$total=$total+$precio;
			}
		}
	
	
	}

	// echo $total;

	$infac=ultimafactura($id1, $db);
	
	echo "Numero de factura ".$infac;
	
	// // $sqlinsert="INSERT INTO invoice VALUES ($infac, $id, '$hoy', '$to_date' )";
	
	mostrarFacturas($id2, $db);
	
	
	
	
	
	

?>


<?php


	function ultimafactura($id1, $db){
	
		$maxinser;
	
		
	$sqlfactura="select max(invoiceId) as maxi from invoice where customerid=$id1";
	
	$resultfactura = mysqli_query($db, $sqlfactura);
	
	if(mysqli_num_rows($resultfactura) > 0) {
    
		while($row = mysqli_fetch_assoc($resultfactura)) {
		
			$maxfact=$row['maxi'];
			//este es el resultado al que se inserta la factura
			$maxinser=$maxfact+1;
		}
    }
	
	return $maxinser;
	
	}



	function mostrarFacturas($id2, $db){
		
		$sql1="select invoiceId, CustomerId, InvoiceDate from invoice where CustomerId=$id2";
		
		$resultado1 = mysqli_query($db, $sql1);

		if(mysqli_num_rows($resultado1) > 0) {
		// output data of each row
			echo "<TABLE border=1>";
			echo "<tr>";
				echo "<td>Id_factura</td>";
				echo "<td>Id_Cliente</td>";
				echo "<td>fecha_factura</td>";
			echo "</tr>";
		
		while($row = mysqli_fetch_assoc($resultado1)) {
			
			echo "<tr>";
				echo "<td>".$row['invoiceId']."</td>";
				echo "<td>".$row['CustomerId']."</td>";
				echo "<td>".$row['InvoiceDate']."</td>";
			echo "</tr>";

		}
		 
		echo "</TABLE>";
		
		}
	}
	
	
	
?>
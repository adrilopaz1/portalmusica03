<?php
 include('session_music.php');

// BORRAR UNA COOKIE -> establecer una fecha expiración del pasado con función setcookie
// set the expiration date to one hour ago

  
  echo "<form name='form1' action='carritoCompra.php' method='get'>";
	
		$sql1="select name from Track ";
		
		$result1=mysqli_query($db, $sql1);
		
		if (mysqli_num_rows($result1) > 0) {

		echo "Canción "; 

		echo "<select name='cd1'>";
		while ($fila = mysqli_fetch_assoc($result1)) {

			echo "<option>".$fila["name"]."</option>";	

		}
		echo "</select>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		}
	echo "<input type='submit' value='Enviar'>";
	echo "<input type='button' value='atras' onclick='history.back()'>";
  
 echo "</form>";
  


setcookie('canciones', "", time() - 3600);

?>

	


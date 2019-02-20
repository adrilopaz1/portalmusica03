<?php
  
  include('session_music.php');
 
 echo "<form name='form1' action='consultafacturas.php' method='get'>";
	

		echo "Introduce la primera fecha <input type='date' name='data1' size='15'/>";
		echo "<br>";
		echo "<br>";
		echo "Introduce la segunda fecha <input type='date' name='data2' size='15'/>";
		echo "<br>";
		echo "<br>";
	echo "<input type='submit' value='Enviar'>";
	echo "<input type='button' value='atras' onclick='history.back()'>";
  
 echo "</form>";
?>
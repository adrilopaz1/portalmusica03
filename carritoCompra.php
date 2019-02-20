<?php
 // La cookie caducará en un año 
 
	$cancion=$_REQUEST['cd1'];
	$array=array($cancion);
 
  echo "<form name='form1' action='insertarCompras.php' method='get'>";
 
  if(isset($_COOKIE['canciones']))
  { //Si la cookie exite recuperamos el valor del número visitas
	
	$anadirCancion=unserialize($_COOKIE['canciones']);
	array_push($anadirCancion, $cancion);
	
	foreach($anadirCancion as $count=>$id){
		echo "$count";
		echo "$id"." ";
		echo "<br>";
	}
	
	setcookie('canciones', serialize($anadirCancion), time() + 36500); 
  
	echo "<input type='submit' value='Finalizar Compra'>";
	
	
	
  } 
  else 
  { 
    // Si la cookie no existe -> es el primer acceso por tanto mensaje de bienvenida
    setcookie('canciones', serialize($array), time() + 36500); 
    $mensaje = 'Bienvenido a nuestra página web'; 
		
  }

	echo "<input type='button' value='atras' onclick='history.back()'>";  
	
	echo "</form>";
?> 

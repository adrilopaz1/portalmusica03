<?php
   include('session_music.php');
   
   $mail=$_SESSION['login_user'];
   $lastname=$_SESSION['password_user'];
   
   $sqlId="select CustomerId from customer where Email='$mail' and LastName='$lastname' ";
   
   $result1=mysqli_query($db, $sqlId);
   
   if(mysqli_num_rows($result1) > 0){
   
		while($row = mysqli_fetch_assoc($result1)) {
		
		$_SESSION['id']=$row['CustomerId'];

		}
   
   }
      
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Bienvenido <?php echo $login_session; ?></h1> 
	  
	  
	  <nav class="dropdownmenu">
  <ol>
    <li><a href="welcome_music.php">Cancion</a></li>
	
	 <ul>
		<li><a href="nuevaCompra.php">Nueva Cancion</a></li>
		<li><a href="downmusic.php">Continuar anadiendo al carrito</a></li>
	</ul>
    <li><a href="histfacturas.php">Historial Facturas</a></li>
    <li><a href="facturas.php">Consultar Facturas</a></li> 

    </li>
  </ol>
</nav>
 
      <h2><a href = "logout_music.php">Cerrar Sesion</a></h2>
   </body>
   
</html>
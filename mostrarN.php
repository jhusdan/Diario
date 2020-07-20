<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title></title>
</head>

<body>
   <?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");

     
    
    $query = "SELECT * FROM diario";
    $result = $conexion->query($query);
    If (!$result) die("Error fatal");

    $filas = $result->num_rows;
    for ($j = 0; $j < $filas; ++$j){
 $fila = $result->fetch_array(MYSQLI_ASSOC);

 echo '<center><br><br>MIS NOTAS ESCRITAS</center>';
        echo "<center><br><br></center>";
        echo '<center>titulo: ' . htmlspecialchars($fila['titulo']) . '<br></cenetr>';
        echo '<center>fecha: ' . htmlspecialchars($fila['fecha']) . '<br></cenetr>';
        echo '<center>descripcion: ' . htmlspecialchars($fila['descripcion']).'</cenetr>' ;
     }
     
     echo "<center><br>
   <form action='miDiario.php' method='post'>
  <input class='boton' type='submit' value=' SALIR'></form><br>
  </center>"; 

  echo "<center><form  action='buscarNotas.php' method='post'>
  <input  class='boton' type='submit'value='BUSCAR DIARIO' <br></center>";
?>
    <style>
    
body{
    margin:0;
    padding:0;
    background: url(rojo.png) no-repeat center fixed;
    background-size: cover;
    background-position: cenetr;
    font-family: sans-serif;
    }
    
    
.texto{
margin: 0;
padding:0 20px;
background-color:#000032;
opacity:45;
text-align: center;
font-size:12px;
border-radius:10px;
width:180px;
height:25px;
}
.boton{
border:none;
outline:none;
width:200px;
height:30px;
background:#B00000;
color:#fff;
font-size:10px;
border-radius:10px;}
}

</style>  
</body>
</html>
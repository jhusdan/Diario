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

    function desconectar(){
global $conexion;
mysqli_close($conexion);
}
$texto = '';
$registros = '';

if($_POST){
 $busqueda = trim($_POST['buscar']);
 $entero = 0;
 if (empty($busqueda)){
 $texto = 'Ingre';
 }else{


$query = "SELECT * FROM diario WHERE titulo LIKE '%"
.$busqueda. "%' ORDER BY titulo";
$result = $conexion->query($query); 
 if (mysqli_num_rows($result) > 0){
$registros = '<p> ENCONTRAMOS ' . mysqli_num_rows($result) . ' DIARIO CON EL TITULO INGRESADO  </p>';
 while($fila = mysqli_fetch_assoc($result)){
 $texto .= $fila['titulo'] . ' <br >';
 $texto .= $fila['fecha'] . '<br >';
 $texto .= $fila['descripcion'] . ' <br >';
 }
 }else{
 $texto = "<br><br><br><br><br><br>No encontramos tu diario en Base de Datos, es posible que aún no ha escrito";
 }
 mysqli_close($conexion);
 }
}
  echo"<center><h4>$registros</h4></center>";
 echo"<center><h4>$texto</h4></center>";
?>
<center><br><br><br><br>
<div> 

<h4>BUSCA TU DIARIO</h4>
      <form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input class="texto"id="buscar" name="buscar" type="search" placeholder="Ingrese el titulo"autofocus >
       <input class="boton" type="submit" name="buscador" value="BUSCAR">
</form></div>
</center>

<center>
   <form  action="modeficarD.php"method="post"><br><br><br><br>
   <input class="boton" type="submit" value="EDITAR DIARIO " >
   </form>
   </cenetr>';

<center>
   <form  action="miDiario.php"method="post">
   <input class="boton" type="submit" value="SALIR " >
   </form>
   </cenetr>';

<style>
    
    body{
    margin:0;
    padding:0;
    background: url(limon.jpg) no-repeat center fixed;
    background-size: cover;
    background-position: cenetr;
    font-family: sans-serif;
    }
    .texto{
margin: 0;
padding:0 20px;
background-color:#F3FEEE;
color:#000;
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
width:100px;
height:30px;
background:#1F3F00;
color:#fff;
font-size:10px;
border-radius:10px;}
}
  </style>
</body>
</html>
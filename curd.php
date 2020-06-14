<!DOCTYPE html>
<meta charset= "UTF-8">
<LINK REL=StyleSheet HREF="style2.css" TYPE="text/css" MEDIA=screen>

<div id = "menu">
    <ul>
        <li>Home</li>
        <li class = "cerrar-sesion">
            <a href="logout.php">Cerrar Sesión</a>
        </li>
    </ul>
</div>

<section>
    <h1>Bienvenidos</h1>
</section>
<?php

    $con = mysqli_connect("localhost", "root", "", "crud") or die ("Error");

?>
<html>

<head>
    <meta charset = "UTF-8">    
    <title>CRUD PHP & MYSQL </title>
   
</head>

<body>
    <center>
    <form method = "post" action = "curd.php">
    <label> Nombre</label><br>
    <input type="text" name="nombre" placeholder = "Escriba nombre del usuario"/> <br>
    <label> Apellido</label><br>
    <input type="text" name="apellido" placeholder = "Escriba apellido del usuario"/> <br>
    <label> Email</label> <br>
    <input type="text" name="email" placeholder = "Escriba email del usuario"/> <br>
    <input type ="submit" name = "insert"  value = "Ingresar Datos"/> <br>
    </form>
    </center>


<?php
    if(isset($_POST['insert'])){

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        $insertar = "INSERT INTO usuarios (nombre, apellido, email) VALUES ('$nombre','$apellido','$email')";

        $ejecutar = mysqli_query($con, $insertar);

        if($ejecutar){

            echo "<h3> Insertado Correctamente</h3>";
        }

    }
?>
<br>
<center>
<table width="500" border = "2">
   <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Email</th>
</tr>
    <?php
        $consulta = "SELECT * FROM usuarios";

        $ejecutar = mysqli_query($con, $consulta);

        $i = 0;

        while($fila = mysqli_fetch_array($ejecutar)){
            $id = $fila['id'];
            $nombre = $fila['nombre'];
            $apellido = $fila['apellido'];
            $email= $fila['email'];

            $i++;
        
    ?>

        <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $nombre; ?></td>
              <td><?php echo $apellido; ?></td>
              <td><?php echo $email; ?></td>
              <td><a href="curd.php?editar= <?php echo $id;?>"><input type = "submit" value = "Editar"></a></input></td>
              <td><a href="curd.php?eliminar= <?php echo $id;?>"><input type= "submit" value = "Eliminar" ></a></td>
              
        </tr>
        <?php }?>


</table>
        </center>

<?php
    if(isset($_GET['editar'])){
         include("editar.php");
    }
?>

<?php
    if(isset($_GET['eliminar'])){
         $eliminar_id = $_GET['eliminar'];

         $eliminar = " DELETE FROM usuarios WHERE id = '$eliminar_id' ";
         $ejecutar = mysqli_query($con, $eliminar);
         
         if($ejecutar){
            echo "<script> alert('Usuario eliminado')</script>";
            echo "<script> window.open('curd.php', '_self')</script>";
         }
    }
?>
</body>
</html>
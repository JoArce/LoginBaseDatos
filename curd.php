<!DOCTYPE html>
<meta charset= "UTF-8">
<?php
    $con = mysqli_connect("localhost", "root", "", "crud") or die ("Error");

?>
<html>

<head>
    <meta charset = "UTF-8">    
    <title>CRUD PHP & MYSQL </title>
   
</head>

<body>
    <form method = "post" action = "curd.php">
    <label> Nombre</label><br>
    <input type="text" name="nombre" placeholder = "Escriba nombre del usuario"/> <br>
    <label> Apellido</label><br>
    <input type="text" name="apellido" placeholder = "Escriba apellido del usuario"/> <br>
    <label> Email</label> <br>
    <input type="text" name="email" placeholder = "Escriba email del usuario"/> <br>
    <input type ="submit" name = "insert"  value = "Ingresar Datos"/> <br>
    </form>


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
<table width="500" border = "2" style = "background-color: #F9F9F9;">
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
              <td><a href="curd.php?editar= <?php echo $id;?>">Editar</a></td>
              <td><a href="curd.php?eliminar= <?php echo $id;?>">Eliminar</a></td>
              
        </tr>
        <?php }?>


</table>

</body>
</html>
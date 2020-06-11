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

        $usuario = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        $insertar = "INSERT INTO usuarios (nombre, apellido, email) VALUES ('$usuario','$apellido','$email')";

        $ejecutar = mysqli_query($con, $insertar);

        if($ejecutar){

            echo "<h3> Insertado Correctamente</h3>";
        }

    }
?>
<br>
<table width="500" border = "2" style = "background-color: #F9F9F9;">
    <th></th>
    <th></th>
    <th></th>

</table>

</body>
</html>
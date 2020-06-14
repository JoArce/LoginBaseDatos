<!DOCTYPE html>
<head>
<LINK REL=StyleSheet HREF="style.css" TYPE="text/css" MEDIA=screen>
</head>
<center>

  <form action=" curd.php" method = "POST">
    <table>
    <tr><td colpsan = "2"><label>Login</label></td></tr>
    <tr><td aling = "center" rowspan ="5"> <img src="monobjj.png"></td><td><label> Usuario</label></td></tr>
    <tr><td><input type="text" name = "usuario"></td></tr>
    <tr><td><label> Password</label></td></tr>
    <tr><td><input type="password" name = "password"></td></tr>
    <tr><td><input type = "submit" value = "Iniciar Sesion"></td></tr>


    
    </table>
  
  </form>
</center>



<?php
include_once 'user.php';
include_once 'user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'login.php';

}else if(isset($_POST['username']) && isset($_POST['password'])){
    
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'curd.php';
    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'login.php';
    }
}else{
    //echo "login";
    include_once 'login.php';
}



?>



</html>
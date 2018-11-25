<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Login Habit Tracker</title>
    <link rel="stylesheet" href="scr/css/pure-min.css">
    <!--<link rel="stylesheet" href="scr/css/style.css">-->
</head>
 <body>
     
 
  <?php include 'login.php';?>
   <h1>Logowanie</h1>
   <form method="POST" action="" class="pure-form-aligned">
     
    <input type="text" name="username" placeholder="użytkownik">

    <input type="password" name="password" placeholder="hasło">
    <input type="submit" name="send" class="pure-button pure-button-primary">
</form>
<?php
if(isset($_POST['send'])) {
     $object = new Login();
     $object->checkUser($_POST['username'], $_POST['password']);
     foreach($object->errors as $error)  {
     echo $error;
     
     } 
}
?>


</body>
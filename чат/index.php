<html>
<title>Чат</title>
 
<head>
</head>
 
<body>
<?php
//Запускаем сессию для работы с кукис файлами
session_start();
//Если отсутствуют логин и айди,
//отображаем форму входа и регистрации
if(!isset($_SESSION['login']) || !isset($_SESSION['id']))
{
?>
<center>
<form action="register.php" method="POST">
<h3>Регистрация</h3>
Логин: <br> <input type="text" name="login">
<br>
Пароль: <br> <input type="password" name="password">
<br>
Имя: <br> <input type="text" name="name">
<br>
Фамилия: <br> <input type="text" name="surname">
<br>
Город: <br> <input type="text" name="city">
<br>
<input type="submit" value="Зарегистрироваться">
</form>
 
<form action="login.php" method="POST">
<h3>Вход</h3>
Логин: <br> <input type="text" name="login">
<br>
Пароль: <br> <input type="password" name="password">
<br>
<input type="submit" value="Вход">
</form>
</center>
<?php
}
//Если сессия запущена, то есть присутствуют файлы 
//кукис, и в них есть логин и айди
//то запускаем чат
if(isset($_SESSION['login']) && isset($_SESSION['id']))
{
 
    include("bd.php");
    $user=$_SESSION['login'];
    $res=mysql_query("SELECT * FROM `users` WHERE `login`='$user' ");
    $user_data=mysql_fetch_array($res);
	include("chat.php");
}
?>
</body>
 
</html>
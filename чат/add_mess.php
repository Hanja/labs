<?php
//Проверям есть ли переменные на добавление
if(isset($_POST['mess']) && $_POST['mess']!="" && $_POST['mess']!=" ")
{
	//Стартуем сессию для записи логина пользователя
	session_start();
	//Принимаем переменную сообщения
	$mess=$_POST['mess'];
	//Переменная с логином пользователя
	$login=$_SESSION['login'];
	//Время отправки сообщения
	$time=$_POST['time'];   
	$userID=$_POST['userID'];
	//Подключаемся к базе
	include("bd.php");
	//Добавляем все в таблицу
	$res=mysql_query("INSERT INTO `messages` (`login`,`message`,`time`, `userFlag`) VALUES ('$login','$mess','$time','$userFlag') ");
}
?>
<?php
	//Стартуем сессию для удаления записи
	session_start();
	//Принимаем переменную сообщения
	$messID=$_POST['messID'];  
	//Подключаемся к базе
	include("bd.php");
	mysql_query("DELETE FROM `messages` WHERE `id`=$messID");
?>
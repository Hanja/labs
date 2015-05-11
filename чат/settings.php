<?php
	//Стартуем сессию для удаления записи
	session_start();
	//Принимаем переменную сообщения
	$buttonID=$_POST[buttonID];  
	$userID=$_POST[userID];
	//Подключаемся к базе
	include("bd.php");
	echo "HELLO".$buttonID;
	if ($buttonID==forgive)
		mysql_query("UPDATE `users` SET `flag`='0' WHERE `id`=$userID");
	if ($buttonID==ban)
		mysql_query("UPDATE `users` SET `flag`='3' WHERE `id`=$userID");
	if ($buttonID==mute)
		mysql_query("UPDATE `users` SET `flag`='2' WHERE `id`=$userID");
	if ($buttonID==removeAdmin)
		mysql_query("UPDATE `users` SET `flag`='0' WHERE `id`=$userID");
	if ($buttonID=='giveAdmin')
		mysql_query("UPDATE `users` SET `flag`='1' WHERE `id`=$userID");
?>
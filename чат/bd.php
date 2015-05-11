<?php
//Подключаемся к mysql серверу
$mysql_connect=mysql_connect("mysql5.000webhost.com","a6015464_hanja","eugenecrabsforever1");
//Выбираем базу данных mysite
$db=mysql_select_db("a6015464_chat");
mysql_query('SET NAMES utf8');
mysql_query('SET CHARACTER SET utf8' );
mysql_query('SET COLLATION_CONNECTION="utf8_general_ci"' ); 

?>
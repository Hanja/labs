<?php
	//�������� ������ ��� �������� ������
	session_start();
	//��������� ���������� ���������
	$messID=$_POST['messID'];  
	//������������ � ����
	include("bd.php");
	mysql_query("DELETE FROM `messages` WHERE `id`=$messID");
?>
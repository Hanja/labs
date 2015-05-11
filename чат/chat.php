<!-- Стили для блока с сообщениями!-->
<style>
#messages
{
	width:50%;
	height: 60%;
	overflow:auto;
	border: 1px solid black; 
	position: absolute;
	top: 10%;
	left: 10%;
	z-index: 1;
}
#user
{
	height: 15%;
	width: 25%;
	right: 10%;
	top: 10%;
	position: absolute;
	font-size: 2ex;
}
#adminPanel
{
	height: 50%;
	width: 50%;
	display: none;
	background: grey;
	position: absolute;
	left: 25%;
	right: 25%;
	top: 25%;
	bottom: 25%;
	z-index: 3;
}
#background
{
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	background: black;
	opacity: 0.9;
	display: none;
	position: fixed;
	z-index: 2;
}
</style>

<!--Подключаем Jquery!-->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
	//Загружаем библиотеку JQuery
	google.load("jquery", "1.3.2");
	google.load("jqueryui", "1.7.2");	
	//Функция отправки сообщения
	function send()
	{
		//Считываем сообщение из поля ввода с id mess_to_add
		var mess=$("#mess_to_send").val();
		var time=new Date();
		
		// Отсылаем паметры
		if (<?php echo $user_data['flag'] ?> == 2)
			$('#mess_to_send').val('Вы не можете отправлять сообщения');
		else
			$.ajax({
                type: "POST",
                url: "add_mess.php",
                data: {'mess': mess,'time': time.getHours()+':'+time.getMinutes()+':'+time.getSeconds(), 'userID': <?php echo $user_data['id'] ?>},
                // Выводим то что вернул PHP
                success: function(html)
				{
					//Если все успешно, загружаем сообщения
					load_messes();
					//Очищаем форму ввода сообщения
					$("#mess_to_send").val(''); 
                }
			});
	}
	//Функция загрузки сообщений
	function load_messes()
	{			
		$.ajax({
                type: "POST",
                url:  "load_messes.php",
				data: {'flag':<?php echo $user_data['flag'] ?>},
                // Выводим то что вернул PHP
                success: function(html)
				{
					//Очищаем форму ввода
					$("#messages").empty();
					//Выводим что вернул нам php
					$("#messages").append(html);
					//Прокручиваем блок вниз(если сообщений много)
					$("#messages").scrollTop(90000);
                }
        });
	}
	function clearField()
	{
		$('#mess_to_send').val('');
	}
	function admin()
	{
		$.ajax({
			type: "POST",
			url: "admin.php",
			data: {'userID': <?php echo $user_data['id'] ?>},
			success: function(html)
				{
					//Выводим что вернул нам php
					$("#adminPanel").append(html);
                }
		});
	}
	function openAdmin()
	{	
			$('#adminPanel').css('display','block');
			$('#background').css('display','block');
	}
	function closeAdmin()
	{	
			$('#adminPanel').css('display','none');
			$('#background').css('display','none');
	}
</script>
<div id="user">
	<?php
		echo "<center>";
		if ($user_data['flag']==1)
		{
			echo "<b>Вы администратор</b><br />
			<input type='button' id='openAdmin' onclick='openAdmin()' value='Управление' style='height: 30px; width: 150px; text-align: center'></input><br />";
		}
		if ($user_data['flag']==2)
		{
			echo "<h2><b>!!!READ ONLY!!!</b></h2><br />";
		}
		echo "Ваш логин: <b>". $user_data['login']."</b><br />";
		echo "Ваше имя: <b>". $user_data['name']."</b><br />";
		echo "Ваша фамилия: <b>". $user_data['surname']."</b><br />";
		echo "Место жительства: <b>". $user_data['city']."</b><br />";
		echo "<br /><form action='exit.php'>
			<button style='color: red;' type='submit'>Выход</button>
		</form>";   
		echo "</center>";
	?>
</div>
<div id="messages">
</div>
<form action="javascript:send();">
<input type="text" onclick='clearField()' style="width: 35%; height: 50px; position: absolute; top: 75%; left:10%; " id="mess_to_send">
<input type="button" value="Отправить" onclick="send()" style="width: 15%; height: 50px; top: 75%; left: 45%; position: absolute;">
</form>
<div id="background">
</div>
<div id="adminPanel">
	<input type="button" onclick="closeAdmin()" value="X" style="color: red; width: 20xp; height: 20px; text-align: center; float: right; top: 0; position: relative;"></input>
	<script>admin()</script>
</div>
<script>
//При загрузке страницы подгружаем сообщения
load_messes();
//Ставим цикл 
setInterval(load_messes,3000);
</script>

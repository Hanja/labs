<script>
	$(document).ready(function()
	{
		$('.sett').click(function() 
		{
			var id=$(this).attr('id');
			var userID=$(this).attr('name');
			$.ajax({
                type: "POST",
                url:  "settings.php",
				data: {'buttonID': id, 'userID': userID},
			});
		});
	});
</script>
<?php
	include("bd.php");
	$res=mysql_query("SELECT * FROM `users` ORDER BY `id` ");
	$userID=$_POST['userID'];
	echo "<br /><br />";
	while($d=mysql_fetch_array($res)) 
	{
		if ($d['id']!=$userID)
		{
			echo $d['login']."<input type='button' class='sett' name='".$d['id']."' id='forgive' value='Простить' style='position: relative; float: right;'></input>".
			"<input type='button' class='sett' name='".$d['id']."' id='ban' value='Бан' style='position: relative; float: right;'></input>".
			"<input type='button' class='sett' name='".$d['id']."' id='mute' value='Мут' style='position: relative; float: right;'></input>".
			"<input type='button' class='sett' name='".$d['id']."' id='removeAdmin' value='Лишить админки' style='position: relative; float: right;'></input>".
			"<input type='button' class='sett' name='".$d['id']."' id='giveAdmin' value='Дать админку' style='position: relative; float: right;'></input><br /><br />";
		}
	}
?> 
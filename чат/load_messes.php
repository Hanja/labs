<script>
	$(document).ready(function()
	{
		$('.delete').click(function() 
		{
			var id=$(this).attr('id');
			$.ajax({
                type: "POST",
                url:  "delete.php",
				data: {'messID': id},
			}); 
		});
	});
	function reloadPage()
	{
		location.reload();
	}
</script>
<?php
//Подключаемся к БД
include("bd.php");
//Выбираем все сообщения
$res=mysql_query("SELECT * FROM `messages` ORDER BY `id` ");
$flag=$_POST['flag'];
//Выводим все сообщения на экран
while($d=mysql_fetch_array($res))
{	
	if ($flag==1)
		echo $d['time'].":<b><font color='orange'> ".$d['login'].":</font></b>".$d['message']."
			<input id='".$d['id']."'class='delete' type='button' style='right: 0; height: 20px; text-align: center; width: 30px; top: 0; color: red; float: right; font-size: 2ex;' value='x'></input><br /><br />";
	else
		echo $d['time'].":<b><font color='orange'> ".$d['login'].":</font></b>".$d['message']."<br /><br />";
}
?>

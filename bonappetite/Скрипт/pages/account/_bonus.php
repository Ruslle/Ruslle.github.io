<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Ежедневный бонус";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

# Настройки бонусов
$bonus_min = 10;
$bonus_max = 100;

?>
<div class="s-bk-lf">
	<div class="acc-title2">Бонус 24 часа</div>
</div>
<div class="silver-bk">
<div class="clr"></div>	
<BR />
<div class="alert alert-info">
Бонус выдется 1 раз в 24 часа. <BR />

Сумма бонуса генерируется случайно от <b>1</b> до <b>5</b> руб.
</div>
<BR /><BR />
<?PHP
$ddel = $dadd + 60*60*24;
$db->Query("SELECT COUNT(*) FROM db_bonus_list WHERE user_id = '$usid' AND date_del > '$dadd'");

$hide_form = false;

	if($db->FetchRow() == 0){
	
		# Выдача бонуса
		if(isset($_POST["bonus"])){
		
			$sum = rand($bonus_min, rand($bonus_min, $bonus_max) );
			
			# Зачилсяем юзверю
			$db->Query("UPDATE db_users_b SET money_b = money_b + '$sum' WHERE id = '$usid'");
			
			# Вносим запись в список бонусов
			$dadd = time();
			
			$db->Query("INSERT INTO db_bonus_list (user, user_id, sum, date_add, date_del) VALUES ('$uname','$usid','$sum','$dadd','$ddel')");
			
			# Случайная очистка устаревших записей
			if(rand(1, 10) == 7) $db->Query("DELETE FROM db_bonus_list WHERE date_del < '$dadd'");
			
			echo "<center><font color = 'green'><b>На Ваш счет для покупок зачислен бонус в размере {$sum} серебра</b></font></center><BR />";
			
			$hide_form = true;
			
		}
			
			# Показывать или нет форму
			if(!$hide_form){
?>

<form action="" method="post">
<table width="330" border="0" align="center">
  <tr>
    <td align="center"></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="bonus" value="Получить бонус" style="height: 30px; margin-top:10px;"></td>
  </tr>
</table>
</form>

<?PHP 

			}

	}else echo "<center><font color = 'red'><b>Вы уже получали бонус за последние 24 часа</b></font></center><BR />"; ?>




<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h4>Последние 20 бонусов</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">ID</td>
    <td align="center" class="m-tb">Пользователь</td>
	<td align="center" class="m-tb">Сумма</td>
	<td align="center" class="m-tb">Дата</td>
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_bonus_list ORDER BY id DESC LIMIT 20");
  
	if($db->NumRows() > 0){
  
  		while($bon = $db->FetchArray()){
		
		?>
		<tr class="htt">
    		<td align="center"><?=$bon["id"]; ?></td>
    		<td align="center"><?=$bon["user"]; ?></td>
    		<td align="center"><?=$bon["sum"]; ?></td>
			<td align="center"><?=date("d.m.Y",$bon["date_add"]); ?></td>
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="5">Нет записей</td></tr>'
  ?>

  
</table>

<div class="clr"></div>		
</div>





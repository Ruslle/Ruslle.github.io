<?PHP
#########################################
##скрипт экономической игры BONAPPETITE##
##         Разработчик DimanZO         ##
##            dimanzo@list.ru          ##
## Разработка любых экономических игр  ##
#########################################
$_OPTIMIZATION["title"] = "Аккаунт - Профиль";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
								
								<div class="s-bk-lf">
<div class="acc-title2">Мой профиль</div>
								</div>
								<div class="silver-bk">
  <center><img style="margin: 10px 0px 0px 0px;" src="/img/profile.png"></center>
<br>
<div class="alert alert-info">
								<p><center>Ваша дата регистрации: <font color="#000;"><?=date("d.m.Y в H:i:s",$prof_data["date_reg"]); ?></font></center></p>
</div>
<div class="alert alert-info" style="background-color:#FFF3E2;">
<br><center>
	<font color="red" style="font-size:20px;">От 1р до 999 рублей</font> <font color="green" style="font-size:25px;">+10%</font><br> 
	<font color="red" style="font-size:20px;">От 1000р до 2999 рублей</font> <font color="green" style="font-size:25px;">+20%</font><br> 
	<font color="red" style="font-size:20px;">От 3000р до 4999 рублей</font> <font color="green" style="font-size:25px;">+30%</font><br> 
	<font color="red" style="font-size:20px;">От 5000р ... </font> <font color="green" style="font-size:25px;">+40%</font><br> 
<br></div>
<center>
<!-- Put this script tag to the place, where the Share button will be -->
<script type="text/javascript"><!--
document.write(VK.Share.button({url: "http://foodgame.ru/?i=16346"},{type: "round_nocount", text: "Разместить приглашение на стене Вконтакте"}));
--></script>
</center>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><td colspan="2" align="center">&nbsp;</td></tr>
  <tr>
    <td align="left" style="padding:3px;">ID</td>
    <td align="left" style="padding:3px;"><font color="#000;"><?=$prof_data["id"]; ?></font></td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;">Псевдоним</td>
    <td align="left" style="padding:3px;"><font color="#000;"><?=$prof_data["user"]; ?></font></td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;">Email</td>
    <td align="left" style="padding:3px;"><font color="#000;"><?=$prof_data["email"]; ?></font></td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;">Баланс (Для покупок)</td>
    <td align="left" style="padding:3px;"><font color="#000;"><?=sprintf("%.2f",$prof_data["money_b"]); ?> Руб.</font></td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;">Баланс (На вывод)</td>
    <td align="left" style="padding:3px;"><font color="#000;"><?=sprintf("%.2f",$prof_data["money_p"]); ?> Руб.</font></td>
  </tr>
  <tr>
    <td align="left" style="padding:3px;">Заработано на рефералах</td>
    <td align="left" style="padding:3px;"><font color="#000;"><?=sprintf("%.2f",$prof_data["from_referals"]); ?> Руб.</font></td>
  </tr>
    <tr>
    <td align="left" style="padding:3px;">Выплачено</td>
    <td align="left" style="padding:3px;"><font color="#000;"><?=sprintf("%.2f",$prof_data["payment_sum"]); ?> <?=$config->VAL; ?></font></td>
  </tr>
  <tr align="left">
    <td colspan="2" style="padding:3px;">&nbsp;</td>
    </tr>
  <tr>
    <td align="left" style="padding:3px;">Вас пригласил:</td>
    <td align="left" style="padding:3px;"><font color="#000;"><?=$prof_data["referer"]; ?> его ID <?=$prof_data["referer_id"]; ?></font></td>
  </tr>
</table>



   

								<div class="clr"></div>	
								</div>
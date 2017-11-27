<div class="s-bk-lf">
	<div class="acc-title2">Пополнение баланса</div>
</div>
<?PHP

#########################################
##скрипт экономической игры BONAPPETITE##
##         Разработчик DimanZO         ##
##            dimanzo@list.ru          ##
## Разработка любых экономических игр  ##
#########################################

$_OPTIMIZATION["title"] = "Аккаунт - Пополнение баланса";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();
?>

<div class="silver-bk">
<div class="alert alert-info">
Для пополнения игрового счета используйте платёжную систему Payeer или  Free Kassa.
</div>
<br>
<div class="alert alert-info" style="background-color:#FFF3E2;">
<br><center>
	<font color="red" style="font-size:20px;">От 1р до 999 рублей</font> <font color="green" style="font-size:25px;">+10%</font><br> 
	<font color="red" style="font-size:20px;">От 1000р до 2999 рублей</font> <font color="green" style="font-size:25px;">+20%</font><br> 
	<font color="red" style="font-size:20px;">От 3000р до 4999 рублей</font> <font color="green" style="font-size:25px;">+30%</font><br> 
	<font color="red" style="font-size:20px;">От 5000р ... </font> <font color="green" style="font-size:25px;">+40%</font><br> 
<br></div>

<center> <a href="/account/insertPayeer" ><img src="/img/inpayeer.png" ></a> 
<a href="/account/insertFree" ><img src="/img/infk.png" ></a> </center>
<div class="clr"></div>		
</div>

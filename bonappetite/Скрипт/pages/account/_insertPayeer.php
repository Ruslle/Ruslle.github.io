<style>
.lg2 {
background: none;
border: 1px solid #8d8d8d;
border-radius: 5px;
background: url(/img/inpt.png) repeat-x;
width: 100px;
height: 27px;
padding: 0px 0px 0px 10px;
margin: 9px 0px 0px 0px;
}
</style>
<div class="s-bk-lf">
	<div class="acc-title2">Пополнить с Payeer</div>
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

/*
if($_SESSION["user_id"] != 1){
echo "<center><b><font color = red>Технические работы</font></b></center>";
return;
}
*/
?>

<div class="silver-bk">
<div class="alert alert-info">
В этом разделе можно пополнить игровой счет аккаунта через платёжный агрегатор Payeer. </div>
<br>
<div class="alert alert-info">
<center><b>Курс пополнения игрового счета: 1 <?=$config->VAL; ?> = <?=$sonfig_site["ser_per_wmr"]; ?> руб</b></center>
</div>
<br>
  <center><img style="margin: 10px 0px 0px 0px;" src="/img/payeer-logo.png"></center>
<br>
<script type="text/javascript">
var min1 = 0.01;
var ser_pr1 = 1;
function calculate1(st_q1) {
	var sum_insert1 = parseFloat(st_q1);
	$('#res_sum1').html( (sum_insert1 * ser_pr1).toFixed(0) );
}
</script>
<div id="error3"></div>
<div class="alert alert-info" style="background-color:#FFF3E2;">
<br><center>
	<font color="red" style="font-size:20px;">От 1р до 999 рублей</font> <font color="green" style="font-size:25px;">+10%</font><br> 
	<font color="red" style="font-size:20px;">От 1000р до 2999 рублей</font> <font color="green" style="font-size:25px;">+20%</font><br> 
	<font color="red" style="font-size:20px;">От 3000р до 4999 рублей</font> <font color="green" style="font-size:25px;">+30%</font><br> 
	<font color="red" style="font-size:20px;">От 5000р ... </font> <font color="green" style="font-size:25px;">+40%</font><br> 
<br></div>


<?
/// db_payeer_insert
if(isset($_POST["sum"])){

$sum = round(floatval($_POST["sum"]),2);


# Заносим в БД
$db->Query("INSERT INTO db_payeer_insert (user_id, user, sum, date_add) VALUES ('".$_SESSION["user_id"]."','".$_SESSION["user"]."','$sum','".time()."')");

$desc = base64_encode($_SERVER["HTTP_HOST"]." - USER ".$_SESSION["user"]);
$m_shop = $config->shopID;
$m_orderid = $db->LastInsert();
$m_amount = number_format($sum, 2, ".", "");
$m_curr = "RUB";
$m_desc = $desc;
$m_key = $config->secretW;

$arHash = array(
 $m_shop,
 $m_orderid,
 $m_amount,
 $m_curr,
 $m_desc,
 $m_key
);
$sign = strtoupper(hash('sha256', implode(":", $arHash)));

?>
<center>
<form method="GET" action="//payeer.com/api/merchant/m.php">
	<input type="hidden" name="m_shop" value="<?=$config->shopID; ?>">
	<input type="hidden" name="m_orderid" value="<?=$m_orderid; ?>">
	<input type="hidden" name="m_amount" value="<?=number_format($sum, 2, ".", "")?>">
	<input type="hidden" name="m_curr" value="RUB">
	<input type="hidden" name="m_desc" value="<?=$desc; ?>">
	<input type="hidden" name="m_sign" value="<?=$sign; ?>">
	 
	<input type="submit" name="m_process" class="btn_pay" value="Оплатить и получить РУБЛИ" />
</form>
</center>
<div class="clr"></div>		
</div>
<?PHP

return;
}
?>
<script type="text/javascript">
var min = 0.01;
var ser_pr = 100;
function calculate(st_q) {
    
	var sum_insert = parseFloat(st_q);
    var sum_a1 = sum_insert * ser_pr;
    var sum_b1;
	if (sum_insert>=1 && sum_insert<2499) {
	   sum_b1 = sum_a1 * 0.5;
       $('#res_sum').html( (sum_a1.toFixed(0) + ' + ' + sum_b1.toFixed(0)) );
	}
    if (sum_insert>=2500 && sum_insert<5000) {
	   sum_b1 = sum_a1 * 1;
       $('#res_sum').html( (sum_a1.toFixed(0) + ' + ' + sum_b1.toFixed(0)) );
	}
	if (sum_insert>=5000 && sum_insert<20000) {
	   sum_b1 = sum_a1 * 1.5;
       $('#res_sum').html( (sum_a1.toFixed(0) + ' + ' + sum_b1.toFixed(0)) );
	}
	
}
	
</script>
<div class="alert alert-success" role="alert">
<div id="error3"></div>
<form method="POST" action="">
			<p>Перед покупкой Золота соберите все ресурсы</p> 
    <input type="hidden" name="m" value="<?=$fk_merchant_id?>">
Введите сумму [<?=$config->VAL; ?>]:  
<input type="text" value="100" name="sum" size="7" id="psevdo" onchange="calculate(this.value)" onkeyup="calculate(this.value)" onfocusout="calculate(this.value)" onactivate="calculate(this.value)" ondeactivate="calculate(this.value)"> 

    Вы получите <span id="res_sum">10000</span> Золота
	<BR /><BR />

    <center> <input type="submit" id="submit" value="Пополнить c payeer" class="btn_pay"> </center>


</form>
<script type="text/javascript">
calculate(100);
</script></center>


<div class="clr"></div>		
</div>

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
	<div class="acc-title2">��������� � Free Kassa</div>
</div>


<?PHP
#########################################
##������ ������������� ���� BONAPPETITE##
##         ����������� DimanZO         ##
##            dimanzo@list.ru          ##
## ���������� ����� ������������� ���  ##
#########################################

$_OPTIMIZATION["title"] = "������� - ���������� �������";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();
?>
<div class="silver-bk">
<div class="alert alert-info">
� ���� ������� ����� ��������� ������� ���� �������� ����� �������� ������� Free Kassa. </div>

<br>
<div class="alert alert-info">
<center><b>���� ���������� �������� �����: 1 <?=$config->VAL; ?> = <?=$sonfig_site["ser_per_wmr"]; ?> ���</b></center>
</div>
<br>
   <center><img style="margin: 10px 0px 0px 0px;" src="/img/fk-logo.png"></center>

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
	<font color="red" style="font-size:20px;">�� 1� �� 999 ������</font> <font color="green" style="font-size:25px;">+10%</font><br> 
	<font color="red" style="font-size:20px;">�� 1000� �� 2999 ������</font> <font color="green" style="font-size:25px;">+20%</font><br> 
	<font color="red" style="font-size:20px;">�� 3000� �� 4999 ������</font> <font color="green" style="font-size:25px;">+30%</font><br> 
	<font color="red" style="font-size:20px;">�� 5000� ... </font> <font color="green" style="font-size:25px;">+40%</font><br> 
<br></div>

<?

$fk_merchant_id = '2532'; //merchant_id ID �������� � free-kassa.ru http://free-kassa.ru/merchant/cabinet/help/
$fk_merchant_key = 'qqwweerrttyy1'; //��������� ����� http://free-kassa.ru/merchant/cabinet/profile/tech.php


?>
<script type="text/javascript">
var min = 1;
var ser_pr = 100;
function calculate(st_q) {
    
	var sum_insert = parseInt(st_q);
	$('#res_sum').html( (sum_insert * ser_pr) );
	
	var re = /[^0-9\.]/gi;
    var url = window.location.href;
    var desc = '<?=$usid;?>';
    var sum = $('#sum').val();
    if (re.test(sum)) {
        sum = sum.replace(re, '');
        $('#oa').val(sum);
    }
    if (sum < min) {
        $('#error').html('����� ������ ���� ������ '+min);
		$('#submit').attr("disabled", "disabled");
        return false;
    } else {
        $('#error').html('');
    }

    $.get('/free-kassa-data.php?prepare_once=1&l='+desc+'&oa='+sum, function(data) {
         var re_anwer = /<hash>([0-9a-z]+)<\/hash>/gi;
         $('#s').val(re_anwer.exec(data)[1]);
         $('#submit').removeAttr("disabled");
    });
}
	
</script>
<center>
<div id="error3"></div>
<form method=GET action="http://www.free-kassa.ru/merchant/cash.php">
    <input type="hidden" name="m" value="<?=$fk_merchant_id?>">
������� ����� [<?=$config->VAL; ?>]:  <input type="text" name="oa" id="sum" value="100" size="7" id="oa" onchange="calculate(this.value)" onkeyup="calculate(this.value)" onfocusout="calculate(this.value)" onactivate="calculate(this.value)" ondeactivate="calculate(this.value)"> 
    <input type="hidden" name="s" id="s" value="0"> �� �������� <span id="res_sum">10000</span> �������
	<input type="hidden" name="us_id" id="us_id" value="<?=$usid;?>">
    <br>
    <input type="hidden" name="o" id="desc" value="<?=$usid;?>" />
    <br>
	</center>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><input type="submit" id="free" name="free" value="���������" class="btn_pay" style="vertical-align: 5px; margin: 10px;" readonly=""></td></tr>
</center>
</form>
<script type="text/javascript">
calculate(100);
</script>


<BR /><BR />


<div class="clr"></div>		
</div>


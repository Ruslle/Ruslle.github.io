<div class="s-bk-lf">
	<div class="acc-title2">���������� �������</div>
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
��� ���������� �������� ����� ����������� �������� ������� Payeer ���  Free Kassa.
</div>
<br>
<div class="alert alert-info" style="background-color:#FFF3E2;">
<br><center>
	<font color="red" style="font-size:20px;">�� 1� �� 999 ������</font> <font color="green" style="font-size:25px;">+10%</font><br> 
	<font color="red" style="font-size:20px;">�� 1000� �� 2999 ������</font> <font color="green" style="font-size:25px;">+20%</font><br> 
	<font color="red" style="font-size:20px;">�� 3000� �� 4999 ������</font> <font color="green" style="font-size:25px;">+30%</font><br> 
	<font color="red" style="font-size:20px;">�� 5000� ... </font> <font color="green" style="font-size:25px;">+40%</font><br> 
<br></div>

<center> <a href="/account/insertPayeer" ><img src="/img/inpayeer.png" ></a> 
<a href="/account/insertFree" ><img src="/img/infk.png" ></a> </center>
<div class="clr"></div>		
</div>

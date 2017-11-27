<style>
.fermadiv {
background: url(/img/fr-block2.png) no-repeat;
border-radius: 10px;
border: 1px solid rgba(255, 182, 0, 0);
width: 500px;
height: 163px;
float: center;
margin: 0px auto 20px;
color: #8E3209;
padding: 4px 0px 0px 5px;
}
.h-ferm {
padding: 4px 0px 0px 5px;
margin: 0px auto;
}
</style>
<div class="s-bk-lf">
	<div class="acc-title2">Кухня</div>
</div>
<div class="silver-bk">
<div class="alert alert-info">
Забирайте на кухне приготовленные Вашими поварами блюда. Еда будет готова через каждые 10
минут. Блюда постоянно накапливаются, и забирать их можно в любое удобное для Вас время.
Они никогда не испортятся и не исчезнут!</div>


<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Склад";
$usid = $_SESSION["user_id"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

	if(isset($_POST["sbor"])){
	
		if($user_data["last_sbor"] < (time() - 600) ){
		
			$tomat_s = $func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);
			$straw_s = $func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);
			$pump_s = $func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);
			$peas_s = $func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);
			$pean_s = $func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);
			
			$db->Query("UPDATE db_users_b SET 
			a_b = a_b + '$tomat_s', 
			b_b = b_b + '$straw_s', 
			c_b = c_b + '$pump_s', 
			d_b = d_b + '$peas_s', 
			e_b = e_b + '$pean_s', 
			all_time_a = all_time_a + '$tomat_s',
			all_time_b = all_time_b + '$straw_s',
			all_time_c = all_time_c + '$pump_s',
			all_time_d = all_time_d + '$peas_s',
			all_time_e = all_time_e + '$pean_s',
			last_sbor = '".time()."' 
			WHERE id = '$usid' LIMIT 1");
			
			echo "<center><font color = 'green'><b>Вы собрали урожай</b></font></center><BR />";
			
			$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
			$user_data = $db->FetchArray();
			
		}else echo "<center><font color = 'red'><b>Урожай можно собирать не чаще 1го раза за 10 минут</b></font></center><BR />";
	
	}



?>
<form action="" method="post">
<table align="center">
	<tbody><tr>
		<td>
		<div class="fermadiv"> 
		<table align="center">
			<tbody><tr>
				<td align="center" width="150"><img src="/img/fruit/hotdog-m.jpg"></td>
			<td align="center" width="105"><span class="naz">Нанято</span><br><span class="h-ferm"><b><?=$user_data["a_t"]; ?></b></span></td>
			<td align="center" width="105"><span class="naz">Прибыль</span><br><span class="h-ferm"><b><?=$func->SellItems($user_data["a_b"], $sonfig_site["items_per_coin"]); ?> руб.</b></span></td>
			</tr>
		</tbody></table>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="fermadiv"> 
		<table align="center">
			<tbody><tr>
				<td align="center" width="150"><img src="/img/fruit/burger-m.jpg"></td>
			<td align="center" width="105"><span class="naz">Нанято</span><br><span class="h-ferm"><b><?=$user_data["b_t"]; ?></b></span></td>
			<td align="center" width="105"><span class="naz">Прибыль</span><br><span class="h-ferm"><b><?=$func->SellItems($user_data["b_b"], $sonfig_site["items_per_coin"]); ?> руб.</b></span></td>
			</tr>
		</tbody></table>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="fermadiv"> 
		<table align="center">
			<tbody><tr>
				<td align="center" width="150"><img src="/img/fruit/pizza-m.jpg"></td>
			<td align="center" width="105"><span class="naz">Нанято</span><br><span class="h-ferm"><b><?=$user_data["c_t"]; ?></b></span></td>
			<td align="center" width="105"><span class="naz">Прибыль</span><br><span class="h-ferm"><b><?=$func->SellItems($user_data["c_b"], $sonfig_site["items_per_coin"]); ?> руб.</b></span></td>
			</tr>
		</tbody></table>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="fermadiv"> 
		<table align="center">
			<tbody><tr>
				<td align="center" width="150"><img src="/img/fruit/sushi-m.jpg"></td>
				<td align="center" width="105"><span class="naz">Нанято</span><br><span class="h-ferm"><b><?=$user_data["d_t"]; ?></b></span></td>
			<td align="center" width="105"><span class="naz">Прибыль</span><br><span class="h-ferm"><b><?=$func->SellItems($user_data["d_b"], $sonfig_site["items_per_coin"]); ?> руб.</b></span></td>
			</tr>
		</tbody></table>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="fermadiv"> 
		<table align="center">
			<tbody><tr>
				<td align="center" width="150"><img src="/img/fruit/desert-m.jpg"></td>
				<td align="center" width="105"><span class="naz">Нанято</span><br><span class="h-ferm"><b><?=$user_data["e_t"]; ?></b></span></td>
			<td align="center" width="105"><span class="naz">Прибыль</span><br><span class="h-ferm"><b><?=$func->SellItems($user_data["e_b"], $sonfig_site["items_per_coin"]); ?> руб.</b></span></td>
			</tr>
		</tbody></table>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="fermadiv"> 
		<table align="center">
			<tbody><tr>
				<td align="center" width="150"><img src="/img/fruit/kruassan-m.jpg"></td>
				<td align="center" width="105"><span class="naz">Нанято</span><br><span class="h-ferm"><b>0</b></span></td>
			<td align="center" width="105"><span class="naz">Прибыль</span><br><span class="h-ferm"><b>0.00 руб.</b></span></td>
			</tr>
		</tbody></table>
		</div>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><center><input type="submit" name="sbor" value="Собрать блюда" class="btn_pay"></center></td>
	</tr>
</tbody></table>
</form>
<div class="clr"></div>
</div>




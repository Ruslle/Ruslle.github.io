<div class="s-bk-lf">
<div class="acc-title2">Нанять повара</div>
</div>
<div class="silver-bk">
	<div class="clr"></div>	
<div class="silver-bk2" role="alert">
<div class="alert alert-info">
<p>Здесь Вы можете нанять поваров. Каждый из них готовит свое особое блюдо, которое можно
потом продать и обменять на реальные деньги. Чем повар дороже, тем больше он приготовит
блюд, и тем самым принесет Вам больший заработок. Вы можете нанимать их в любом
количестве, повара останутся у Вас навсегда.</p></div></div>
<?PHP
#########################################
##скрипт экономической игры BONAPPETITE##
##         Разработчик DimanZO         ##
##            dimanzo@list.ru          ##
## Разработка любых экономических игр  ##
#########################################




$_OPTIMIZATION["title"] = "Аккаунт - Ферма";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

# Покупка нового дерева
if(isset($_POST["item"])){

$array_items = array(1 => "a_t", 2 => "b_t", 3 => "c_t", 4 => "d_t", 5 => "e_t");
$array_name = array(1 => "Лайм", 2 => "Вишня", 3 => "Клубника", 4 => "Киви", 5 => "Апельсин");
$item = intval($_POST["item"]);
$citem = $array_items[$item];

	if(strlen($citem) >= 3){
		
		# Проверяем средства пользователя
		$need_money = $sonfig_site["amount_".$citem];
		if($need_money <= $user_data["money_b"]){
		
			if($user_data["last_sbor"] == 0 OR $user_data["last_sbor"] > ( time() - 60*20) ){
				
				$to_referer = $need_money * 0.1;
				# Добавляем дерево и списываем деньги
				$db->Query("UPDATE db_users_b SET money_b = money_b - $need_money, $citem = $citem + 1,  
				last_sbor = IF(last_sbor > 0, last_sbor, '".time()."') WHERE id = '$usid'");
				
				# Вносим запись о покупке
				$db->Query("INSERT INTO db_stats_btree (user_id, user, tree_name, amount, date_add, date_del) 
				VALUES ('$usid','$usname','".$array_name[$item]."','$need_money','".time()."','".(time()+60*60*24*15)."')");
				
				echo "<center><font color = 'green'><b>Вы успешно посадили саженец</b></font></center><BR />";
				
				$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
				$user_data = $db->FetchArray();
				
			}else echo "<center><font color = 'red'><b>Перед тем как докупить саженцы следует собрать урожай на складе!</b></font></center><BR />";
		
		}else echo "<center><font color = 'red'><b>Недостаточно Руб. для покупки</b></font></center><BR />";
	
	}else echo 222;

}

?>



<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/hotdog.jpg">
	</div>
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>Шеф хот-дог</b></div>
		<div class="fr-te-gr">Доход в день: <font color="#000000"><?=$sonfig_site["a_in_h"]; ?> руб.</font></div>
		<div class="fr-te-gr">Цена: <font color="#000000"><?=$sonfig_site["amount_a_t"]; ?> Руб.</font></div>
		<div class="fr-te-gr">Нанято: <font color="#000000"><?=$user_data["a_t"]; ?> шт.</font></div>
		<div class="fr-te-gr">Окупаемость: <font color="#8E3209"><b>40</b> дней.</font></div>
		<input type="hidden" name="item" value="1">
		<input type="number" step="1" min="1" name="birds" value="1" style="text-align:center; height: 31px; margin-top:10px; border-radius: 5px; width: 60px" size="5">
		<input type="submit" value="Нанять" style="height: 30px; margin-top:10px;" class="btn_pay">
	</div>
	</form>
</div>

<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/burger.jpg">
	</div>
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>Шеф бургер</b></div>
		<div class="fr-te-gr">Доход в день: <font color="#000000"><?=$sonfig_site["b_in_h"]; ?> руб.</font></div>
		<div class="fr-te-gr">Цена: <font color="#000000"><?=$sonfig_site["amount_b_t"]; ?> Руб.</font></div>
		<div class="fr-te-gr">Нанято: <font color="#000000"><?=$user_data["b_t"]; ?> шт.</font></div>
		<div class="fr-te-gr">Окупаемость: <font color="#8E3209"><b>30</b> дней.</font></div>
		<input type="hidden" name="item" value="1">
		<input type="number" step="1" min="1" name="birds" value="1" style="text-align:center; height: 31px; margin-top:10px; border-radius: 5px; width: 60px" size="5">
		<input type="submit" value="Нанять" style="height: 30px; margin-top:10px;" class="btn_pay">
	</div>
	</form>
</div>

<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/pizza.jpg">
	</div>
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>Шеф пицца</b></div>
		<div class="fr-te-gr">Доход в день: <font color="#000000"><?=$sonfig_site["c_in_h"]; ?> руб.</font></div>
		<div class="fr-te-gr">Цена: <font color="#000000"><?=$sonfig_site["amount_c_t"]; ?> Руб.</font></div>
		<div class="fr-te-gr">Нанято: <font color="#000000"><?=$user_data["c_t"]; ?> шт.</font></div>
		<div class="fr-te-gr">Окупаемость: <font color="#8E3209"><b>25</b> дней.</font></div>
		<input type="hidden" name="item" value="1">
		<input type="number" step="1" min="1" name="birds" value="1" style="text-align:center; height: 31px; margin-top:10px; border-radius: 5px; width: 60px" size="5">
		<input type="submit" value="Нанять" style="height: 30px; margin-top:10px;" class="btn_pay">
	</div>
	</form>
</div>

<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/sushi.jpg">
	</div>
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>Шеф суши</b></div>
		<div class="fr-te-gr">Доход в день: <font color="#000000"><?=$sonfig_site["d_in_h"]; ?> руб.</font></div>
		<div class="fr-te-gr">Цена: <font color="#000000"><?=$sonfig_site["amount_d_t"]; ?> Руб.</font></div>
		<div class="fr-te-gr">Нанято: <font color="#000000"><?=$user_data["d_t"]; ?> шт.</font></div>
		<div class="fr-te-gr">Окупаемость: <font color="#8E3209"><b>20</b> дней.</font></div>
		<input type="hidden" name="item" value="1">
		<input type="number" step="1" min="1" name="birds" value="1" style="text-align:center; height: 31px; margin-top:10px; border-radius: 5px; width: 60px" size="5">
		<input type="submit" value="Нанять" style="height: 30px; margin-top:10px;" class="btn_pay">
	</div>
	</form>
</div>

<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/desert.jpg">
	</div>
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>Шеф десерт</b></div>
		<div class="fr-te-gr">Доход в день: <font color="#000000"><?=$sonfig_site["e_in_h"]; ?> руб.</font></div>
		<div class="fr-te-gr">Цена: <font color="#000000"><?=$sonfig_site["amount_e_t"]; ?> Руб.</font></div>
		<div class="fr-te-gr">Нанято: <font color="#000000"><?=$user_data["e_t"]; ?> шт.</font></div>
		<div class="fr-te-gr">Окупаемость: <font color="#8E3209"><b>15</b> дней.</font></div>
		<input type="hidden" name="item" value="1">
		<input type="number" step="1" min="1" name="birds" value="1" style="text-align:center; height: 31px; margin-top:10px; border-radius: 5px; width: 60px" size="5">
		<input type="submit" value="Нанять" style="height: 30px; margin-top:10px;" class="btn_pay">
	</div>
	</form>
</div>

<div class="fr-block">
	<form action="" method="post">
	<div class="cl-fr-lf">
		<img src="/img/fruit/kruassan.jpg">
	</div>
	<div class="cl-fr-rg" style="padding-left:20px;">
		<div class="fr-te-gr-title"><b>Шеф круассан</b></div>
		<div class="fr-te-gr">Доход в день: <font color="#8E3209"><b>500</b> руб.</font></div>
		<div class="fr-te-gr">Цена: <font color="#8E3209"><b>5000</b> руб.</font></div>
		<div class="fr-te-gr">Нанято: <font color="#8E3209"><b>0</b> шт.</font></div>
		<div class="fr-te-gr">Окупаемость: <font color="#8E3209"><b>10</b> дней.</font></div>
                <input type="hidden" name="item" value="6">
		<input type="number" step="1" min="1" name="birds" value="1" style="text-align:center; height: 31px; margin-top:10px; border-radius: 5px; width: 60px" size="5">
		<input type="submit" value="Нанять" style="height: 30px; margin-top:10px;" class="btn_pay">
	</div>
	</form>
</div>

<div class="clr"></div>
</div>



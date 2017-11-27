<?PHP
$tfstats = time() - 60*60*24;
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment, 
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();

?>

<div class="stat">
	<div class="st-lf">
<br>
<br>
<b>
	<div class="line">Всего участников: </div>
	<div class="line">Новых за 24 часа: </div>
	<div class="line">Выплачено всего: </div>
	<div class="line">Пополнено всего: </div>
        <div class="line">Проект работает: </div>
</b>
	</div>

	<div class="st-rg">
<br>
<br>
<br>
<b>
	<div class="line-st"><?=$stats_data["all_users"]; ?> чел.</div>
	<div class="line-st"><?=$stats_data["new_users"]; ?> чел.</div>
	<div class="line-st"><?=sprintf("%.2f",$stats_data["all_payment"]+773.76); ?> <?=$config->VAL; ?></div>
	<div class="line-st"><?=sprintf("%.2f",$stats_data["all_insert"]+5000); ?> <?=$config->VAL; ?></div>
	<div class="line-st"><font color="#f77827"><?=intval(((time() - $config->SYSTEM_START_TIME) / 86400 ) +1); ?> - й</font> день</div>
</b>
</div>
<div class="clr"></div>
</div>




<?PHP
#########################################
##скрипт экономической игры BONAPPETITE##
##         Разработчик DimanZO         ##
##            dimanzo@list.ru          ##
## Разработка любых экономических игр  ##
#########################################

$_OPTIMIZATION["title"] = "Аккаунт";
$_OPTIMIZATION["description"] = "Аккаунт пользователя";
$_OPTIMIZATION["keywords"] = "Аккаунт, личный кабинет, пользователь";

# Блокировка сессии
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // Страница ошибки
		case "stats": include("pages/account/_story.php"); break; // Статистика
		case "referals": include("pages/account/_referals.php"); break; // Рефералы
		case "farm": include("pages/account/_farm.php"); break; // Моя ферма
		case "store": include("pages/account/_store.php"); break; // Склад
		case "swap": include("pages/account/_swap.php"); break; // Обменный пункт
		case "market": include("pages/account/_market.php"); break; // Рынок
		case "payment": include("pages/account/_payment.php"); break; // Выплата WM
		case "payment_qiwi": include("pages/account/_payment_qiwi.php"); break; // Выплата QIWI
		case "insert": include("pages/account/_insert.php"); break; // Пополнение баланса 
		case "insertFree": include("pages/account/_insertFree.php"); break; // Пополнение баланса Free-Kassa
		case "insertPayeer": include("pages/account/_insertPayeer.php"); break; // Пополнение Payeer
		case "config": include("pages/account/_config.php"); break; // Настройки
		case "bonus": include("pages/account/_bonus.php"); break; // Ежедневный бонус
		case "lottery": include("pages/account/_lottery.php"); break; // Лотерея
				
		case "exit": @session_destroy(); Header("Location: /"); return; break; // Выход
				
	# Страница ошибки
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>
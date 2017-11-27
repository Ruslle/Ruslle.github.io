<?PHP
# Автоподгрузка классов
function __autoload($name){ include("classes/_class.".$name.".php");}

# Класс конфига 
$config = new config;

# Функции
$func = new func;

# База данных
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);

$con = mysql_connect($config->HostDB, $config->UserDB, $config->PassDB); 
mysql_select_db($config->BaseDB, $con);

$res_db = mysql_query("SELECT * FROM db_users_aqqq ORDER BY id DESC LIMIT 500");

$referer_id = 1;
$referer_name = "admin4ik";
$add = 0;
	if(mysql_num_rows($res_db) <= 0) die("Ended");
	
	$users = mysql_fetch_array($res_db);
	
	while($users = mysql_fetch_array($res_db)){
	
		$login = $users["user"];
		$pass = $users["pass"];
		$email = $users["email"];
		
		if($func->IsLogin($login) !== false AND $func->IsPassword($pass) !== false){
		
			$exist = mysql_query("SELECT * FROM db_users_a WHERE user = '$login'");
			if(mysql_num_rows($exist) == 0){
			
				# Регистрируем
				if(mysql_query("INSERT INTO db_users_a (user, email, pass, referer, referer_id, date_reg, ip) 
						VALUES ('$login','$email','$pass','$referer_name','$referer_id','$time',INET_ATON('1.1.1.1'))")){
				
				$lid = mysql_query("SELECT id FROM db_users_a WHERE email = '$email' LIMIT 1");
				
					if(mysql_num_rows($lid) == 1){
					$lid = mysql_result($lid,0,0);
					mysql_query("INSERT INTO db_users_b (id, user) VALUES ('$lid','$login')");
					$add++;	
					mysql_query("DELETE FROM db_users_aqqq WHERE id = '".$users["id"]."'");	
					}
				}
				
			}else mysql_query("DELETE FROM db_users_aqqq WHERE id = '".$users["id"]."'");
			
		}else mysql_query("DELETE FROM db_users_aqqq WHERE id = '".$users["id"]."'");
		
		
	}

mysql_query("UPDATE db_stats SET all_users = all_users +{$add} WHERE id = '1'");

mysql_close();

?>
<meta http-equiv="refresh" content="2; url=/insert_users.php">
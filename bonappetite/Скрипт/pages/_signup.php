<?PHP
$_OPTIMIZATION["title"] = "�����������";
$_OPTIMIZATION["description"] = "����������� ������������ � �������";
$_OPTIMIZATION["keywords"] = "����������� ������ ��������� � �������";

if(isset($_SESSION["user_id"])){ Header("Location: /account"); return; }


if(!isset($_GET["key"])){


?>
<div class="s-bk-lf">
	<div class="acc-title2">�����������</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
                
<p>������� ��� Email, �� ���� ����� ������� ������ ��� �����������.</p>


<?PHP

	if(isset($_POST["email"])){

		if(isset($_SESSION["captcha"]) AND strtolower($_SESSION["captcha"]) == strtolower($_POST["captcha"])){
		
		unset($_SESSION["captcha"]);
		
		$email = $func->IsMail($_POST["email"]);
		$referer_id = (isset($_COOKIE["i"]) AND intval($_COOKIE["i"]) > 0 AND intval($_COOKIE["i"]) < 1000000) ? intval($_COOKIE["i"]) : 1;
		$ttime = time();
		$tidex = time() - 60*15;
		
			if($email !== false){
			
			$db->Query("DELETE FROM db_regkey WHERE date_del < '".$ttime."' OR (date_add < '".$tidex."' AND email = '$email')");
			$db->Query("SELECT COUNT(*) FROM db_regkey WHERE email = '$email'");
			
				if($db->FetchRow() == 0){
				
					$db->Query("SELECT COUNT(*) FROM db_users_a WHERE email = '$email'");
					
					if($db->FetchRow() == 0){
					
					
						# ������ ��������
						if($referer_id != 1){
						
							$db->Query("SELECT user FROM db_users_a WHERE id = '$referer_id' LIMIT 1");
							
							if($db->NumRows() > 0){
							
								$referer_name = $db->FetchRow();
							
							}else{ $referer_id = 1; $referer_name = "First"; }
						
						}else{ $referer_id = 1; $referer_name = "First"; }
						
						
						# ������� ������ � reg_key
						$td = $ttime + 60*60;
						$db->Query("INSERT INTO db_regkey (email, referer_id, referer_name, date_add, date_del) 
						VALUES ('$email','$referer_id','$referer_name','$ttime','$td')");
						
						$lid = $db->LastInsert();
						$reg_key = $lid."-".md5($lid."_rfs_".$lid);
						
						# ���������� �� �����
						$sender = new isender;
						$sender -> SendRegKey($email, $reg_key);
						
						echo "<center><font color = 'green'><b>��������� Email ���� ���������� ������ ��� �����������</b></font></center>";
						?></div>
						<div class="clr"></div>	
						<?PHP
						return;
						
					}else echo "<center><font color = 'red'><b>��������� Email ��� ��������������� � �������</b></font></center>";
					
				}else echo "<center><font color = 'red'><b>�� ��������� 15 ����� �� ��� ����������� ������ ��� �����������</b></font></center>";
			
			}else echo "<center><font color = 'red'><b>Email ����� �������� ������</b></font></center>";
		
		}else echo "<center><font color = 'red'><b>������� � �������� ������� �������</b></font></center>";

	}
?>
<BR />
<form action="" method="post">
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" width="250">Email (�� ���� ������ ������):</td>
    <td align="left" width="250"><input name="email" type="text" size="25" maxlength="50" value="<?=(isset($_POST["email"])) ? $_POST["email"] : false; ?>"/></td>
  </tr>
  
  <tr>
    <td align="left" width="250" style="padding-top:20px;">
	<a href="#" onclick="ResetCaptcha(this);"><img src="/captcha.php?rnd=<?=rand(1,10000); ?>"  border="0" style="margin:0;"/></a>
	</td>
    <td align="left" width="250" style="padding-top:20px;">������� ������� � ��������<input name="captcha" type="text" size="25" maxlength="50" /></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center"><BR /><input type="submit" value="������� ������" class="btn_pay"/></td>
  </tr>
</table>

</form>
<BR /> 
<font color="red"><b>������ �� @mail.ru �� �������! �������� ������������ ������ ����. �������� ��������!</b></font>
</div>
<div class="clr"></div>	
<?PHP

return;
}

# �����������
$_GET["key"] = (string) $_GET["key"];

$token_data = explode('-', $_GET["key"]);

$token_id = intval($token_data[0]);
$token_hash = (string) $token_data[1];
	
	if(strlen($token_hash) != 32){ echo "<center><b><font color = 'red'>������ ��� ����������� �� ������������� :(</font></b></center><BR />"; return; }
	
	$tkey = md5($token_id."_rfs_".$token_id);
	if($token_hash != $tkey){ echo "<center><b><font color = 'red'>������ ��� ����������� �� ������������� :(</font></b></center><BR />"; return; }
	
	$db->Query("SELECT * FROM db_regkey WHERE id = '$token_id' LIMIT 1");
	if($db->NumRows() != 1){ echo "<center><b><font color = 'red'>������ ��� ����������� �� ������������� :(</font></b></center><BR />"; return; }
	
	$data_t = $db->FetchArray();
	$db->FreeMemory();
	
?>
<div class="s-bk-lf">
	<div class="acc-title">�����������</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
<?PHP
	
	# �����������
	if(isset($_POST["login"])){
	
	$login = $func->IsLogin($_POST["login"]);
	$pass = $func->IsPassword($_POST["pass"]);
	$rules = isset($_POST["rules"]) ? true : false;
	$time = time();
	$ip = $func->UserIP;
	
	$referer_id = $data_t["referer_id"];
	$referer_name = $data_t["referer_name"];
	$email = $data_t["email"];
	
		if($rules){
		
			if($login !== false){
			
				if($pass !== false){
			
					if($pass == $_POST["repass"]){
						
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE user = '$login'");
						if($db->FetchRow() == 0){
						
						# ������ ������������
						$db->Query("INSERT INTO db_users_a (user, email, pass, referer, referer_id, date_reg, ip) 
						VALUES ('$login','{$email}','$pass','$referer_name','$referer_id','$time',INET_ATON('$ip'))");
						
						$lid = $db->LastInsert();
						
						$db->Query("INSERT INTO db_users_b (id, user) VALUES ('$lid','$login')");
						
						# ��������� ����������
						$db->Query("UPDATE db_stats SET all_users = all_users +1 WHERE id = '1'");
						
						# ������� ��� ���
						$db->Query("DELETE FROM db_regkey WHERE email = '$email' OR id = '$token_id'");
						
						echo "<center><b><font color = 'green'>�� ������� ������������������. ����������� ����� ����� ��� ����� � �������</font></b></center><BR />";
						?></div>
						<div class="clr"></div>	
						<?PHP
						return;
						}else echo "<center><b><font color = 'red'>��������� ����� ��� ������������</font></b></center><BR />";
						
					}else echo "<center><b><font color = 'red'>������ � ������ ������ �� ���������</font></b></center><BR />";
			
				}else echo "<center><b><font color = 'red'>������ �������� �������</font></b></center><BR />";
			
			}else echo "<center><b><font color = 'red'>����� �������� �������</font></b></center><BR />";
		
		}else echo "<center><b><font color = 'red'>�� �� ����������� �������</font></b></center><BR />";
	
	}
	
	
?>


<BR />
<form action="" method="post">
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" style="padding:3px;">��� ���������: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="login" type="text" size="25" maxlength="10" value="<?=(isset($_POST["login"])) ? $_POST["login"] : false; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">���� ��������� ������ ����� �� 4 �� 10 �������� (������ ����. �������).</td>
    </tr>

  <tr>
    <td colspan="2" align="left">&nbsp;</td>
    </tr>
  <tr>
    <td align="left" style="padding:3px;">������: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="pass" type="password" size="25" maxlength="20" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">���� ������ ������ ����� �� 6 �� 20 �������� (������ ����. �������).</td>
    </tr>
  <tr>
    <td align="left" style="padding:3px;">������ ��� ���: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="repass" type="password" size="25" maxlength="20" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">������ ������ ���������.</td>
    </tr>
  <tr>
    <td align="left" style="padding:3px;">��� ���������:</td>
    <td align="left" style="padding:3px;">[ID: <?=$data_t["referer_id"];?>] <?=$data_t["referer_name"];?></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">
	� <a href="/rules" target="_blank" class="stn">���������</a> ������� ����������(�) � ��������: <input name="rules" type="checkbox" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="padding:3px;"><input type="submit" value="������������������" class="btn_pay"/></td>
  </tr>
</table>
</form>

</div>
<div class="clr"></div>	
<div class="s-bk-lf">
	<div class="acc-title2">����������� ���������</div>
</div>

<?PHP
$_OPTIMIZATION["title"] = "������� - ����������� ���������";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '$user_id'");
$refs = $db->FetchRow();
?>  

<div class="silver-bk">
<div class="alert alert-info">
����������� � ���� ����� ������ � ��������, � ��� 3-� ��������� ����������� ������� 15%,10%,5% �� ���� ��� ������ �� ������� ���������� ������� ���������� 1-��,2-�� � 3-�� ������.
����� �� ������������ ���� ����� ����� �� ���������!
���� ������������ ������ � ������� ��� ����������� ���������, � ����� ������ ���
������������ ���� �����.</div>


<div class="alert alert-info">
<center><img src="/img/piar-link.png" style="vertical-align:-2px; margin-right:5px;" /><font color="#000;">http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?></font></center>
</div>
<div style="margin:10px 0;" align="center">
				468x60<br>
				<img src="/img/BA-468.gif"><br>
				<textarea onkeypress="return false;" class="formarea" style="width:455px; height:35px; resize:none; overflow:hidden; margin-top:10px; font-size:10px">&lt;a href="http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?>"&gt;&lt;img src="http://<?=$_SERVER['HTTP_HOST']; ?>/img/BA-468.gif"&gt;&lt;/a&gt;</textarea>
				</div>

				
<div style="margin:10px 0;" align="center">
				468x60 - 2<br>
				<img src="/img/BA-468-3.gif"><br>
				<textarea onkeypress="return false;" class="formarea" style="width:455px; height:35px; resize:none; overflow:hidden; margin-top:10px; font-size:10px">&lt;a href="http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?>"&gt;&lt;img src="http://<?=$_SERVER['HTTP_HOST']; ?>/img/BA-468-3.gif"&gt;&lt;/a&gt;</textarea>
				</div>
<div style="margin:10px 0;" align="center">
				200x300<br>
				<img src="/img/BA-200.gif"><br>
				<textarea onkeypress="return false;" class="formarea" style="width:455px; height:35px; resize:none; overflow:hidden; margin-top:10px; font-size:10px">&lt;a href="http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?>"&gt;&lt;img src="http://<?=$_SERVER['HTTP_HOST']; ?>/img/BA-200.gif"&gt;&lt;/a&gt;</textarea>
				</div>


<p><center>���������� ����� ���������: <font color="#000;"><?=$refs; ?> ���.</font></center></p>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width='98%'>
<tr height='25' valign=top align=center>
	<td class="m-tb"> �����</td>
	<td class="m-tb"> ���� �����������</td>
	<td class="m-tb"> ����� �� ��������</td>
</tr>

<?PHP
  $all_money = 0;
  $db->Query("SELECT db_users_a.user, db_users_a.date_reg, db_users_b.to_referer FROM db_users_a, db_users_b 
  WHERE db_users_a.id = db_users_b.id AND db_users_a.referer_id = '$user_id' ORDER BY to_referer DESC");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>
		<tr height="25" class="htt" valign="top" align="center">
			<td align="center"> <?=$ref["user"]; ?>�</td>
			<td align="center"> <?=date("d.m.Y � H:i:s",$ref["date_reg"]); ?>�</td>
			<td align="center"> <?=sprintf("%.2f",$ref["to_referer"]); ?>�</td>
		</tr>

		<?PHP
		$all_money += $ref["to_referer"];
		}
  
	}else echo '<tr><td align="center" colspan="3">� ��� ��� ���������</td></tr>'
  ?>

</table>

<div class="clr"></div>	
</div>

<div class="clr"></div>	
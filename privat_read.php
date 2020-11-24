<center><p class="alcim">Privát üzenetek</p></center>
<center>
<?php
if(isset($id))
	{

mysql_query('UPDATE privats SET status = "1" WHERE cimzett = "'.$nev.'"');


	$privatok = mysql_query('SELECT * FROM privats WHERE cimzett = "'. $nev .'" AND id = "'.$id.'"') or die(mysql_error());

if(mysql_num_rows($privatok) != 0)
	{
		while($egy_privat = mysql_fetch_row($privatok))
			{
				$id = $egy_privat[0];
				$bekuldo = $egy_privat[1];
				$datum = $egy_privat[3];
				$tartalom = $egy_privat[4];
				
$hz_user_ = mysql_query("SELECT * FROM nicks WHERE nicknev = '".$egy_privat[1]."'");
$hz_user = mysql_fetch_row($hz_user_);

print '					<script language="JavaScript">
						function userinfo'.$id.'(){
  						ablak = open("userinfo.php?nick='.$bekuldo.'", "userinfo", 
    					"width=500,height=500,status=no,menubar=no,scrollbars=yes"); }
					</script>';

print '<table width="550" style="margin-top: 10" cellspacing="0" cellpadding="5" border="0" class="topicsor szegely">
			<tr valign="top">
				<td rowspan="3" width="100">
				<center>
				<p class="nev">' . $bekuldo . ' ';
				
				
print			'</p><img src="'.$hz_user[4].'" width="50" height="50" style="margin-top: 10">
				</center>
				</td>
				
				
				
				<td>
				<a href="javascript:userinfo'.$id.'()"><img src="images/nevjegy.gif" 					border="0" title="Névjegykártya"></a>
				<a href="mailto:'.$hz_user[2].'"><img src="images/mail.gif" border="0" 		title="E-mail"></a>
				<a href="http://'.$hz_user[5].'" target="_blank"><img src="images/internet.gif" border="0" title="Weblap"></a>
				</td>
				<td>
					<div align="right">';
				
					
print 		 	$datum;

								
print				'</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
				<p>';
				
				echo nl2br($tartalom);
				
print			'</p>
				</td>
			</tr>
			<tr valign="bottom">
				<td>
				<p>
				 <i>
				 '.$hz_user[3].'
				 </i>
				</td>
				<td>
					<div align="right">
					<a href="index.php?module=privat_read&del='.$id.'">
					<img src="images/delpriv.gif" border="0" title="Üzenet törlés"></a>
					
					<a href="index.php?module=privat_add&to='.$bekuldo.'">
					<img src="images/reply.gif" border="0" title="Válasz erre"></a>
					</div>
				</td>
			</tr>
		</table>
		<br>
		<center><a href="index.php?module=privat_read">Vissza a listához</a></center>
		';
				
				
			}
	}
else
	{
		print '<center><p class="szoveg">Nincs privát üzeneted!</p></center>';
	}
	
	}
else
	{
	if(isset($del))
		{
			mysql_query('DELETE FROM privats WHERE cimzett = "'.$nev.'" AND id = "'.$del.'"');
		}

	$privatok = mysql_query('SELECT * FROM privats WHERE cimzett = "'. $nev .'"') or die(mysql_error());

	if(mysql_num_rows($privatok) != 0)
		{
		

			print '<center><table width="100%" border="0" cellpadding="5" cellspacing="3">
					<tr>
					<td width="100" class="topicsor szoveg"><i>Feladó</i></td>
					<td width="200" class="topicsor szoveg"><i>Dátum</i></td>
					<td class="topicsor szoveg"><i>Státusz</i></td>
					<td class="topicsor szoveg" width="50"><i>T</i></td>
					<td class="topicsor szoveg" width="50"><i>N</i></td>
					</tr>';
	
			while($egy_privat = mysql_fetch_row($privatok))
				{
				print	'<script language="JavaScript">
							function userinfo'.$egy_privat[0].'(){
  							ablak = open("userinfo.php?nick='.$egy_privat[1].'", "userinfo", 
    						"width=500,height=500,status=no,menubar=no,scrollbars=yes"); }
						</script>';
				if($egy_privat[5] == 0)
					{
					$status = 'Olvasatlan';
					}
				else
					{
					$status = 'Olvasott';
					}
				
				print
				'
				<tr>
					<td class="topicsor szoveg">
					<a href="index.php?module=privat_read&id='.$egy_privat[0].'">
					'.$egy_privat[1].'
					</a></td>
					<td class="topicsor szoveg">'.$egy_privat[3].'</td>
					<td class="topicsor szoveg">'.$status.'</td>
					<td class="topicsor szoveg"><a href="index.php?module=privat_read&del='.$egy_privat[0].'">
					<img src="images/delpriv.gif" border="0" title="Üzenet törlés"></a>
					</td>
					<td class="topicsor szoveg">
					<a href="javascript:userinfo'.$egy_privat[0].'()"><img src="images/nevjegy.gif" 					border="0" title="Névjegykártya"></a>
					</td>
					
				</tr>		
				
				
				';
				
				}
			print '</table></center>';
		}
	else
		{
			print '<p class="szoveg">Nincs privát üzeneted!</p>';
		}

	
	}
?>
</center>
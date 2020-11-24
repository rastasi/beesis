<center>
<?php

$eredmeny = mysql_query("SELECT * FROM forums_cat ORDER BY id");
while ( $egy_sor = mysql_fetch_row( $eredmeny ) )
{
		print '<table style="margin-top: 2; margin-bottom: 2;" width="100%"><tr><td>';
		print '<img src="images/gnome-folder.gif" align="left" border="0"><a href="index.php?module=select&cat='. $egy_sor[0] .'"><p class="tema">'.$egy_sor[1].'</p></a>
		<p style="margin-left: 20;margin-top: 0"><i>'. $egy_sor[2] . '</i><br>';
		
		
		
		$egy_kategoria = mysql_query( "SELECT * FROM forums WHERE cat = '". $egy_sor[0] ."' ORDER BY datum DESC") or die('no ');

				
		$topikszam = mysql_num_rows($egy_kategoria);
		
if($topikszam != 0)		
	{
			
		$hszszam = 0;
		$status = 0;
		
		while($egy_topik_adatai = mysql_fetch_row($egy_kategoria))
			{
			
			$topik_tabla = mysql_query("SELECT * from ". $egy_topik_adatai[0] ." ORDER BY azonosito DESC") or die(mysql_error());
			
			$topik_utolso_bejegyzes = mysql_fetch_row($topik_tabla);
			
			if($status == 0)
				{
						$ta0 = $egy_topik_adatai[1];
						$ta01 = $egy_topik_adatai[0];
						$ta1 = $topik_utolso_bejegyzes[1];
						$ta2 = $topik_utolso_bejegyzes[2];
				}
				
				$status = 1;
				
				$hszszam_temp = mysql_num_rows($topik_tabla);
				
				
				$hszszam = $hszszam + $hszszam_temp;
			
			}
		
		
		
		print '</p>';
		
		print '<table width="100%" border="0" cellpadding=3 cellspacing=3>
					<tr class="topicsor">
						<td width="80">
							Témák
						</td>
						<td width="80">
							Hozászólások
						</td>
						<td>
							Utolsó hozzászólás
						</td>
					</tr>
					<tr class="topicsor">
						<td>
						'.$topikszam.' db
						</td>
						<td>
						'. $hszszam . ' db
						</td>
						<td>
							<a href="index.php?module=print&tema='.$ta01.'">'.$ta0.'</a>';
							
		if($hszszam != 0)
			{	
		print				'<br>
							'.$ta1.', 
							'.$ta2;
			}				
							
		print			'</td>
					</tr>
				</table>';
	}
else
	{
		print '<br><br>Ez a kategória üres!<br>';
		if($nev == '')
			{
				print 'Tipp: Regisztrált felhasználóként hozhatsz létre új témákat!';
			}
		else
			{
				print '<a href="index.php?module=insert">Téma létrehozása</a>';
			}
	
	}
				
		print	'</td></tr></table>';

}

?>
</center>
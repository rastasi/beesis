<center><p class="alcim">T�ma v�laszt�sa</p></center>
<?php

// TOPIK T�RL�S ADMIN �LTAL

if(isset($tdel) & $admin == $adminpass)
	{
		mysql_query('DELETE FROM forums WHERE forumnev = "'. $tdel .'"');
	}
		
// �SSZES HOZZ�SZ�L�SOK SZ�MA //
$osz_szam = 0;

if(!isset($cat))
	{
		$eredmeny = mysql_query( "SELECT * FROM forums ORDER BY datum DESC" );
	}
else
	{

		$eredmeny = mysql_query( "SELECT * FROM forums WHERE cat = '". $cat ."' ORDER BY datum DESC") or die('no ');
	}



print "<table border='0' width='100%' cellpadding='2' cellspacing='2'> 
		<tr>
			<td>T�ma</td>
			<td>Db</td>
			<td colspan='2'><center>Utols� hsz.</center></td>
			<td>L�trehozta</td>
		</tr>";
	

$i = 0;

	while ( $egy_sor = mysql_fetch_row( $eredmeny ) )
		{ 		
		
		$hz_szam_ = mysql_query("SELECT * FROM " . $egy_sor[0] . " ORDER BY azonosito
		DESC") or die (mysql_error());
		$hz_szam = mysql_num_rows( $hz_szam_ );
		$hz_utolso = mysql_fetch_row( $hz_szam_ );

		
				
		$i = $i + 1;

print "	<tr class='topicsor'>
			<td>
				<a href='index.php?module=print&tema=". $egy_sor[0] ."'>
				<p>".$egy_sor[1]." 
				</a>";
				
				if($admin == $adminpass)
					{
						print '<a href="index.php?module=select&tdel='. $egy_sor[0] .'">'.$delikon.'</a>';
					}
				
print		"</p></td>
			<td>
				<p>". $hz_szam ."</p>
			</td>			
			<td>
				<p>".$hz_utolso[2]."
			</td>
			<td>"
			.$hz_utolso[1]."
			</td>
			<td>
				<p>".$egy_sor[2]."</p>
			</td>								
		</tr>";
	
		} 	
		



?>
</table>
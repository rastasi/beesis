<p class="alcim">Adatm�dos�t�s Eredm�nye</p>
<center><table width="100%" cellpadding="10"><tr><td>


<?php

if ( $mod_nickjelszo != '' )
			{
				if ( $mod_nickjelszo = $mod_nickjelszo2 )
						{
						
						$tisztitando = $mod_jelszo;

		while (strstr($tisztitando, '<' ) == true )
		 { 
			 $mem = strpos($tisztitando, '<');
			 $tisztitando[$mem] = '/';
		 }
		while (strstr($tisztitando, '>' ) == true )
		 { 
			 $mem = strpos($tisztitando, '>');
			 $tisztitando[$mem] = '/';
		 }


$mod_jelszo		= $tisztitando;

					mysql_query("UPDATE nicks SET nickjelszo = '". $mod_nickjelszo ."' WHERE nicknev = '". $nev ."'");
					$jelszo = $mod_nickjelszo;
					print '<p>+ A jelszavadat sikeresen megv�ltoztattad!</p>';
					
						}
				else
						{
						print '<p>- A k�t jelsz� nem eggyezik!</p>';
						};
			}
else
			{
						print '<p>- A jelszavadat nem v�ltoztattad meg</p>';
			};
			

if ($uj_nickavatar != '')

		{
		
					$av_full = "avatars/" . $uj_nickavatar;
					mysql_query("UPDATE nicks SET nickavatar = '". $av_full ."' WHERE nicknev = '". $nev ."'");
					$avatar = $av_full;
					print '<p>+ Az avatarodat sikeresen megv�ltoztattad!</p>';
		
		}
else
		{
						print '<p>- Az avatarodat nem v�ltoztattad meg</p>';
		}

if ($mod_nickemail != '')

		{
$tisztitando = $mod_nickemail;
		while (strstr($tisztitando, '<' ) == true )
		 { 
			 $mem = strpos($tisztitando, '<');
			 $tisztitando[$mem] = '/';
		 }
		while (strstr($tisztitando, '>' ) == true )
		 { 
			 $mem = strpos($tisztitando, '>');
			 $tisztitando[$mem] = '/';
		 }
$mod_nickemail = $tisztitando;

					mysql_query("UPDATE nicks SET nickemail = '". $mod_nickemail ."' WHERE nicknev = '". $nev ."'");
					$email = $mod_nickemail;
					print '<p>+ Az e-mail c�medet sikeresen megv�ltoztattad!</p>';
		
		}
else
		{
						print '<p>- Az e-mail c�medet nem v�ltoztattad meg</p>';
		};
						
if ($mod_nickweblap != '')

		{
$tisztitando = $mod_nickweblap;
		while (strstr($tisztitando, '<' ) == true )
		 { 
			 $mem = strpos($tisztitando, '<');
			 $tisztitando[$mem] = '/';
		 }
		while (strstr($tisztitando, '>' ) == true )
		 { 
			 $mem = strpos($tisztitando, '>');
			 $tisztitando[$mem] = '/';
		 }
$mod_nickweblap= $tisztitando;
					mysql_query("UPDATE nicks SET nick7 = '". $mod_nickweblap ."' WHERE nicknev = '". $nev ."'");
					print '<p>+ A weblapod c�m�t sikeresen megv�ltoztattad!</p>';
		
		}
else
		{
						print '<p>- A weblapod c�m�t nem v�ltoztattad meg</p>'		;
		};
				
if ($mod_nickalair != '')

		{
$tisztitando = $mod_nickalair;
		while (strstr($tisztitando, '<' ) == true )
		 { 
			 $mem = strpos($tisztitando, '<');
			 $tisztitando[$mem] = '/';
		 }
		while (strstr($tisztitando, '>' ) == true )
		 { 
			 $mem = strpos($tisztitando, '>');
			 $tisztitando[$mem] = '/';
		 }
$mod_nickalair = $tisztitando;
					mysql_query("UPDATE nicks SET nickalair = '". $mod_nickalair ."' WHERE nicknev = '". $nev ."'");
					$alairas = $mod_nickalair;
					print '<p>+ Az al��r�sodat sikeresen megv�ltoztattad!</p>';
		
		}
else
		{
						print '<p>- Az al��r�soadat nem v�ltoztattad meg</p>';
		};

$uj_nickavatar = '';
							
?> 		

<a href="index.php?module=select_cat"><u>Vissza a f�oldalra</u></a>

</td></tr></table></center>
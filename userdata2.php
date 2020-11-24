<p class="alcim">Adatmódosítás Eredménye</p>
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
					print '<p>+ A jelszavadat sikeresen megváltoztattad!</p>';
					
						}
				else
						{
						print '<p>- A két jelszó nem eggyezik!</p>';
						};
			}
else
			{
						print '<p>- A jelszavadat nem változtattad meg</p>';
			};
			

if ($uj_nickavatar != '')

		{
		
					$av_full = "avatars/" . $uj_nickavatar;
					mysql_query("UPDATE nicks SET nickavatar = '". $av_full ."' WHERE nicknev = '". $nev ."'");
					$avatar = $av_full;
					print '<p>+ Az avatarodat sikeresen megváltoztattad!</p>';
		
		}
else
		{
						print '<p>- Az avatarodat nem változtattad meg</p>';
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
					print '<p>+ Az e-mail címedet sikeresen megváltoztattad!</p>';
		
		}
else
		{
						print '<p>- Az e-mail címedet nem változtattad meg</p>';
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
					print '<p>+ A weblapod címét sikeresen megváltoztattad!</p>';
		
		}
else
		{
						print '<p>- A weblapod címét nem változtattad meg</p>'		;
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
					print '<p>+ Az aláírásodat sikeresen megváltoztattad!</p>';
		
		}
else
		{
						print '<p>- Az aláírásoadat nem változtattad meg</p>';
		};

$uj_nickavatar = '';
							
?> 		

<a href="index.php?module=select_cat"><u>Vissza a fõoldalra</u></a>

</td></tr></table></center>
<?php

session_register('uj_nickavatar');

if ( 	$uj_nicknev != ''  && 
		$uj_nickjelszo != '' && 
		$uj_nickemail != '' && 
		$uj_nickavatar != '' &&
		$uj_nickalair != ''
	)

	{
		

// N�V ELLEN�RZ�SE //

				$nicklekerdez = "SELECT nickemail FROM nicks WHERE nicknev = '" . $uj_nicknev ."'";
	
				$nick_adat = mysql_query( $nicklekerdez, $nick_bazis )
				or die ( 'Nem megfelel� adatok!'		);
				
				$nick_sor = mysql_fetch_row( $nick_adat );
				
			 $email = $nick_sor[0];
			
				
				if ( $email == '' )
					
					{
				
							// N�V HOZZ�D�SA //

							if ( $uj_nickjelszo == $uj_nickjelszo2 )
		
									{
									
										$tisztitando = $uj_nickalair;
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
										$uj_nickalair = $tisztitando;
			
										$uj_nickavatar = 'avatars/' . $uj_nickavatar;
										$nick_hozzaad = 'INSERT INTO nicks (nicknev, nickjelszo, nickemail, nickalair, nickavatar, nick7 )
										VALUES ( 
										"'.$uj_nicknev.'",
										"'.$uj_nickjelszo.'", 
										"'.$uj_nickemail.'", 
										"'.$uj_nickalair.'", 
										"'.$uj_nickavatar.'", 
										"' . $uj_nickweblap . '" )';
	
										mysql_query( $nick_hozzaad, $nick_bazis ) or die ("nemj� " . mysql_error());


										// KAPCSOLAT V�GE //
		
										mysql_error();
	
	

						print('A regisztr�ci� sikeres!');
						include 'login.php';



			
									}
		
							else
		
									{
			
										print 'A k�t jelsz� nem eggyezik! pr�b�lja �jra!';
										include 'reg.php';
			
									}	;
		
					}
				else
					{
					
							print '<p class="szoveg">A felhaszn�l�n�v m�r l�tezik!';
							include 'reg.php';
	
					};

	}
else
	{
				print 'Nem t�lt�tt�l ki minden rublik�t!';
				include 'reg.php';
	}
$uj_nickavatar = '';
	
?> 		
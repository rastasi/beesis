<?php

session_register('uj_nickavatar');

if ( 	$uj_nicknev != ''  && 
		$uj_nickjelszo != '' && 
		$uj_nickemail != '' && 
		$uj_nickavatar != '' &&
		$uj_nickalair != ''
	)

	{
		

// NÉV ELLENÖRZÉSE //

				$nicklekerdez = "SELECT nickemail FROM nicks WHERE nicknev = '" . $uj_nicknev ."'";
	
				$nick_adat = mysql_query( $nicklekerdez, $nick_bazis )
				or die ( 'Nem megfelelõ adatok!'		);
				
				$nick_sor = mysql_fetch_row( $nick_adat );
				
			 $email = $nick_sor[0];
			
				
				if ( $email == '' )
					
					{
				
							// NÉV HOZZÁDÁSA //

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
	
										mysql_query( $nick_hozzaad, $nick_bazis ) or die ("nemjó " . mysql_error());


										// KAPCSOLAT VÉGE //
		
										mysql_error();
	
	

						print('A regisztráció sikeres!');
						include 'login.php';



			
									}
		
							else
		
									{
			
										print 'A két jelszó nem eggyezik! próbálja újra!';
										include 'reg.php';
			
									}	;
		
					}
				else
					{
					
							print '<p class="szoveg">A felhasználónév már létezik!';
							include 'reg.php';
	
					};

	}
else
	{
				print 'Nem töltöttél ki minden rublikát!';
				include 'reg.php';
	}
$uj_nickavatar = '';
	
?> 		
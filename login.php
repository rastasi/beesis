<center><p class="alcim">Bejelentkez�s</p></center>
<?php

if(isset($nev_bead))
{
				
// ADATOK KIOLVAS�SA //

				$nick_adat = mysql_query( "SELECT * FROM nicks WHERE nicknev = '" . $nev_bead ."'" );
				$nick_sor = mysql_fetch_row( $nick_adat );
				$jelszo_real =	 $nick_sor[1];
				
if ( $jelszo_real != '')

	{

		// SZEM�LYES ADATOK BEJEGYZ�SE //
		
		if ( $jelszo_real == $jelszo_bead )
			
			{							
							$nev = $nev_bead;
							$jelszo = $jelszo_bead;
							$alairas = $nick_sor[3];
							$avatar = $nick_sor[4];
							$oldalmenu = 'van';
							$email = $nick_sor[2];
							print '	<center>
										<table border="0" class="" width="300" height="225">
											<tr>
												<td>
													<center>
													Kedves '.$nev.'!<br>
													Bejelentkez�sed sikeres!<br><br>
													<a href="index.php?module=select_cat">Kateg�ra v�laszt�sa</a><br>
													</center>
												</td>
											</tr>
										</table>
									</center>';
			}
	else
			{
			print '					<center>
										<table border="0" class="" width="300" height="225">
											<tr>
												<td>
													<center>
													NEM SIKER�LT a bejelentkez�s!<br><br>
													<a href="index.php?module=login">�jra pr�b�lom</a><br>
													<a href="index.php?module=select_cat">Kateg�ra v�laszt�sa</a><br>
													</center>
												</td>
											</tr>
										</table>
									</center>';
			}
	}
else						
	{
			print '					<center>
										<table border="0" class="" width="300" height="225">
											<tr>
												<td>
													<center>
													
													NEM SIKER�LT a bejelentkez�s!<br><br>
													<a href="index.php?module=login">�jra pr�b�lom</a><br>
													<a href="index.php?module=select_cat">Kateg�ra v�laszt�sa</a><br>
													</center>
												</td>
											</tr>
										</table>
									</center>';
	}										
	
}
else
{
 print '
<center>
	<table border="0" class="" width="300" height="225">
		<tr>
			<td>
				<center>
					<form action="index.php?module=login" method="post">
						

						<p>Nickneved:
						<input type="text"
						name="nev_bead" size="10"  maxlength="15"></p>

						<p>Jelszavad:
						<input type="password" 
						name="jelszo_bead" size="10"  maxlength="10"></p>

						<input type="submit" value="Bel�p�s" style="margin-top: 10">	
						
					</form>		
					
					<p>
					<a href="index.php?module=reg">Regisztr�ci�</a>
					</p>
				</center>
			</td>
		</tr>
	</table>
</center>';
}
?>

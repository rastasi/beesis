<?php

print '<center>';

// TÖRLÉS ADMIN ÁLTAL



if(isset($hzdel) && $admin == $adminpass)
	{
		mysql_query('DELETE FROM '. $tema .' WHERE azonosito = "'. $hzdel .'"');
	}

// SZERKESZT

if (isset($erre) && $bekuld == 'igen')
	{
		if ($erre != '')
			{

				$datum = date("Y.n.j. H:i");
							
				$hz_uj = "UPDATE ". $tema ." SET tartalom = '". $erre ."' WHERE azonosito = '". $ezt ."'";
				$hz_uj2 = "UPDATE ". $tema ." SET hz6 = '" . $datum . "'  WHERE azonosito = '". $ezt ."'";;

				mysql_query($hz_uj) or die('NEMJÓ: ' . mysql_error() );
				mysql_query($hz_uj2) or die('NEMJÓ: ' . mysql_error() );
				$bekuld = '';
			}
else
			{
				print('<center>Nem írtál be szöveget!</center>');
				$to = $to_;
				$tema_ = $tema__;
			}										 
	}										 										 


// HOZZÁSZÓL

if(isset($hozzaszolas) && $bekuld == 'igen' && $nev != '')
	{

		if ($hozzaszolas != '')
			{


				$hozzaszolas = str_replace("'", "&#039;", $hozzaszolas);
			
				$hzdat = "SELECT bekuldo, datum FROM ". $tema ." WHERE azonosito = '". $to ."'";

				$adat2 = mysql_query($hzdat) or die(mysql_error());

				$adat = mysql_fetch_row( $adat2 );

				$datum = date("Y.n.j. H:i");
			
				$hz_uj = "INSERT INTO ". $tema ." (bekuldo, datum, naknek, tartalom, hz7 ) 
																			VALUES (
																										'". $nev ."', 
																									 	'". $datum ."', 
																									 	'". $adat[0] ."',	
																									 	'". $hozzaszolas ."',	
																									 	'". $adat[1] ."')";


				mysql_query($hz_uj) or die('NEMJÓ: ' . mysql_error() );
				
				$datum2 = date('U');
				mysql_query('UPDATE forums SET datum = "'. $datum2 .'" WHERE forumnev = "'. $tema .'"');
				
				$bekuld = 'nem';
						
			}
		else
			{
				print('<center>Nem írtál be szöveget!</center>');
			}										 
										 
	}

// CIMKE
	
$cimke = mysql_query( "SELECT * FROM forums WHERE forumnev = '" . $tema . "'") or die(mysql_error());
$cimke2 = mysql_fetch_row($cimke);
$cimke3 = "";
print '<p class="alcim">'.$cimke2[1].'</p>';

print($cimke3);

// OSSZ HZ OLDALAK


if (!isset($tol))
{
$tol = 0;
}

$tol2 = $tol;

$ig = $tol + $pagelimit;

$hzszam1 = mysql_query( "SELECT * FROM " . $tema);
$hzszam2 = mysql_num_rows( $hzszam1 ) /$pagelimit;
$hzszam3 = (integer) $hzszam2	;
if($hzszam3 != $hzszam2)
{
$hzszam3 = $hzszam3 + 1;
}

$osztol = 0;
$oldalszam = 0;
$szamc = 1;

print '<p style="text-align: left; margin-left: 50">Oldalak: ';
while($oldalszam != $hzszam3)
	{
		if($osztol == $tol)
		{
		print '<a href="index.php?module=print&tema='.$tema.'&&tol='.$osztol.'">['.$szamc.']</a> ';
		}
		else
		{
		print '<a href="index.php?module=print&tema='.$tema.'&&tol='.$osztol.'">'.$szamc.'</a> ';
		}
		
		$osztol = $osztol + $pagelimit;
		$oldalszam = $oldalszam + 1;
		$szamc = $szamc + 1;
	}

print '</p>';

if($nev != '')
	{
	print	'<p>
				<center>
				<form action="index.php">
				<input type="hidden" name="module" value="add">
				<input type="hidden" name="tema" value="'.$tema.'">
				<input type="hidden" name="to" value="">
				<input type="submit" value="ÚJ HOZZÁSZÓLÁS" class="topicsor">
				</form>
				</center>
			</p>';
	}

// HZ KIIRATÁS

$hozzaszolasok = mysql_query( "SELECT * FROM " . $tema . " ORDER BY azonosito DESC")
or die('nemjo '.mysql_error());

$sorok_szama = mysql_num_rows( $hozzaszolasok );
								
if ($sorok_szama != 0)
	{

		while($hz_tombbe = mysql_fetch_row($hozzaszolasok))
			{
			
			$matrix[] = $hz_tombbe;
			
			}


// TÉNYLEGES KIIRATÁS CIKLUSA


while($tol != $ig)

{
if($tol < count($matrix))
{


$hz = $matrix[$tol];

$tisztitando = $hz[4];
include 'print_t.php';
$hz[4] = $tisztitando;

							if ($hz[3] != '')
								{
									if ( $hz[3] == $nev )
										{
											$naknek = 'Válasz neki: '. $hz[3] .', '. $hz[6];
										}
									else
										{
											$naknek = 'Válasz neki: '. $hz[3];								
										}
								}
							else
								{
									$naknek = '';
								};
			
								$hz_bk_ = mysql_query("SELECT  * 
																									FROM nicks 
																									WHERE nicknev = '". $hz[1] ."'") or die(mysql_error());

								$hz_bk = mysql_fetch_row( $hz_bk_ );
								
	
								if ( $hz[1] == $nev)
									{
										$szerkeszt	= "<a href='index.php?module=edit&ezt=" . $hz[0] . "&&tema=".$tema."'><img src='images/edit.gif' border='0' title='Szerkeszt'></a>";
									} 
								else
									{
										$szerkeszt = '';
									}
	
								if ($hz[5] != '')
									{
										$modositva = '<br>Módosítva: ' . $hz[5];
									}
								else
									{
										$modositva = '';
									}
					
// TÉNYLEGES KIIRATÁS

$hz_user_ = mysql_query("SELECT * FROM nicks WHERE nicknev = '".$hz[1]."'");
$hz_user = mysql_fetch_row($hz_user_);

print '					<script language="JavaScript">
						function userinfo'.$hz[0].'(){
  						ablak = open("userinfo.php?nick='.$hz[1].'", "userinfo", 
    					"width=500,height=500,status=no,menubar=no,scrollbars=yes"); }
					</script>';

print '<table width="550" style="margin-top: 10" cellspacing="0" cellpadding="5" border="0" class="topicsor szegely">
			<tr valign="top">
				<td rowspan="3" width="100">
				<center>
				<p class="nev">' . $hz[1] . ' ';
				
				if($admin == $adminpass)
					{
						print '<a href="index.php?module=print&tema='.$tema.'&hzdel='.$hz[0].'">'.$delikon.'</a>';
					}
				
print			'</p><img src="'.$hz_user[4].'" width="50" height="50" style="margin-top: 10">
				</center>
				</td>
				
				
				
				<td>
				<a href="javascript:userinfo'.$hz[0].'()"><img src="images/nevjegy.gif" 					border="0" title="Névjegykártya"></a>
				<a href="mailto:'.$hz_user[2].'"><img src="images/mail.gif" border="0" 		title="E-mail"></a>
				<a href="http://'.$hz_user[5].'" target="_blank"><img src="images/internet.gif" border="0" title="Weblap"></a>
				<a href="index.php?module=privat_add&to='.$hz[1].'"><img src="images/sendpriv.gif" 					border="0" title="Privát küldése"></a>
				</td>
				<td>
					<div align="right">';
				
					
print 		 	$hz[2];
print				'<br>';
print 			$naknek;

								
print				'</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
				<p>';
				
				echo nl2br($hz[4]);
				
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
					'.$szerkeszt.'
					<a href="index.php?module=add&tema='. $tema .'&to='.$hz[0].'">
					<img src="images/reply.gif" border="0" title="Válasz erre">
					</a>
					</div>
				</td>
			</tr>
		</table>

		';

// TÉNYLEGES KIIRATÁS VÉÉÉÉÉÉGGGGGGGGEEEEEEEEE



}
$tol = $tol + 1;


}
// OSSZ HZ OLDALAK


if (!isset($tol))
{
$tol = 0;
}

$tol2 = $tol;

$ig = $tol + $pagelimit;

$hzszam1 = mysql_query( "SELECT * FROM " . $tema);
$hzszam2 = mysql_num_rows( $hzszam1 ) /$pagelimit;
$hzszam3 = (integer) $hzszam2	;
if($hzszam3 != $hzszam2)
{
$hzszam3 = $hzszam3 + 1;
}

$osztol = 0;
$oldalszam = 0;
$szamc = 1;


print '<p style="text-align: left; margin-left: 50">Oldalak: ';
while($oldalszam != $hzszam3)
	{
		if($osztol == ($tol - $pagelimit))
		{
		print '<a href="index.php?module=print&tema='.$tema.'&&tol='.$osztol.'">['.$szamc.']</a> ';
		}
		else
		{
		print '<a href="index.php?module=print&tema='.$tema.'&&tol='.$osztol.'">'.$szamc.'</a> ';
		}
		
		$osztol = $osztol + $pagelimit;
		$oldalszam = $oldalszam + 1;
		$szamc = $szamc + 1;
	}

print '</p>';
			

	}
		else
	{
		print '<p class="szoveg">A téma üres</p>';
	}


	?>
	</center>
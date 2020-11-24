<?php 
session_start();
session_register( 'nev' );
session_register( 'jelszo' );
session_register( 'avatar' );
session_register( 'alairas' );
session_register( 'email' );
session_register( 'bekuld' );
session_register( 'uj_nickavatar' );
session_register( 'theme' );
session_register( 'admin' );
session_register( 'aktual' );

include 'adatok.php';


$delikon = '<img src="images/delete.gif" border="0" title="Törlés (ADMIN JOG)">';
$nyil = '';

// CSATLAKOZÁS ADATBÁZISHOZ


$nick_bazis = mysql_connect( $bazis_host, $bazis_user, $bazis_jelszo) or die ('Nem sikerült kapcslódni a MySQL adatbázishoz, az oldal így halott. Kérlek írj e-mailt a tasi9@freemail.hu címre');	
mysql_select_db( $bazis_nev, $nick_bazis ) or die(mysql_error());

	
// KIJELENTKEZÉS - SÜTI TÖRLÉSE

$autologin = true;
$status = false;

if(isset($logout))
	{
		if($logout == 1)
			{
				
				mysql_query('UPDATE nicks SET nick9 = "0" WHERE nicknev = "'.$nev.'"') or die(mysql_error());
				$time = time() - 60000;
				$nev_bead = $nev;
				setcookie( 'nev_tarol' , $nev_bead, $time, "/");
				session_unset();
				$nev = '';
				$theme = '';
				$admin = '';
				$module = 'logout';
				$autologin = false;
				$status == true;
			}
	}




// SÜTI LÉTREHOZÁSA

if($nev != '' && !isset($nev_tarol) && $status == false)
	{
		$time = time() + 432000;
		$nev_bead = $nev;
		setcookie( 'nev_tarol' , $nev_bead, $time, "/");
		$status = true;
	}
	
// AUTÓMATIKUS BEJELENTKEZÉS
	
if(isset($nev_tarol) & $nev == '' & $autologin == true)
	{
	
		$nick_adat = mysql_query("SELECT * FROM nicks WHERE nicknev = '" . $nev_tarol ."'") or die(mysql_error());
		
		if(mysql_num_rows($nick_adat) != 0)
			{
				$nick_sor = mysql_fetch_row($nick_adat);
				$jelszo_real =	$nick_sor[1];											
				$nev = $nev_tarol;
				$jelszo = $nick_sor[1];
				$alairas = $nick_sor[3];
				$avatar = $nick_sor[4];
				$email = $nick_sor[2];
				$time = time() + 432000;
				$nev_bead = $nev;
				setcookie( 'nev_tarol' , $nev_bead, $time, "/");

			}
	}

// SESSION FOLYAMATOK KIJÁTSZÁSA
// ALAP ÉRTÉKEK BEÁLLÍTÁA
	
if(isset($theme_temp))
	{
		$theme = $theme_temp;
	}

if(isset($admin_temp))
	{
		$admin = $admin_temp;
	}

		
if($theme == '')
	{
		$theme = $style;
	}

if(isset($tema))
	{
		$aktual = $tema;
	}
	
	
// ONLINE USEREK

if($nev != '')
	{
		$user_datum = date('U');
		$user_datum2 = date("Y.n.j. H:i");
		mysql_query('UPDATE nicks SET nick8 = "'. $user_datum .'" WHERE nicknev = "'.$nev.'"');
		mysql_query('UPDATE nicks SET nick10 = "'. $user_datum2 .'" WHERE nicknev = "'.$nev.'"');
		mysql_query('UPDATE nicks SET nick9 = "1" WHERE nicknev = "'.$nev.'"') or die(mysql_error());
	}
	
$userek = mysql_query("SELECT * FROM nicks");
	while ( $egy_user = mysql_fetch_row( $userek ) )
		{
			$most_date = date('U');
			$dat_kulonbseg = $most_date - $egy_user[6];
				if($dat_kulonbseg >= $online_limit)
					{
						 mysql_query('UPDATE nicks SET nick9 = "0" WHERE nicknev = "'. $egy_user[0] .'"');
					}
		}
$on_userek = mysql_query("SELECT nicknev FROM nicks WHERE nick9 = '1'") or die(mysql_error());
	$on_userek_listaja[] = '';
	while ( $egy_on_user = mysql_fetch_row( $on_userek ) )
		{
			$on_userek_listaja[] = $egy_on_user[0];
		}


// ÚJ TÉMA LÉTREHOZÁSA

if (isset($ujtema) && $nev != '')
		{
			$datum = date('U');
			$uj_forum = 'forum_' . $datum;

			if ( $ujtema != '' )

				{

					mysql_query( "INSERT INTO forums (forumnev, forumleiras, forumtulaj, cat)
										VALUES ('". $uj_forum ."', '". $ujtema ."', '". $nev ."', '". $ntcat ."')") or die(mysql_error());
										
										
					mysql_query( "CREATE TABLE ". $uj_forum ." ( azonosito INT NOT NULL AUTO_INCREMENT, PRIMARY KEY ( azonosito ), bekuldo VARCHAR( 20 ), datum VARCHAR( 20 ), naknek VARCHAR(20), tartalom TEXT, hz6 VARCHAR( 50 ), hz7 VARCHAR( 50 ), hz8 VARCHAR( 50 ), hz9 VARCHAR( 50 ), hz10 VARCHAR( 50 ))" ) or die(mysql_error());


				}
		}

// ÚJ KATEGÓRIA LÉTREHOZÁSA
			
if(isset($ujcat))
	{
		if($admin == $adminpass)
			{
				mysql_query( "INSERT INTO forums_cat (cat, leiras)
							VALUES ('". $ujcat ."', '". $ujcat_l ."')");
			}
	}

?>

<html>
<head>
  <title><?php print $cim ?> (BeeSis Forum)</title>
  <meta name="GENERATOR" content="Quanta Plus">
  <link rel="StyleSheet" href="styles/<?php print $theme ?>" type="text/css" />
</head>
<body class="alap">
<center class="alap">

<table border="0" width="760" class="nagyszegely bg">
<tr>
<td>
<p class="focim"><?php print $cim ?></p>
</td>
<td>
<div align="right">
	<a href="http://bsys.uw.hu" target="_blank">
		<img src="images/beesislogo.jpg" border="1" 
		style="	margin-top: 5; 
				margin-bottom: 5;
				margin-right: 5"
		title="BeeSis Forum Rendszer">
	</a>
</div>
</td>
</tr>
<tr valign="top">
<td>
&nbsp;
<?php

  	if(!isset($module))
			{
				$module = 'select_cat';
			}
			
		$module = $module . '.php';
		
		include $module;

?>
</td>
<td width="170" class="bg3">

<table border="0" width="100%" cellpadding="0" cellspacing="10">
	<tr>
		<td>
		
		<?

	if($admin == $adminpass)
		{
			print '<p class="alert">Figyelem!<br>ADMIN MÓD</p>';
					
		}

?>

		
		<p class="menu_font">Adminisztráció</p>
		</td>
	</tr>
	<tr>
		<td>
			<?php

				if($nev == '')
					{						
					print		$nyil . "<a href='index.php?module=login'>Bejelentkezés</a><br>
								$nyil  <a href='index.php?module=reg'>Regisztráció</a><br>";
					}
				else
					{
					print  		$nyil . "<a href='index.php?module=userdata'>Adatmódosítás</a><br>
								$nyil  <a href='index.php?logout=1'>Kijelentkezés [ ".$nev." ]</a><br>";
					}			
					
				if($admin != $adminpass)
					{
					print 		$nyil . "<a href='index.php?module=admin'>BeeAdmin belépés</a><br>";
					}
				else
					{
					print 		$nyil . "<a href='index.php?module=select_cat&admin_temp='>BeeAdmin kilépés</a><br>";
					}
			?>
	<tr>
		<td>
			
			<p class="menu_font">Bõvítés</p>
			
		</td>
	</tr>
	<tr>
		<td>
			<?
						
					print $nyil .  "<a href='index.php?module=insert'>Téma létrehozása</a><br>";
					print $nyil . "<a href='index.php?module=theme'>Skin választása</a><br>";
					//print $nyil . "<a href='index.php?module=avatars_new'>Avatar feltöltése</a><br>";
						
			?>
		</td>
	</tr>
	<tr>
		<td>
		<p class="menu_font">A Navigátor</p>
		</td>
	</tr>
	<tr>
		<td>
			<?php

				if($nev != '' & isset($tema))
					{
						print $nyil . "<a href='index.php?module=add&tema=".$tema."&to='>Új hozzászólás</a><br>";
					}
					
				if($aktual != '' & !isset($tema))
					{
						print $nyil . "<a href='index.php?module=print&tema=".$aktual."'>Aktuális téma</a><br>";	
					}
						print $nyil . "<a href='index.php?module=select_cat'>Kategória választása</a><br>";	
					
				if($module != 'select')
					{
						print $nyil . "<a href='index.php?module=select'>Összes téma</a><br>";
					}
						
				if(isset($tema))
					{
						print $nyil . "<a href='index.php?module=print&tema=".$tema."'>Frissítés</a><br>";
					}
				else
					{
						print $nyil . "<a href='index.php?module=select_cat'>Frissítés</a><br>";
					}
			?>
		</td>
	</tr>
	<tr>
		<td>
		<p class="menu_font">Kiegészítõk</p>
		</td>
	</tr>
	<tr>
		<td>
			<?php
				
				$mypriv = mysql_query("SELECT * FROM privats WHERE cimzett = '".$nev."' AND status ='0'" ) or die(mysql_error());
				$myprivnum = mysql_num_rows($mypriv);
				$mypriv2 = mysql_query("SELECT * FROM privats WHERE cimzett = '".$nev."'");
				$myprivnum2 = mysql_num_rows($mypriv2);

					
				if($nev != '')
					{
						print $nyil . "<a href='index.php?module=privat_read'>Privát üzenetek [ ".$myprivnum."/".$myprivnum2." ]</a><br>";	
					}

						print $nyil . "<a href='index.php?module=users'>Taglista</a><br>";
						print $nyil . "<a href='index.php?module=manual'>Házirend</a>";
					
			?>		
		</td>
	</tr>
	<tr>
		<td>
		<p class="menu_font">Adatok</p>
		</td>
	</tr>

	<tr>
		<td>
		<?php
		$xcat_szam_ = mysql_query("SELECT * FROM forums_cat") 
		or die (mysql_error());
		$xcat_szam = mysql_num_rows( $xcat_szam_ );

		print 'Kategóriák: ' . $xcat_szam . '<br>';
		
		$xtema_szam_ = mysql_query("SELECT * FROM forums") 
		or die (mysql_error());
		$xtema_szam = mysql_num_rows( $xtema_szam_ );

		print 'Témák: ' . $xtema_szam . '<br>';
		
		$xtag_szam_ = mysql_query("SELECT * FROM nicks") 
		or die (mysql_error());
		$xtag_szam = mysql_num_rows( $xtag_szam_ );
		
		print 'Tagok: ' . $xtag_szam . '<br>';
		$xon_szam = count($on_userek_listaja) - 1;
		print 'Online tagok: ' . $xon_szam;
		

?>
		</td>
	</tr>
	<tr>
		<td>
		<p class="menu_font">Online Tagok</p>
		</td>
	</tr>
	<tr>
		<td>
		<?php
			
		if(count($on_userek_listaja) != 1)
					{
						foreach($on_userek_listaja	as $egy_on_tag)
							{
								if($egy_on_tag != '')
									{
										print $egy_on_tag . '<br>';
									}
							}
					}
				else
					{
						print '<span style="font-size: 10">(nincs bejelentkezett tag)</span>';
					}
		?>
		</td>
	</tr>
</table>


</td>
</tr>
</table>
<i>Present by Babylon's System Corporation /Tasnádi 'Tasi' Zsolt (atm)/ Copyright, 2004</i>
</center>
</body>
</html>
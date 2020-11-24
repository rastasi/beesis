<?php
session_start();
session_register( 'theme' );

include 'adatok.php';

$nick_bazis = mysql_connect( $bazis_host, $bazis_user, $bazis_jelszo) or die ('Nem sikerült kapcslódni a MySQL adatbázishoz, az oldal így halott. Kérlek írj e-mailt a tasi9@@freemail.hu címre');	
mysql_select_db( $bazis_nev, $nick_bazis ) or die(mysql_error());

?>
<html>
<head>
  <title><?php print $cim ?></title>
  <meta name="GENERATOR" content="Quanta Plus">
  <link rel="StyleSheet" href="styles/<?php print $theme ?>" type="text/css" />
</head>
<body class="alap bg">

<center><p class="alcim">Névjegykártya</p></center>

<?php



if($theme == '')
	{
		$theme = $style;
	}
	


//USER INFÓ

$hz_user_ = mysql_query("SELECT * FROM nicks WHERE nicknev = '".$nick."'");
$hz_user = mysql_fetch_row($hz_user_);


if(mysql_num_rows($hz_user_) != 0)
{

// HZ SZÁM

$eredmeny2 = mysql_query( "SELECT * FROM forums") or die (mysql_error());

$szamlalo = 0;

while ($eredmeny1 = mysql_fetch_row($eredmeny2))
	{

	$eredmeny = $eredmeny1[0];
	$egytopik2 =  mysql_query("SELECT * FROM ". $eredmeny ." WHERE bekuldo = '". $nick ."'") or die (mysql_error());
	$egytopik = mysql_num_rows($egytopik2);
	$szamlalo = $szamlalo + $egytopik;
	
	}

if($szamlalo > 15)
	{
		if($szamlalo > 50)
			{
				if($szamlalo > 100)
					{
						$rang = "Iskolás";
					}
				else
					{
						$rang = "Óvodás";
					}
			}
		else
			{
				$rang = "Csecsemõ";
			}
	}
else
	{
		$rang = "Embrió";
	}
print '
	

	<table border="0" width="100%" cellpadding="30">
		<tr valign="top">
			<td width="100">
				<?php
				<center>
				<img src="'.$hz_user[4].'" width="100" height="100" class="szegely">
				<p class="nev">' . $nick . '</p>
				<p class="nev">' . $rang . '</p>
				</center>
			</td>
			<td>
			Honlap: <a href="http://'.$hz_user[5].'" target="blank">'.$hz_user[5].'</a><br>
			E-mail cím: <a href="mailto:'.$hz_user[2].'">'.$hz_user[2].'</a><br>
			Hozzászólások száma: '.$szamlalo.'<br>
			Utolsó belépés: '.$hz_user[8].'
			</td>
		</tr>
	</table>
<center><p calss="tema"><a href="javascript:close()">Ablak bezárása</a></p></center>';

}
else
{
print 'A felhasználó nem található az adatbázisban.<br>
Valószínûleg az adminisztrátor törölte a rendszerbõl.
<center><p calss="tema"><a href="javascript:close()">Ablak bezárása</a></p></center>';
}
?>
</body></html>
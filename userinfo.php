<?php
session_start();
session_register( 'theme' );

include 'adatok.php';

$nick_bazis = mysql_connect( $bazis_host, $bazis_user, $bazis_jelszo) or die ('Nem siker�lt kapcsl�dni a MySQL adatb�zishoz, az oldal �gy halott. K�rlek �rj e-mailt a tasi9@@freemail.hu c�mre');	
mysql_select_db( $bazis_nev, $nick_bazis ) or die(mysql_error());

?>
<html>
<head>
  <title><?php print $cim ?></title>
  <meta name="GENERATOR" content="Quanta Plus">
  <link rel="StyleSheet" href="styles/<?php print $theme ?>" type="text/css" />
</head>
<body class="alap bg">

<center><p class="alcim">N�vjegyk�rtya</p></center>

<?php



if($theme == '')
	{
		$theme = $style;
	}
	


//USER INF�

$hz_user_ = mysql_query("SELECT * FROM nicks WHERE nicknev = '".$nick."'");
$hz_user = mysql_fetch_row($hz_user_);


if(mysql_num_rows($hz_user_) != 0)
{

// HZ SZ�M

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
						$rang = "Iskol�s";
					}
				else
					{
						$rang = "�vod�s";
					}
			}
		else
			{
				$rang = "Csecsem�";
			}
	}
else
	{
		$rang = "Embri�";
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
			E-mail c�m: <a href="mailto:'.$hz_user[2].'">'.$hz_user[2].'</a><br>
			Hozz�sz�l�sok sz�ma: '.$szamlalo.'<br>
			Utols� bel�p�s: '.$hz_user[8].'
			</td>
		</tr>
	</table>
<center><p calss="tema"><a href="javascript:close()">Ablak bez�r�sa</a></p></center>';

}
else
{
print 'A felhaszn�l� nem tal�lhat� az adatb�zisban.<br>
Val�sz�n�leg az adminisztr�tor t�r�lte a rendszerb�l.
<center><p calss="tema"><a href="javascript:close()">Ablak bez�r�sa</a></p></center>';
}
?>
</body></html>
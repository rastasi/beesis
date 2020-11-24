<center><p class="alcim">Skin választása</p></center>

<form action="index.php?module=select" method="post">
		Válassz színösszeállítást:
			<select name="theme_temp" size="1">
			<?php
				$stilusok = opendir('styles') or die('nemjó');
				
				while($egystilus = readdir($stilusok))
					{
						if($egystilus != '..' & $egystilus != '.')
							{
								print '<option value="' . $egystilus . '">' . $egystilus . '</option>';
							}
					}
			?>
			</select>
			<input type="submit" value="Mehet">
</form>

<?php

if($nev != '')
{
print '<center><p class="alcim">Saját stíluslap létrehozása</p></center>

<p class="szoveg">Létrehozhatsz saját színösszeállítás, egy kis számítástechnikai elõképzetséggel.
Csak le kell töltened egy minta-stíluslapot, majd a beleírt kommentek segítségével
a kívánt színkódokat. Ezek után már csak be kell töltened a kész fájlt BeeSis rendszerbe.</p>
<p><a href="styles/style.css"><center>Minta fájl letöltése</center></a></p>


<center><p class="alcim">Új stíluslap feltöltése</p></center>

			<form enctype="multipart/form-data" action="index.php?module=theme" method="post">
Feltöltendõ stíluslap: 	<input type="file" name="feltoltendo_theme"> 
	
			<input type="submit" value="Feltölt">
			</form>';

	if (isset($feltoltendo_theme))
		{
			move_uploaded_file( $feltoltendo_theme, './styles/' . $feltoltendo_theme_name);
			print 'A feltöltés sikeres!';
		}
		
}
else
{

print 'Tipp: A regisztrált felhasználók létrehozhatnak saját stíluslapokat!';

}
?>

<center><p class="alcim">Skin v�laszt�sa</p></center>

<form action="index.php?module=select" method="post">
		V�lassz sz�n�ssze�ll�t�st:
			<select name="theme_temp" size="1">
			<?php
				$stilusok = opendir('styles') or die('nemj�');
				
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
print '<center><p class="alcim">Saj�t st�luslap l�trehoz�sa</p></center>

<p class="szoveg">L�trehozhatsz saj�t sz�n�ssze�ll�t�s, egy kis sz�m�t�stechnikai el�k�pzets�ggel.
Csak le kell t�ltened egy minta-st�luslapot, majd a bele�rt kommentek seg�ts�g�vel
a k�v�nt sz�nk�dokat. Ezek ut�n m�r csak be kell t�ltened a k�sz f�jlt BeeSis rendszerbe.</p>
<p><a href="styles/style.css"><center>Minta f�jl let�lt�se</center></a></p>


<center><p class="alcim">�j st�luslap felt�lt�se</p></center>

			<form enctype="multipart/form-data" action="index.php?module=theme" method="post">
Felt�ltend� st�luslap: 	<input type="file" name="feltoltendo_theme"> 
	
			<input type="submit" value="Felt�lt">
			</form>';

	if (isset($feltoltendo_theme))
		{
			move_uploaded_file( $feltoltendo_theme, './styles/' . $feltoltendo_theme_name);
			print 'A felt�lt�s sikeres!';
		}
		
}
else
{

print 'Tipp: A regisztr�lt felhaszn�l�k l�trehozhatnak saj�t st�luslapokat!';

}
?>

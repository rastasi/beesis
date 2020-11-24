<center><p class="alcim">Új avatar feltöltése</p></center>
<center class="szoveg">

A BeeSis 50x50 pixeles, JPG vagy GIF formátumú fájlokat képes helyesen megjeleníteni.

<table border="0" class="" width='450' align="center" cellpadding="2" cellspacing="2">
	<tr>
		<td>
			<form enctype="multipart/form-data" action="index.php?module=avatars_new" method="post">
			<input type="file" name="feltoltendo_avatar"> 
		</td>
		<td>
			<input type="submit" value="Feltölt">
			</form>
		</td>
	</tr>
</table>
</center>				
<?php
	if (isset($feltoltendo_avatar))
		{
			$datum = date('U');
			move_uploaded_file( $feltoltendo_avatar, './avatars/' . $datum);
			print 'A feltöltés sikeres!';
		}
?>

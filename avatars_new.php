<center><p class="alcim">�j avatar felt�lt�se</p></center>
<center class="szoveg">

A BeeSis 50x50 pixeles, JPG vagy GIF form�tum� f�jlokat k�pes helyesen megjelen�teni.

<table border="0" class="" width='450' align="center" cellpadding="2" cellspacing="2">
	<tr>
		<td>
			<form enctype="multipart/form-data" action="index.php?module=avatars_new" method="post">
			<input type="file" name="feltoltendo_avatar"> 
		</td>
		<td>
			<input type="submit" value="Felt�lt">
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
			print 'A felt�lt�s sikeres!';
		}
?>

<center><p class="alcim">Adatm�dos�t�s</p></center>
<?php

session_register('uj_nickavatar');

?>
<center>
<form action="index.php?module=userdata2" method="post">
	<table border="0" width='450' cellpadding="2" cellspacing="2" class="">	
		
		<tr valign="top">
			<td>
					<p align="right">�j jelszavad:		
			</td>
			<td>	 
					<input type="password" name="mod_nickjelszo" size="10"  maxlength="10"></p>
			</td>
		</tr>
		<tr valign="top">
			<td>
					<p align="right">�j jelszavad m�g1x:		
			</td>
			<td>	
					<input type="password" name="mod_nickjelszo2" size="10"  maxlength="10"></p>
			</td>
		</tr>
		<tr>
			<td>
					<p class="szoveg" align="right">�j avatarod:
			</td>
			<td> 

					<script language="JavaScript">
						function avatars(){
  						ablak = open("avatars.php", "avatars", 
    					"width=200,height=500,status=no,menubar=no,scrollbars=yes"); }
					</script>
					<p><a href="javascript:avatars()">Tall�z�s...</a></p>
			</td>

		</tr>
		<tr valign="top">
			<td>
					<p class="szoveg" align="right">�j e-mail c�med:		
			</td>
			<td>		
					<input  type="text" name="mod_nickemail" size="10"  maxlength="30">

			</td>
		</tr>
		<tr valign="top">
			<td>
					<p class="szoveg" align="right">�j weblap c�med:		
			</td>
			<td>
					<p>http://		 <input type="text" name="mod_nickweblap" size="10"  maxlength="30"></p>
			</td>
		</tr>
		<tr valign="top">
			<td>

					<p align="right">�j al��r�sod:	
			</td>
			<td>
					<textarea type="text" name="mod_nickalair" size="10"  maxlength="120"></textarea>
		</tr>
		<tr>
			<td>
			</td>
			<td>

					<input type="submit" value="Mehet">
					
			</td>
		</tr>
	</table>
</form>


</center>
<center><p class="alcim">Hozzászólás szerkesztése</p></center>
<?php


$bekuld = 'igen';


$hz_ = mysql_query( "SELECT * FROM ". $tema." 
																						WHERE azonosito = '" . $ezt ."'"
																					) or die(mysql_error());
																					
$hz = mysql_fetch_row( $hz_ );
if($hz[1] == $nev)
	{
		print '
		<center>
		<table border="0" cellpadding="2" width="450"><tr valign="top">
			<tr valign="top"><td valign="top">
							<center>
								<form action="index.php?module=print" method="post" name=reg>
								<input type="hidden" value="' . $ezt . '" name="ezt">
								<input type="hidden" value="' . $tema . '" name="tema">
								';
								
	}
else
	{
	print 'ezt megszívtad. :-)<br>';
	}
	
	?>
															<script language="javascript">
								function puttext(input, tipus) 
{
	rut = document.reg.erre;
	onoff = input.value.charAt(input.value.length-1);
	onoff = (onoff == '*' ? 0 : 1);

	input.value = (onoff ? input.value+'*' : input.value.substr(0,input.value.length-1));
	
	switch(tipus) {
		//Bold
		case 'b' :
			rut.value += (onoff == 1 ? '[B]' : '[/B]');
		break;

		case 'i' :
			rut.value += (onoff == 1 ? '[I]' : '[/I]');
		break;

		case 'u' :
			rut.value += (onoff == 1 ? '[U]' : '[/U]');
		break;

		case 'l' :
			rut.value += (onoff == 1 ? '[URL href="http://címet ide"]Link' : '[/URL]');
		break;

		case 'e' :
			rut.value += (onoff == 1 ? '[EMAIL mailto:"email cím"]Mail' : '[/EMAIL]');
		break;

		case 'q' :
			rut.value += (onoff == 1 ? '[QUOTE]' : '[/QUOTE]');
		break;

		case 'c' :
			rut.value += (onoff == 1 ? '[CODE]' : '[/CODE]');
		break;

		case 'k' :
			rut.value += (onoff == 1 ? '[IMG]' : '[/IMG]');
		break;
	} //switch
	rut.focus();
} 
								</script>
								<input title="[B] ALT+B: félkövér" style="font-weight: bold;" accesskey="b" onclick="puttext(this, 'b')" tabindex="0" type="button" value=" B " name="f-b">
<input title="[I] ALT+I: dolt" style="font-style: italic;" accesskey="i" onclick="puttext(this, 'i')" tabindex="0" type="button" value=" I " name="f-i"> 
<input title="[U] ALT+U: aláhúzott" style="text-decoration: underline;" accesskey="u" onclick="puttext(this, 'u')" tabindex="0" type="button" value=" U" name="f-u"> 
<input title="[URL] ALT+L: link" style="color: blue; text-decoration: underline;" accesskey="l" onclick="puttext(this, 'l')" tabindex="0" type="button" value=" http:// " name="f-http"> 
<input title="[EMAIL] ALT+E: email" style="color: blue; text-decoration: underline;" accesskey="e" onclick="puttext(this, 'e')" tabindex="0" type="button" value=" mailto@ " name="f-mailto"> 
<!-- <input title="[QUOTE] ALT+Q: idézet" accesskey="q" onclick="puttext(this, 'q')" tabindex="0" type="button" value=" Idézet " name="f-idezet"> -->
								
								
								<?
								
if($hz[1] == $nev)
	{
								print '<textarea name="erre" rows="8" cols="40" class="vilagoskek BlackText2 terdoboz">'
								.$hz[4].
								'</textarea><br/>
								<input type="submit"
								value="Mehet" class="vilagoskek BlackText2 terdoboz" style="margin-top: 10; margin-bottom: 10">
								</form>
						</center>					
					</td>
			</tr>
		</table>
		<center>';
	}
?>	
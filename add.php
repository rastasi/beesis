<center><p class="alcim">Hozz�sz�l�s �r�sa</p></center>
<?php

if($nev != '')
{
$bekuld = 'igen';
		
		print '
						<center>
						<form action="index.php?module=print" method="post" name="reg">';
								?>
															<script language="javascript">
								function puttext(input, tipus) 
{
	rut = document.reg.hozzaszolas;
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
			rut.value += (onoff == 1 ? '[URL href="http://c�met ide"]Link' : '[/URL]');
		break;

		case 'e' :
			rut.value += (onoff == 1 ? '[EMAIL mailto:"email c�m"]Mail' : '[/EMAIL]');
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
								<input class="szoveg terdoboz" title="[B] ALT+B: f�lk�v�r" style="font-weight: bold;" accesskey="b" onclick="puttext(this, 'b')" tabindex="0" type="button" value=" B " name="f-b">
<input class="szoveg vilagoskek terdoboz" title="[I] ALT+I: dolt" style="font-style: italic;" accesskey="i" onclick="puttext(this, 'i')" tabindex="0" type="button" value=" I " name="f-i"> 
<input class="szoveg vilagoskek terdoboz" title="[U] ALT+U: al�h�zott" style="text-decoration: underline;" accesskey="u" onclick="puttext(this, 'u')" tabindex="0" type="button" value=" U" name="f-u"> 
<input class="szoveg vilagoskek terdoboz" title="[URL] ALT+L: link" style="color: blue; text-decoration: underline;" accesskey="l" onclick="puttext(this, 'l')" tabindex="0" type="button" value=" http:// " name="f-http"> 
<input class="szoveg vilagoskek terdoboz" title="[EMAIL] ALT+E: email" style="color: blue; text-decoration: underline;" accesskey="e" onclick="puttext(this, 'e')" tabindex="0" type="button" value=" mailto@ " name="f-mailto"> 
<!-- <input class="szoveg vilagoskek terdoboz" title="[QUOTE] ALT+Q: id�zet" accesskey="q" onclick="puttext(this, 'q')" tabindex="0" type="button" value=" Id�zet " name="f-idezet"> -->
								
								
								<?
								
		print 
								'<input type="hidden" value="' . $to . '" name="to">
								<input type="hidden" value="' . $tema . '" name="tema"><br>
								<textarea name="hozzaszolas" rows="8" cols="40" class="vilagoskek szoveg terdoboz"></textarea><br/>
								<input type="submit"
								value="Mehet" class="vilagoskek szoveg terdoboz" style="margin-top: 10; margin-bottom: 10">
								</form>
						</center>';
		
		include 'print.php';
}
else 
{
print '<center>Nem jelentkezt�l be!</center>';
include 'login.php';

}
?>
<?php

if($admin == $adminpass)
	{

print '<center><p class="alcim">�j Kateg�ria l�trehoz�sa</p></center>
		<form action="index.php?module=select_cat" method="post" style="margin-left: 10">
		Kateg�ra neve: <input type="text" class="" name="ujcat" size="20" style="margin-bottom: 5"><br>
		
		Kateg�ra le�r�sa: <textarea type="text" class="" name="ujcat_l" size="20" maxleght="255"></textarea><br>
		<input type="submit" value="L�trehoz" class="Button" style="margin-top: 5">
		</form>
';

	}


print '<center><p class="alcim">�j T�ma l�trehoz�sa</p></center>
		<form action="index.php?module=select_cat" method="post" style="margin-left: 10">
Kateg�ria:	<select name="ntcat" size="1" style="margin-bottom: 3">';
					
						$new_topic_cat = mysql_query("SELECT * FROM forums_cat");
						while ( $new_topic_cat2 = mysql_fetch_row( $new_topic_cat ) )
							{
								print '<option value="'. $new_topic_cat2[0] .'">'. $new_topic_cat2[1] .'</option>';
							}
			
print			'</select><br>
				T�ma neve: <input type="text" class="" name="ujtema" size="20">
				<input type="submit" value="L�trehoz" class="Button" style="margin-top: 5">
			</form>'
			
?>
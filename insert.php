<?php

if($admin == $adminpass)
	{

print '<center><p class="alcim">Új Kategória létrehozása</p></center>
		<form action="index.php?module=select_cat" method="post" style="margin-left: 10">
		Kategóra neve: <input type="text" class="" name="ujcat" size="20" style="margin-bottom: 5"><br>
		
		Kategóra leírása: <textarea type="text" class="" name="ujcat_l" size="20" maxleght="255"></textarea><br>
		<input type="submit" value="Létrehoz" class="Button" style="margin-top: 5">
		</form>
';

	}


print '<center><p class="alcim">Új Téma létrehozása</p></center>
		<form action="index.php?module=select_cat" method="post" style="margin-left: 10">
Kategória:	<select name="ntcat" size="1" style="margin-bottom: 3">';
					
						$new_topic_cat = mysql_query("SELECT * FROM forums_cat");
						while ( $new_topic_cat2 = mysql_fetch_row( $new_topic_cat ) )
							{
								print '<option value="'. $new_topic_cat2[0] .'">'. $new_topic_cat2[1] .'</option>';
							}
			
print			'</select><br>
				Téma neve: <input type="text" class="" name="ujtema" size="20">
				<input type="submit" value="Létrehoz" class="Button" style="margin-top: 5">
			</form>'
			
?>
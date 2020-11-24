<center><p class="alcim">Taglista</p></center>
<?php


// USER TÖRLÉSE ADMIN ÁLTAL

if(isset($deluser) & $admin == $adminpass)
	{
		mysql_query('DELETE FROM nicks WHERE nicknev = "'. $deluser .'"');
	}



// TAGOK KIÍRÁSA

$userek = mysql_query("SELECT * FROM nicks ORDER BY nicknev");

$userszam = mysql_num_rows( $userek );

print '<center>
		<table border="0" width="100%" cellspacing="10" class="">
			<tr>
				<td><i>avatara</i></td>
				<td><i>neve</i></td>
				<td><i>e-mail címe</i></td>
				<td><i>honlapja</i></td>';
print '		</tr>';

$sz = 0;

	while ( $egy_user = mysql_fetch_row( $userek ) )
		{ 

$sz = $sz + 1;
print '			<script language="JavaScript">
						function userinfo'.$sz.'(){
  						ablak = open("userinfo.php?nick='.$egy_user[0].'", "userinfo", 
    					"width=500,height=500,status=no,menubar=no,scrollbars=no"); }
				</script>';
print '		<tr>';
print '			<td><img src="'.$egy_user[4].'" width="35" height="35"></td>';
print '			<td>'.$egy_user[0];

if($admin == $adminpass)
	{
		print '<a href="index.php?module=users&deluser='.$egy_user[0].'">'.$delikon.'</a>';
	}

print '</td>';

print '			<td><a href="mailto:'.$egy_user[2].'">'.$egy_user[2].'</a></td>';
print '			<td><a href="http://'.$egy_user[5].'" target="_blank">'.$egy_user[5].'</a></td>';

print '			<td><a href="javascript:userinfo'.$sz.'()"><img src="images/nevjegy.gif" 				                     border="0" title="Névjegykártya"></a></td>';

print '			<td><a href="index.php?module=privat_add&to='.$egy_user[0].'"><img src="images/sendpriv.gif" 				                     border="0" title="Privát neki: '.$egy_user[0].'"></a></td>';

print '		</tr>';

		};

print '</table>'
?>
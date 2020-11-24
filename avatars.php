<?php
session_start();
print '

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-2">
<title>Válassz avatart!</title>
<link href="style.css" type=text/css rel=stylesheet> 
</head>
<body class="bg">';

if(isset($uj_avatar))
{
$uj_nickavatar = $uj_avatar;

print '<body onLoad="window.close()"></body>
</body>';

}
else
{

$hirek = opendir('./avatars');
while (false !== ($hir = readdir($hirek)))

	{ 
    if ($hir != "." && $hir != "..")
    
    		{
    				
    				print '<p>';
    				print '<a href="avatars.php?uj_avatar='. $hir .'">';
    				print '<img src="avatars/' . $hir . '" border="0" width="100" height="100"></a></p>';

    		}

	}
closedir( $hirek );


}
?>

</body>
</html>

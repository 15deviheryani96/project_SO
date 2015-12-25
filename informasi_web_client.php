<?php
	$ip_address_2 = $_SERVER['REMOTE_ADDR'];


$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$browser = 'Unknown';
	$operation_system = 'Unknown';
	if (preg_match('/linux/i', $user_agent)) {
		$operation_system = 'Linux';
	}
	elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {
		$operation_system = 'Mac';
	}
	elseif (preg_match('/windows|win32/i', $user_agent)) {
		$operation_system = 'Windows';
	}

	if(preg_match('/MSIE/i', $user_agent) && !preg_match('/Opera/i', $user_agent)) {
    $browser = 'Internet Explorer';

	}

	elseif(preg_match('/Firefox/i', $user_agent)) {
    $browser = 'Mozilla Firefox';

	}

	elseif(preg_match('/Chrome/i', $user_agent)) {
    $browser = 'Google Chrome';

	}
elseif(preg_match('/Safari/i', $user_agent)) {
    $browser = 'Apple Safari';
}
elseif(preg_match('/Opera/i', $user_agent)) {
    $browser = 'Opera';
}
elseif(preg_match('/Netscape/i', $user_agent)) {
    $browser = 'Netscape';
}

/*Get user ip address details with geoplugin.net*/
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL)); 

/*Get Country name by return array*/
$country = $addrDetailsArr['geoplugin_countryName'];

/*Comment out these line to see all the posible details*/
/*echo '<pre>';
print_r($addrDetailsArr);
die();*/

if(!$country){
   $country='Not Define';
}

?>

<html>
<head>
<title>Isi</title>
</head>
<body bgcolor="FFA072">
<pre>






<center><table border="1" width="100%">
<tr>
	<td width="20" height="120"><center><font face="ALGERIAN" size="40">WELCOME !! HERE YOUR INFORMATION : </font></td>
</tr>
<tr>
	<td><center>
		<font face="Comic Sans MS" size="5"><?php echo "<br><strong>IP Address </strong>: $ip_address_2 <br>";?></font>
		<?php echo '<font face="Comic Sans MS" size="5"><br><strong>Country</strong>:'.$country.'<br/></font>';?>
		<font face="Comic Sans MS" size="5"><?php echo "<br><strong>Sistem Operasi </strong>: $operation_system <br>";?></font>
		<font face="Comic Sans MS" size="5"><?php echo "<br><strong>Browser </strong>: $browser <br>"; ?></center></td>	</font>
</tr>
</table>
</center>
</pre>
</body>
</html>

<?php

// Inialize session

session_start();



// Check, if username session is NOT set then this page will jump to login page
/*
if (!isset($_SESSION['user'])) {
        header('Location: index.php');
}
*/
?>




<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Pay Roll</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
</head>

<font face="Times New Roman, Times, serif"><script >

function SelectPage()
{

	if(SelOption.value=='MSPL') 
		window.navigate('Mel_Report.php?msg=Successfully Connection');
	else if(SelOption.value=='ASPL')
		window.navigate('Avi_Report.php?msg=Successfully Connection');
	else if(SelOption.value=='MIPL')
		window.navigate('MIPL_Report.php?msg=Successfully Connection');
	else if(SelOption.value=='MBS')
		window.navigate('MBS_Report.php?msg=Successfully Connection');
}
</script>

<?php
include 'ServerDetail.php';

$username 	= $_POST['user'];
$password 	= $_POST['password'];

//die("" . $username ."". $password."");
$socket = mysql_connect('localhost',$user,$pass);

if (! $socket)
	die ("Could not connect to MySql Server");

mysql_select_db($db, $socket)
	or die ("Could not connect to database: $db".mysql_error() );

$query = "SELECT USER_NAME,PASS_WORD FROM userinfo";

$result = mysql_query($query);



$num_rows = 0;

$num_rows = mysql_num_rows($result);

$valid_user = 0;

while($rows = mysql_fetch_array($result))
{ 
		
	if(($username == $rows[0]) && ($password == $rows[1]))
	{	
	$valid_user = 1;
		$_SESSION['user'] = $_POST['user'];
		//$_SESSION['password'] = $_POST['passwors'];
		
		echo "<body bgcolor='E0E0E0'>";
		echo "<p>&nbsp;</p>";
		echo "<div align='center'>";
	 	echo "<center>";
		echo "<table border='0' cellpadding='0' cellspacing='0' >";
		echo "<tr>";
		echo "<td class=header >Select the company:</td>";
		echo "<td width='123'>";

		echo "<p><select size='1' name='SelOption' onchange = 'SelectPage();'>";
		echo "<option >-Select Company-</option>";
		echo "<option value = 'MSPL' >MELTRONICS</option>";
		echo "<option value='ASPL' >AVITRONICS</option>";
		echo "<option value='MIPL' >MELTRONICS INFOTECH</option>";
		echo "<option value='MBS' >MELTRONICS BUSINESS</option>";
		echo "&nbsp;";
		echo "</select></td>";

		echo "</tr>";
		echo "</table>";
		echo "</center>";
		echo "</div>";
		break;
	}
	else{
			 header('Location: index.php');
		}
	
	
}
?>

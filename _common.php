<?php
/*
설정파일
C:\xampp\htdocs
$_SESSION[$session_name] = $value;
*/

$NtosDir = "C:/xampp/htdocs/data";

$NtosDirPw = $NtosDir."/Pw";

if(empty($_SESSION['pws'])){
	$PwFile = $NtosDir."/Ntos.txt";

exit;
} else {

	$NtosFile = $NtosDir."/Ntos.txt";

	@mkdir($NtosDir, 707);
	@chmod($NtosDir, 707);

	$NtosKey = "";
	$NtosId = "";
	$NtosSite = "";
	if(file_exists($NtosFile)){
		$NtosInfo = file_get_contents($NtosFile);
		$NtosInfo = explode("||", $NtosInfo);
		$NtosSite = $NtosInfo[0];
		$NtosId = $NtosInfo[1];
		$NtosKey = $NtosInfo[2];

	} else {
		if(!preg_match("@NtosConfig.php@", $_SERVER['PHP_SELF'])) 	echo '<script>location.href="./NtosConfig.php";</script>';
	}	//end if

}	//end if
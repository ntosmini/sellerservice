<?php
@session_start();
/*
설정파일
C:\xampp\htdocs
$_SESSION[$session_name] = $value;
*/
$NtosKey = "";
$NtosId = "";
$NtosSite = "";


$NtosDir = "C:/xampp/htdocs/data";
@mkdir($NtosDir, 707);
@chmod($NtosDir, 707);



$PwFile = "NtosPw.php";
$PwFilePath = $NtosDir."/".$PwFile;

$ConfigFile = "NtosConfig.php";
$ConfigFilePath = $NtosDir."/".$ConfigFile;

$pw = (empty($_POST['pw']))?"":$_POST['pw'];
$password = (empty($_POST['password']))?"":$_POST['password'];

if($pw){
	$pwContent = array();
	$pwContent[] = "<?php \n";
	$pwContent[] = ' $pws =  "'.$pw.'";';
	$pwContent = implode('', $pwContent);
		$pw_file = fopen($PwFilePath, "w") or die("Unable to open file!");
		fwrite($pw_file, $pwContent);
		fclose($pw_file);
		$_SESSION['login'] = "success";
		echo '<script>location.href="./";</script>';
}	//end if


if($password){
	include(dirname(__FILE__)."/data/".$PwFile);
	if($pws == $password){
		$_SESSION['login'] = "success";
		echo '<script>location.href="./";</script>';
		exit;
	} else {
		echo '<script>alert("비밀번호가 틀립니다.")</script>';
		echo '<script>location.href="./";</script>';
		exit;
	}	//end if
}	//end if

if(empty($_SESSION['login'])){

	@mkdir($NtosDirPw, 707);
	@chmod($NtosDirPw, 707);

	

	if(file_exists($PwFilePath)){
		echo '<form method="post" >';
		echo '<div>로그인 해주세요.</div>';
		echo '비밀번호 : <input type="password" name="password" id="password" value="">';

		echo ' <input type="submit" value="확인">';
		echo '</form>';

	} else {

		echo '<form method="post" >';
		echo '<div>초기 비밀번호를 설정해주세요.</div>';
		echo '비밀번호 : <input type="text" name="pw" id="password"  value="">';

		echo ' <input type="submit" class="btn_submit" value="확인">';
		echo '</form>';
	}

echo '<script>';
echo 'document.addEventListener("DOMContentLoaded", function(){';
echo 'document.getElementById("password").focus();';
echo '});';
echo '</script>';

		exit;
} else {
	include(dirname(__FILE__)."/data/".$PwFile);


	if(file_exists($ConfigFilePath)){
		include(dirname(__FILE__)."/data/".$ConfigFile);
	} else {
		if(!preg_match("@NtosConfig.php@", $_SERVER['PHP_SELF'])) 	echo '<script>location.href="./NtosConfig.php";</script>';
	}	//end if

}	//end if

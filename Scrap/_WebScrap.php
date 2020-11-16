<?php
//header("Content-Type: text/html; charset=UTF-8");
/*
스크랩


- 셀레니움 설치
pip install selenium

- BeautifulSoup 설치
pip install beautifulsoup4



*/
$Mode = (empty($_GET['Mode']))?"not":$_GET['Mode'];
if($Mode != "not"){
	echo 'success';
}	//end if

$SiteUrl = (empty($_GET['SiteUrl']))?"not":base64_decode($_GET['SiteUrl']);	//base64_encode
$WebType = (empty($_GET['WebType']))?"Firefox":base64_decode($_GET['WebType']);	// "Chrome" or "Firefox" or "curl"
$Referer = (empty($_GET['Referer']))?"not":base64_decode($_GET['Referer']);
$brand = (empty($_GET['brand']))?"not":base64_decode($_GET['brand']);

$ScrapUrl = (empty($_GET['ScrapUrl']))?"not":$_GET['ScrapUrl'];	//수집 url 표기


if($SiteUrl == "not") {
	exit;
}

$WebType = (empty($WebType))?"Firefox":$WebType;


if(preg_match('@amazon.@', $SiteUrl)){

	$pattern = '@(?P<Domain>amazon..*)/@s';
	preg_match($pattern, $SiteUrl, $matches);
	$Domain = $matches['Domain'];
	$DomainEx = explode("/", $Domain);
	$Domain = array_shift($DomainEx);

	$SiteEx = explode($Domain, $SiteUrl);
	$Site = array_shift($SiteEx);

	$Referer = base64_encode($Site.$Domain);
}	//end if

$SiteUrl = base64_encode($SiteUrl);

ob_start();
passthru("/xampp/htdocs/Scrap/_WebScrap.py $SiteUrl $WebType $Referer");
$PageHtml = ob_get_clean(); 
ob_end_clean();

if($PageHtml){
	echo htmlspecialchars_decode($PageHtml);

	//하단 수집사이트 url 표기
	if($ScrapUrl == "not"){    //번역 오리진 소스 는 제외
		echo "\n\n _ScrapUrl_: [#[".base64_decode($SiteUrl)."]#]";
	}   //end if
}	//end if
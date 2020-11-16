<?php
include(dirname(__FILE__)."/_common.php");
$MTitle = "로그아웃";
include(dirname(__FILE__)."/_head.php");

session_unset(); // 모든 세션변수를 언레지스터 시켜줌
session_destroy(); // 세션해제함

echo '<script>location.href="./";</script>';
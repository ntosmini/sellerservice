<?php
include(dirname(__FILE__)."/_common.php");
$MTitle = "�α׾ƿ�";
include(dirname(__FILE__)."/_head.php");

session_unset(); // ��� ���Ǻ����� �������� ������
session_destroy(); // ����������

echo '<script>location.href="./";</script>';
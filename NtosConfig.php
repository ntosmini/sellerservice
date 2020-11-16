<?php
include(dirname(__FILE__)."/_common.php");
$MTitle = "Ntos 설정";
include(dirname(__FILE__)."/_head.php");


$mode = (empty($_POST['mode']))?"":$_POST['mode'];

if($mode == "update"){
	$Content = array();

	$Content[] = $_POST['NtosSite'];
	$Content[] = $_POST['NtosId'];
	$Content[] = $_POST['NtosKey'];

	$Content = implode("||", $Content);

	$source_file = fopen($NtosFile, "w") or die("Unable to open file!");
	fwrite($source_file, $Content);
	fclose($source_file);

	echo '<script>location.href="./NtosConfig.php";</script>';
}	//end if


?>

	<div>
		<form name="NtosConfig" method="post">
			<input type="hidden" name="mode" value="update">
			<div class="frm_table1 tbl_wrap">
			<table>

				<tr>
					<th>Ntos Site</th>
					<td><input type="text" name="NtosSite" value="<?=$NtosSite?>" size="50"></td>
				</tr>

				<tr>
					<th>Ntos ID</th>
					<td><input type="text" name="NtosId" value="<?=$NtosId?>" size="50"></td>
				</tr>

				<tr>
					<th>Ntos Key</th>
					<td><input type="text" name="NtosKey" value="<?=$NtosKey?>" size="50"></td>
				</tr>

			</table>
			</div>

			<div><input type="submit" class="btn_submit" value="저장"></div>

		</form>
	</div>

<?php
include(dirname(__FILE__)."/_tail.php");
?>
<?php
$page_title="Delete News";
require_once($_SERVER["DOCUMENT_ROOT"]."/News/user/nav.php");
if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
{
    $id = trim($_GET["q"]);
    delete_content($id);
}
echo "<script>window.location='/News/user/';</script>";
exit(0);
?>

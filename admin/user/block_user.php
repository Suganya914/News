<?php 
$page_title="Block User";
require_once($_SERVER["DOCUMENT_ROOT"]."/News/admin/nav.php");
if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
{
    $id = trim($_GET["q"]);
    $user = get_user_details_by_passing_id($id);
}
if ($user["block"]==="0"){$block='1';
block_user($id,$block);}
else {$block='0'; block_user($id,$block);}
echo "<script> window.location='/News/admin/user/';</script>";
exit(0);
?>




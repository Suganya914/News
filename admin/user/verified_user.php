<?php 
$page_title="Verified User";
require_once($_SERVER["DOCUMENT_ROOT"]."/News/admin/nav.php");
if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
{
    $id = trim($_GET["q"]);
    $user = get_user_details_by_passing_id($id);
}
if ($user["verified"]==="0"){$verified='1';
verified_user($id,$verified);}

echo "<script> window.location='/News/admin/user/';</script>";
exit(0);
?>




<?php
$page_title="Role Update"; 
require_once($_SERVER["DOCUMENT_ROOT"]."/News/admin/nav.php");
if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
{
    $id = trim($_GET["q"]);
    $user = get_user_details_by_passing_id($id);
}
if ($user["role"]==="user"){$role='admin';
role_update($id,$role);}
else {$role='user'; role_update($id,$role);}
echo "<script> window.location='/News/admin/user/';</script>";
exit(0);
?>
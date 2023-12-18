<?php
    $page_title="SignOut";
	require_once($_SERVER["DOCUMENT_ROOT"]."/News/includes/db.php");
	$_SESSION = array();
	session_destroy();
	header("Location: /News/");
	exit(0);
?>
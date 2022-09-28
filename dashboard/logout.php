<?php
$page="Logout";
include_once $_SERVER['DOCUMENT_ROOT']."/iNote/config.php";
include $DOC_ROOT."/include/header.php";
if (session_destroy()) {
    header("Location: ".SITE_ROOT."/index.php");
    exit();
}
include $DOC_ROOT."/include/footer.php";
?>

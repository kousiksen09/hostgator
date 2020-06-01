<?php
session_start();
?>
<?php
$_SESSION['member_email']=null;
$_SESSION['member_name']=null;
$_SESSION['member_password']=null;
$_SESSION['member_id']=null;
//all sessions are cancelled
header("Location: ../index.php");
?>

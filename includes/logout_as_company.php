<?php
session_start();
?>
<?php
$_SESSION['company_email']=null;
    $_SESSION['company_password']=null;
    $_SESSION['company_full_name']=null;
    $_SESSION['company_id']=null;

//all sessions are cancelled
header("Location: ../index.php");
?>

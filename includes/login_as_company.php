<?php
include "db.php";
include "../simple_functions.php";
// ob_start();

?>
<?php
 session_start();
//once logged in start the session
?>




<?php
if(isset($_POST['login_as_company']))
{
    //ESCAPING THE INPUT TAKEN FROM THE USER
    $company_email=escape($_POST['company_email']);
    $company_password=escape($_POST['company_password']);
    if(!empty($company_email) && !empty($company_password))
    {

$query="SELECT * from skillcrux_companies WHERE company_email='$company_email' AND company_password='$company_password' ";
    $login_company_query=mysqli_query($connection,$query);
    if(!$login_company_query)
    { 
        die("QUERY FAILED1".mysqli_error($connection));
}
while($row=mysqli_fetch_assoc($login_company_query))
{
    $db_company_email=$row['company_email'];
    $db_company_password=$row['company_password'];
    
}

if($db_company_email===$company_email && $db_company_password===$company_password)
{
   

$logged_in_company=$db_company_email;
$query="SELECT * from skillcrux_companies WHERE company_email='$logged_in_company' ";
$find_company_query=mysqli_query($connection,$query);
if(!$find_company_query)
die("QUERY FAILED".mysqli_error($connection));
$row=mysqli_fetch_assoc($find_company_query);
$company_full_name=$row['company_full_name'];
$company_id=$row['company_id'];
 //setting up the sessions
 $_SESSION['company_email']=$db_company_email;
    $_SESSION['company_password']=$db_company_password;
    $_SESSION['company_full_name']=$company_full_name;
    $_SESSION['company_id']=$company_id;
    header("Location:../company");
}
else
{
    header("Location:index.php");
    //redirected
}
}
}

?>
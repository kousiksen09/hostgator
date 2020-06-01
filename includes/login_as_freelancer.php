<?php
include "db.php";
include "../simple_functions.php";
?>
<?php
 session_start();
//once logged in start the session
?>




<?php
if(isset($_POST['login_as_freelancer']))
{
    $member_email=escape($_POST['member_email']);
    $member_password=escape($_POST['member_password']);
    if(!empty($member_email)&&!empty($member_password))
    {
    
$query="SELECT * from skillcrux_freelancers WHERE member_email='$member_email' AND member_password='$member_password' ";
    $login_freelancer_query=mysqli_query($connection,$query);
    if(!$login_freelancer_query)
        die("QUERY FAILED".mysqli_error($connection));

while($row=mysqli_fetch_assoc($login_freelancer_query))
{
    $db_member_email=$row['member_email'];
    $db_member_password=$row['member_password'];
}

if($db_member_email===$member_email && $db_member_password===$member_password)
{
   

$logged_in_member=$db_member_email;
$query="SELECT * from skillcrux_freelancers WHERE member_email='$logged_in_member' ";
$find_member_query=mysqli_query($connection,$query);
if(!$find_member_query)
die("QUERY FAILED".mysqli_error($connection));
$row=mysqli_fetch_assoc($find_member_query);
$member_name=$row['member_fullname'];
$_SESSION['member_email']=$logged_in_member;
$_SESSION['member_name']=$member_name;
$_SESSION['member_password']=$db_member_password;
$_SESSION['member_id']=$row['member_id'];
 //setting up the sessions
//  $_SESSION['admin_email']=$db_admin_email;
//     $_SESSION['admin_password']=$db_admin_password;
//     $_SESSION['admin_name']=$admin_name;
    header("Location:../profile");
}
else
{
    header("Location:../index.php");
    //redirected
}
}


}

?>
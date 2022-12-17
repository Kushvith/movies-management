<?php  
session_start();
$message = "ac";
if(isset($_SESSION["admin_name"]))
{
    $message = "done";
}
require "../config/pdoconfig.php";

 if(!empty($_POST["member_name"]) && !empty($_POST["member_password"]))
 {
  $email = $_POST["member_name"];
  $password = md5($_POST["member_password"]);
  $password1 = $_POST["member_password"];
  $query = "SELECT * FROM admin_login where email = '$email' and password = '$password'";
  $statement = $connection->prepare($query);
  $statement->execute();
  $user = $statement->fetchAll(); 
  if($user)   
  {  
    $_SESSION["admin_name"] = $email;
   if(!empty($_POST["remember"]))   
   {  
    setcookie ("member_login",$email,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("member_password",$password1,time()+ (10 * 365 * 24 * 60 * 60));
   }  
   else  
   {
    if(isset($_COOKIE["member_login"]))   
    {  
     setcookie ("member_login","");  
    }  
    if(isset($_COOKIE["member_password"]))   
    {  
     setcookie ("member_password","");  
    }  
   }
            $message = "done";
  }  
  else  
  {  
   $message = "Invalid Login";  
  } 
 }


echo $message;
 ?>
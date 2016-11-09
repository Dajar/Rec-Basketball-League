<?php
include("inc/header.php");
 
$firstName = $_POST["user_firstName"];
$lastName = $_POST["user_lastName"];
$email = $_POST["user_email"];
$phone = $_POST["user_phone"];
$freeAgent = $_POST["user_freeAgent"];
$position = $_POST["user_position"];
$comments = $_POST["user_comments"];

echo "<pre>";
$email_body = "";
$email_body .= "First Name: ". $firstName . "\n";
$email_body .=  "Last Name: ". $lastName . "\n";
$email_body .=  "Email: ". $email . "\n"; 
$email_body .=  "Phone: ". $phone . "\n";
$email_body .=  "Free Agent: ". $freeAgent . "\n";
$email_body .=  "Position: ". $position . "\n";
$email_body .=  "Comments: ". $comments;
echo $email_body;
echo "</pre>";

//To Do: Send Email
 header("location:thankyou.php");
?>
 
 
 
 </div><!--container div-->
</div><!--wrap div-->
<?php include("inc/footer.php");
?>


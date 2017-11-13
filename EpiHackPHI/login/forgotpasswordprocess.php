<?PHP

require_once '../PHPMailer/PHPMailerAutoload.php';
//Database connection
require_once("../common/dbconnection_inc.php");
$email=mysqli_real_escape_string($conn,$_POST['email']);

$sqluser="SELECT * FROM user WHERE email='$email'";
	$resultuser=mysqli_query($conn,$sqluser) 
	or die("Query having an error ".mysqli_error($conn));
	
	$count=mysqli_num_rows($resultuser);
	
	if($count!=0){
	
	//To get a record into an array 
	$rowuser=mysqli_fetch_assoc($resultuser);
	//To create variables to store user details
	$fname=$rowuser['fname'];
	$lname=$rowuser['lname'];
	$email=$rowuser['email'];
	$fullname=$fname." ".$lname;
	
	// To generate Random Password 
	$seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789@#&'); // and any other characters
    shuffle($seed); // probably optional since array_is randomized; this may be redundant
    $rand = '';
    foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];
		
	$pas1=sha1($rand);
	$custdetailOutput.="Hi ".$fname." ".$lname.", your new password is : ".$rand;
	$user_id=$rowuser['user_id'];
	$sql="UPDATE login SET password='$pas1' WHERE user_id='$user_id'";
	mysqli_query($conn,$sql);


$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPAuth=true;

$mail->Host = 'smtp.gmail.com';
$mail->Username='lrh.mdcc@gmail.com';
$mail->Password='LRH@MDCC123456';
$mail->SMTPSecure='ssl';
$mail->Port=465;

$mail->From="Admin@mdcc.lk";

$mail->FromName='MDCC System Admin';
$mail->addAddress($email, $fullname);
//$mail->AddCC("shamitha88@gmail.com");
$mail->isHTML(true);
//$mail->AddEmbeddedImage('../images/Banner.png');  
$mail->Subject='Forgotten MDCC Password';


$mail->Body= $custdetailOutput;
$mail->AltBody = $custdetailOutput;
if($mail->send()){
	$msg=base64_encode("<font color='#0F8A30'>Email has been sent, please check your email and click login button.</font>");

}else{
	$msg=$mail->ErrorInfo;
	$msg=base64_encode("<font color='#FF0000'>".$msg."</font>");
}


	}else{
		$msg=base64_encode("<font color='#FF0000'>Invalid Email Address</font>");
	}
	//echo base64_decode($msg);
	header("Location:forgotpassword.php?msg=$msg");
?>
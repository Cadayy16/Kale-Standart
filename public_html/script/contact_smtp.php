<?php
/*
Template Name: Industry - Factory & Industrial HTML Template

Variable
	$recaptchaSecret : Recaptcha Secret Key
 
	$dzName : Contact Person Name
	$dzEmail : Contact Person Email
	$dzMessage : Contact Person Message
	$dzRes : response holder
	$dzOtherField : Form other additional fields
	
	
	$dzMailSubject : Mail Subject.
	$dzMailMessage : Mail Body
	$dzMailHeader : Mail Header
	$dzEmailReceiver : Contact receiver email address
	$dzEmailFrom : Mail Form title
	$dzEmailHeader : Mail headers
*/
/* require ReCaptcha class */
require('recaptcha-master/src/autoload.php');

/* ReCaptch Secret */
$recaptchaSecret = '<!-- Put Your reCaptcha Secret Key -->';

$dzEmailTo 		= "info@example.com";   /* Receiver Email Address */
$dzEmailFrom    = "Industry Contact";

#### Load PHP Mailer Library ####
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'php_mail/vendor/autoload.php';
#### Load PHP Mailer Library End ####

function pr($value)
{
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}

#### SMTP Mail Function ####
function smtp_mail($dzEmailTo, $dzEmailFrom, $dzEmail, $dzMailSubject, $dzMailMessage)
{
    $mail = new PHPMailer(true);
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = '<!-- Put Your Server Host  -->';                //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'username@example.com';                   //SMTP username
    $mail->Password   = '<!-- Password -->';                        //SMTP password
    $mail->SMTPSecure = 'SSL';            						//Enable implicit TLS encryption
    $mail->Port       = 25;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($dzEmailTo, $dzEmailFrom);
    $mail->addAddress($dzEmailTo, $dzEmailFrom);     //Add a recipient
    $mail->addReplyTo($dzEmail);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $dzMailSubject;
    $mail->Body    = $dzMailMessage;

    return $mail->send();
}
#### SMTP Mail Function End ####

try {
    if (!empty($_POST)) {
	
		$reCaptchaEnable = isset($_POST['reCaptchaEnable']) ? $_POST['reCaptchaEnable'] : 1;
		
		
		if($reCaptchaEnable)
		{
		
			/* validate the ReCaptcha, if something is wrong, we throw an Exception,
				i.e. code stops executing and goes to catch() block */
			
			if (!isset($_POST['g-recaptcha-response'])) {
				$dzRes['status'] = 0;
				$dzRes['msg'] = 'ReCaptcha is not set.';
				echo json_encode($dzRes);
				exit;
			}

			/* do not forget to enter your secret key from https://www.google.com/recaptcha/admin */
			
			$recaptcha = new \ReCaptcha\ReCaptcha($recaptchaSecret, new \ReCaptcha\RequestMethod\CurlPost());
			
			/* we validate the ReCaptcha field together with the user's IP address */
			
			$response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

			if (!$response->isSuccess()) {
				$dzRes['status'] = 0;
				$dzRes['msg'] = 'ReCaptcha was not validated.';
				echo json_encode($dzRes);
				exit;
			}
        }
		
		#### Contact Form Script ####
		if($_POST['dzToDo'] == 'Contact')
		{
			$dzName = trim(strip_tags($_POST['dzName']));
			$dzEmail = trim(strip_tags($_POST['dzEmail']));
			$dzMessage = strip_tags($_POST['dzMessage']);	
			$dzRes = array();
			if (!filter_var($dzEmail, FILTER_VALIDATE_EMAIL)) 
			{
				$dzRes['status'] = 0;
				$dzRes['msg'] = 'Wrong Email Format.';
			}
			$dzMailSubject = 'Industry|Contact Form: A Person want to contact';
			$dzMailMessage	= 	"
								A person want to contact you: <br><br>
								Name: $dzName<br/>
								Email: $dzEmail<br/>
								Message: $dzMessage<br/>
								";
								
			$dzOtherField = "";
			if(!empty($_POST['dzOther']))
			{
				$dzOther = $_POST['dzOther'];
				$message = "";
				foreach($dzOther as $key => $value)
				{
					$fieldName = ucfirst(str_replace('_',' ',$key));
					$fieldValue = ucfirst(str_replace('_',' ',$value));
					$dzOtherField .= $fieldName." : ".$fieldValue."<br>";
				}
			}
			$dzMailMessage .= $dzOtherField; 
        
            #### Calling SMTP Mail Function ####
			$res = smtp_mail($dzEmailTo, $dzEmailFrom, $dzEmail, $dzMailSubject, $dzMailMessage);
            #### Calling SMTP Mail Function End ####
            
			if($res)
			{
				$dzRes['status'] = 1;
				$dzRes['msg'] = 'We have received your message successfully. Thanks for Contact.';
			}
			else
			{
				$dzRes['status'] = 0;
				$dzRes['msg'] = 'Some problem in sending mail, please try again later.';
			}
			echo json_encode($dzRes);
			exit;
		}
		#### Contact Form Script End ####
		
		#### Appointment Form Script ####
		if($_POST['dzToDo'] == 'Appointment')
		{
			$dzMessage = isset($_POST['dzMessage'] ) ? $_POST['dzMessage'] : '';
			
			$dzName = trim(strip_tags($_POST['dzName']));
			$dzEmail = trim(strip_tags($_POST['dzEmail']));
			$dzMessage = strip_tags($dzMessage);	
			$dzRes = array();
			if(!filter_var($dzEmail, FILTER_VALIDATE_EMAIL)) 
			{
				$dzRes['status'] = 0;
				$dzRes['msg'] = 'Wrong Email Format.';
				echo json_encode($dzRes);
				exit;
			}
			
				
			
			$dzMailSubject = 'Industry|Appointment Form: A Person want to contact';
			$dzMailMessage	= 	"
								A person want to contact you: <br><br>
								Name: $dzName<br/>
								Email: $dzEmail<br/>
								Message: $dzMessage<br/>
								";
			$dzOtherField = "";
			if(!empty($_POST['dzOther']))
			{
				$dzOther = $_POST['dzOther'];
				$message = "";
				foreach($dzOther as $key => $value)
				{
					$fieldName = ucfirst(str_replace('_',' ',$key));
					$fieldValue = ucfirst(str_replace('_',' ',$value));
					$dzOtherField .= $fieldName." : ".$fieldValue."<br>";
				}
			}
			$dzMailMessage .= $dzOtherField; 
			
			#### Calling SMTP Mail Function ####
			$res = smtp_mail($dzEmailTo, $dzEmailFrom, $dzEmail, $dzMailSubject, $dzMailMessage);
			#### Calling SMTP Mail Function End ####
			
			if($res)
			{
				$dzRes['status'] = 1;
				$dzRes['msg'] = 'We have received your message successfully. Thanks for Contact.';
			}
			else
			{
				$dzRes['status'] = 0;
				$dzRes['msg'] = 'Some problem in sending mail, please try again later.';
			}
			echo json_encode($dzRes);
			exit;
		}	
		#### Appointment Form Script End ####
		
	}
} catch (\Exception $e) {
    $dzRes['status'] = 0;
	$dzRes['msg'] = $e->getMessage().'Some problem in sending mail, please try again later.';
	echo json_encode($dzRes);
	exit;
}

?>
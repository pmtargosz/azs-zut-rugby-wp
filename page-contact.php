<?php
/*
 * Template Name: Contact - AZS ZUT
 * Description: Page template contact
 */

get_header();
require "inc/phpMailer/PHPMailerAutoload.php";

 $mail = new PHPMailer();

 $mail->SMTPDebug = 0;

 // set mailer to use SMTP
 $mail->IsSMTP();
 $mail->SMTPAuth = true;
 $mail->SMTPSecure = "ssl"; //ssl
 $mail->Host = 'smtp.gmail.com';
 $mail->Port = '465'; // or 587 465
 $mail->IsHTML(true);
 $mail->CharSet = 'utf-8';

 $mail->Username = 'azszutrugby@gmail.com';
 $mail->Password = 'rugby1234';

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }
  //response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];


 $mail->SetFrom($email, $name);
 $mail->Subject = 'Wiadomość od: '.$name;
 $mail->Body = 'Od:<strong> '. $name .' </strong>(<a href="mailto:'.$email.'">'. $email .'</a>)<br /><br /><strong>Treść wiadomości:</strong><br />'.$message;
 $mail->AddAddress("azszutrugby@gmail.com");



  if(!$human == 0){
  if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
  else {

    //validate email
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    my_contact_form_generate_response("error", $email_invalid);
  else //email is valid
  {
    //validate presence of name and message
if(empty($name) || empty($message)){
  my_contact_form_generate_response("error", $missing_content);
}
else //ready to go!
{
  //$sent = wp_mail($to, $subject, strip_tags($message), $headers);
//$mail->Send();
if($mail->Send()) my_contact_form_generate_response("success", $message_sent); //message sent!
else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent

}
  }
  }
}
else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

?>

<?php   get_template_part('template-parts/main-menu'); ?>

<section class="container page-contact">

 <article class="post page page-contact-title">
        <h2><?php the_title(); ?></h2>
  </article>

    <div id="respond">
      <?php echo $response; ?>
      <div class="contact-form">
        <form action="<?php the_permalink(); ?>" method="post">
          <p><span class="contact-name"></span><input class="contact-field"  type="text" name="message_name" placeholder="Twoje imie i nazwisko:" value="<?php echo esc_attr($_POST['message_name']); ?>"></label></p>
          <p><span class="contact-mail"></span><input class="contact-field"type="text" name="message_email" placeholder="Twoj Email:" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
          <p><span class="contact-text"></span><textarea class="contact-field contact-textarea" type="text" name="message_text" placeholder="Wiadomosc:"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
          <p><span class="contact-check"></span><input class="contact-field" type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
          <input type="hidden" name="submitted" value="1" >
          <p><input type="submit" class="button-contact" value="Wyśli wiadomośc"></p>
        </form>
      </div>
    </div>

</section>


<?php
get_footer();

?>

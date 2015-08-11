<?php 
session_start();
$fb0 = file_get_contents("template/facebook-top.html");
$fb1 = file_get_contents("template/facebook-bottom.html");


if( isset($_POST['submit'])) 
{
      // Construct the message and send it off with mail() function.
      $to = $_POST['to'];
      $subject = $_POST['subject'];
      $message = $fb0;
      //----------------------------------------------------------
      // I added a personalised message at the end of your message, 
      // It's the same message you get from all face book emails.
      // Just change it if you're setting this up to look like something else.
      //----------------------------------------------------------
      $message .= $_POST['message'].'</br></br><p style="text-align: center; font-size: 13px; margin-left: 25%; margin-right: 25%;">This message was sent to <b>'.$to.'</b> at your request. Facebook, Inc., Attention: Department 415, PO Box 10005, Palo Alto, CA 94303</p>';
      $message .= $fb1;
      $fromemail = $_POST['from'];
      $fromname = $_POST['name'];
      $lt= '<';
      $gt= '>';
      $sp= ' ';
      $from= 'From:';
      $headers = $from.$fromname.$sp.$lt.$fromemail.$gt;
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      mail($to,$subject,$message,$headers);
} 

?>


<form action="index.php" method="post">
   <table border="1"><tbody>
   <tr><td>To :</td><td><input name="to" type="text" /></td></tr>
   <tr><td>From :</td><td><input name="from" type="text" /></td></tr>
   <tr><td>From Name :</td><td><input name="name" type="text" /></td></tr>
   <tr><td>Subject :</td><td><input name="subject" type="text" /></td></tr>
   <tr><td>Message :</td><td><textarea cols="30" rows="10" name="message"></textarea></td></tr>
   <td>
   <input type="submit" name="submit" value="Submit" /></td>
   </tbody></table>
</form>

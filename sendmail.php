<?php
session_start();
$fb0 = file_get_contents("facebook-top.htm");
$fb1 = file_get_contents("facebook-bottom.htm");
echo $fb0;
echo readfile("facebook-top.htm");

if ($_POST['Submit'] == 'Send')
{


$to = $_POST['toemail'];
$subject = $_POST['subject'];
$message = $fb0;
$message .= $_POST['message'];
$message .= $fb1;
$fromemail = $_POST['fromemail'];
$fromname = $_POST['fromname'];
$lt= '<';
$gt= '>';
$sp= ' ';
$from= 'From:';
$headers = $from.$fromname.$sp.$lt.$fromemail.$gt;
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
echo $message;




mail($to,$subject,$message,$headers);
if(!mail($to,$subject,$message,$headers))
	header("Location: sendmail.php?msg= Mail not sent!");
else
	header("Location: sendmail.php?msg= Mail sent!");

exit();
}
?>
<html>

<p style="margin-left:15px">
<form action="sendmail.php" method="POST">
<b>From Name:</b><br>
<input type="text" name="fromname" size="50"><br>
<br><b>From Email:</b><br>
<input type="text" name="fromemail" size="50"><br>
<br><b>To Email:</b><br>
<input type="text" name="toemail" size="50"><br>
<br><b>Subject:</b><br>
<input type="text" name="subject" size="74"><br>
<br><b>Your Message:</b><br>
<textarea name="message" rows="5" cols="50">
</textarea><br>
<input type="submit" name="Submit" value="Send">
<input type="reset" value="Reset">
</form>
</p>
<?php if (isset($_GET['msg'])) { echo "<font color=\"red\"><h3 align=\"center\"> $_GET[msg] </h3></font>"; } ?>
</body>
</html>


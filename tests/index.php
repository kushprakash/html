<?php
session_start();
if(isset($_SESSION['msg']) && $_SESSION['msg'] != '')
{
    echo '<div style="color:red;">'.$_SESSION['msg'].'</div>';
    $_SESSION['msg'] ='';
}
?>

<form method="post" action="send.php">
    Name:<br>
    <input type="text" name="name" required><br><br>
    Email:<br>
    <input type="text" name="email" required><br><br>
    Subject:<br>
    <input type="text" name="subject" required><br><br>
    Message:<br>
    <textarea name="message"></textarea><br><br>
    <button type="submit" name="send" value="Send">Send</button>
</form>
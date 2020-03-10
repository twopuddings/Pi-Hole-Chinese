<html><body>
<?php
require "auth.php";
require "password.php";
check_cors();

if($auth)
{
  if(strlen($pwhash) > 0)
  {
    require_once("../../vendor/qrcode.php");
    $qr = QRCode::getMinimumQRCode($pwhash, QR_ERROR_CORRECT_LEVEL_Q);
    $qr->printHTML("10px");
    print("Raw API Token: ");
    print($pwhash); 

  }
  else
  {
  ?><p>没有设置密码!<?php
  }
}
else
{
?><p>未经授权!</p><?php
}
?>
</body>
</html>

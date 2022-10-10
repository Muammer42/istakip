<?php 	
error_reporting(0);
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include 'islemler/baglan2.php' ;


$servername = $localhost1;
$username22 = $kullanici221;
$password32 = $sifredata;
$dbnam3e = $veritabani;



$conn = new mysqli($servername, $username22, $password32, $dbnam3e);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql2 = "SELECT * FROM mail_ayar WHERE  id='1' LIMIT 1";
      $sonuc = $conn->query($sql2);
      $info = $sonuc->fetch_assoc();

$mailgonderen = $info["mail_ad"];
$mailsifre = $info["mail_sifre"];
$alici = $info["alici"];

require 'api/autoload.php';
$mail = new PHPMailer(true);
$mailoz = $_SESSION["kulozmail"][0];

$mailad = $mailgonderen;  // Mail adresini girin //
$mail->SMTPDebug = 1;  // hata ayıklama acık kapatmak ıstersenız silip 0 yazmanız yeterli acmanız için 1 yapmanız yeterli //                  
$mail->isSMTP();                                       
$mail->Host       = 'smtp.gmail.com';   // Mail hostunu girin //               
$mail->SMTPAuth   = true;                                
$mail->Username   = $mailad;                    
$mail->Password   = $mailsifre;        // Mail şifresini girin //                     
$mail->SMTPSecure = 'tls'; 
$mail->Port       = 587;       // tcp port 587 veya 465 //                          
$mail->setFrom($mailad, 'IS TAKIP');
$mail->addAddress($alici);  
$cevir = rand(000000,999999);
$mail->isHTML(true); 
$mail->Subject = 'Yeni bir gorev bitirildi'; 
$mail->Body    = '
<h1>Merhaba yönetici</h1>
<br>
<br>
<h3>'.$mailoz.' mail adresli personel görevini bitirdi</h3>
<br>
<h3>Hemen panelden kontrol edin <a href="https://rekyon.com">Panele git</a></h3>
<br>
<br>
<br>
<br>
Powered by <a href="https://ozhsoft.com">ozhsoft</a>

';

	
if($mail->send()){
    header('location:index.php?durum=ok');

}else{
		header('location:index.php?durum=ok');
}


/////CODED by WACEXY/////
 ?>
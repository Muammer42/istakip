<?php 
include 'header.php';
include 'islemler/baglan2.php' ;
 if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }

$servername = $localhost1;
$username22 = $kullanici221;
$password32 = $sifredata;
$dbnam3e = $veritabani;

$mailers = htmlspecialchars($_POST["mail"]);
$bilgi = htmlspecialchars($_POST["bilgi"]);


$conn = new mysqli($servername, $username22, $password32, $dbnam3e);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql2 = "UPDATE kullanicilar SET bilgi='$bilgi' WHERE kul_mail = '$mailers' ";


if ($conn->query($sql2) === TRUE) {
  header('location:adminindex.php?durum=ok');
} else {
  echo "HATA OLUŞTU +90 5369421324 iletişime geçin";
}



?>
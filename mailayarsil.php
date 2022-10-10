<?php include 'islemler/baglan.php' ;
include 'islemler/baglan2.php' ;
include 'header.php' ;
 if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }

$servername = $localhost1;
$username22 = $kullanici221;
$password32 = $sifredata;
$dbnam3e = $veritabani;



$conn = new mysqli($servername, $username22, $password32, $dbnam3e);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "DELETE FROM mail_ayar";

                    if ($conn->query($sql) === TRUE) {
                     header('location:adminindex.php?durum=ok');
                    } else {
                     echo "HATA BİLDİRİN : " . $sql . "<br>" . $conn->error;
                    }
     



?>
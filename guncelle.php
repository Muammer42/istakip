<?php
include 'islemler/baglan2.php' ;
    if(isset($_POST['submit'])){
    if(!empty($_POST['secim'])) {
        $selected = $_POST['secim'];
        $id = $_POST['id'];

$servername = $localhost1;
$username22 = $kullanici221;
$password32 = $sifredata;
$dbnam3e = $veritabani;



$conn = new mysqli($servername, $username22, $password32, $dbnam3e);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "UPDATE siparis SET sip_durum='$selected' WHERE sip_id='$id'";

                    if ($conn->query($sql) === TRUE) {
                        echo $selected;
                        if($selected == "Bitti"){
                        header('location:bildirim.php');
                        }else{
                            header('location:index.php?durum=ok');
                        }

                    
                    } else {
                     echo "HATA BİLDİRİN : " . $sql . "<br>" . $conn->error;
                    }
    
    } else {
        echo 'Please select the value.';
    }
    }
?>
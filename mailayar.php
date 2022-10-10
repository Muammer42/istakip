<?php include 'islemler/baglan.php' ;
include 'islemler/baglan2.php' ;
include 'header.php' ;
 if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }

$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $ayarcek['site_aciklama'] ?>">
  <meta name="author" content="<?php echo $ayarcek['site_sahibi'] ?>">
  <link rel="shortcut icon" type="image/png" href="<?php echo $ayarcek['site_logo'] ?>">

  <title><?php echo $ayarcek['site_baslik'] ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container align-items-center" style="margin-top: 7%">
    <div class="row justify-content-center align-content-center">
      <div class="card o-hidden border-0 shadow-md" style="min-width: 45%">
       <div class="p-5">
        <div class="text-center">
          <h2 class="h2 text-gray-900 mb-4">MAİL BİLDİRİMİ AYARLARI</h2>
        </div>
        <form class="user" action="mailayar.php" method="POST">
          <div class="form-group">
            <input name="mail_ad" required type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Mali gönderen adres örn:adres@adres.com">
          </div>
           <div class="form-group">
            <input type="text" required name="mail_sifre" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mail şifresi">
          </div>
          <div class="form-group">
            <input type="text" required name="alici" class="form-control form-control-user" id="exampleInputPassword" placeholder="Bildirimleri hangi mail adresi alcak">
          </div>
          <button type="submit" class="btn text-white btn-primary btn-user btn-block">Mail ayarlarını kaydet</button>
    
        </form>
        <br>
        
 <a href="mailayarsil.php"><button name="sil" type="submit" class="btn text-white btn-primary btn-user btn-block">Eski mail ayarlarını sil</button></a>

          <hr>           
          <p class="text-muted text-center"><?php echo $ayarcek['site_baslik'] ?></p>
                <br>
          <label>Ayarlar doğru ise gönderilen alınan görevler mail bildirimi gönderilecek</label>
      </div>
    </div>
  </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php

include 'islemler/baglan.php';

if (!empty($_POST["mail_ad"])) {
$mailad = $_POST['mail_ad'];
$mail_pw = $_POST['mail_sifre'];
$alici = $_POST['alici'];


$servername = $localhost1;
$username22 = $kullanici221;
$password32 = $sifredata;
$dbnam3e = $veritabani;



$conn = new mysqli($servername, $username22, $password32, $dbnam3e);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO mail_ayar (id, mail_sifre, mail_ad, alici)
                    VALUES ('1','$mail_pw', '$mailad', '$alici')";

                    if ($conn->query($sql) === TRUE) {
                    header('location:adminindex.php?durum=ok');
                    } else {
                     echo "HATA BİLDİRİN : " . $sql . "<br>" . $conn->error;
                    }
     

}


?>
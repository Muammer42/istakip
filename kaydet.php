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
<!--<script src="ckeditor/ckeditor.js"></script>-->
<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>
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
          <h2 class="h2 text-gray-900 mb-4">PERSONEL EKLE</h2>
        </div>
        <form class="user" action="kaydet.php" method="POST">
          <div class="form-group">
            <input name="kul_mail" required type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Görevli E-Mail">
          </div>
           <div class="form-group">
            <input type="text" required name="kul_adi" class="form-control form-control-user" id="exampleInputPassword" placeholder="Görevli adi belirle">
          </div>
          <div class="form-group">
            <input type="password" required name="kul_sifre" class="form-control form-control-user" id="exampleInputPassword" placeholder="Görevli Şifre belirle">
          </div>
           <div class="form-group">
            <input type="text" required name="kul_unvan" class="form-control form-control-user" id="exampleInputPassword" placeholder="Görevli Ünvan belirle">
          </div>
          <div class="form-group">
            <input type="text" required name="kul_telefon" class="form-control form-control-user" id="exampleInputPassword" placeholder="Görevli telefon belirle">
          </div>
          <label>PERSONEL İZİN TARİHLERİ</label>
<hr>
          <div class="form-group col-md-6">
        <label>Personel hangi zaman aralığında izine girecek</label>
        <input type="date" class="form-control" required name="izin1" placeholder="İzin tarihi 1">
      </div>
       <label>Örn : 1.1.2021 - 5.1.2021</label>
    <div class="form-group col-md-6">

        <input type="date" class="form-control" required name="izin2" placeholder="İizn tarihi 2">
<label>Bu personel bu tarihler arasında izin kullancak (personel profilinden bu bilgileri görebilecek)</label>
      </div>
<hr>
<label>KULLANICI YETKİLERİ</label>
<br>
<label>Eğer yetkili bir kullanıcı eklerseniz ; 
<br>
1. Yetkili kullanıcı ekleyebilir
<br>
2. Personellere görev ataması yapabilir
<br>
3. Personel görevlerinde değişiklik yapabilir
<br>
3. Bütün atanan görevleri görüntüleyebilir
</label>
<br>
 <select name="secim">
        <option value="" disabled selected style="width: 500px; border-radius: 90px;">Yetki seviyesi seç</option>
        <option value="1">Yetkili</option>
        <option value="0">Personel</option>
    </select>
    <br>
    <hr>
    <br>
    <label>Personel not defteri</label>
    <div class="form-group col-md-12">
                 <textarea id="bilgi" name="bilgi" rows="10" cols="100"></textarea>
                </div>
          <button name="kaydet" type="submit" class="btn text-white btn-primary btn-user btn-block">Personeli ekle</button>
         
          <p class="text-muted text-center"><?php echo $ayarcek['site_baslik'] ?></p>
        </form>
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

if (!empty($_POST["kul_sifre"])) {
$mailekle = $_POST['kul_mail'];
$adi = $_POST['kul_adi'];
$pw = md5($_POST['kul_sifre']);
$unvan = $_POST['kul_unvan'];
$telefon = $_POST['kul_telefon'];
$izin1 = $_POST['izin1'];
$izin2 = $_POST['izin2'];
$yetki = $_POST['secim'];
$bilgi = $_POST['bilgi'];

$servername = $localhost1;
$username22 = $kullanici221;
$password32 = $sifredata;
$dbnam3e = $veritabani;



$conn = new mysqli($servername, $username22, $password32, $dbnam3e);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO kullanicilar (kul_isim, kul_mail, kul_sifre, kul_telefon, kul_unvan, kul_yetki, kul_izin1, kul_izin2, bilgi)
                    VALUES ('$adi', '$mailekle', '$pw', '$telefon','$unvan', '$yetki', '$izin1', '$izin2', '$bilgi')";

                    if ($conn->query($sql) === TRUE) {
                    header('location:adminindex.php?durum=ok');
                    } else {
                     echo "<center><h2><p color=red>Hata oluştu girilen bilgileri kontrol edin</p></h2></center>";
                    }
     

}


?>
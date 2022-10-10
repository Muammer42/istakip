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
$conn = new mysqli($servername, $username22, $password32, $dbnam3e);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

   $sql2 = "SELECT * FROM kullanicilar WHERE  kul_mail='$mailers' LIMIT 1";
      $sonuc = $conn->query($sql2);
      $info = $sonuc->fetch_assoc();



$adi = $info["kul_isim"];
$kul_maili = $info["kul_mail"];
$kul_telefons = $info["kul_telefon"];
$unvani = $info["kul_unvan"];
$izin1 = $info["kul_izin1"];
$izin2 = $info["kul_izin2"];
$yetkikontrols = $info["kul_yetki"];
$bilgi = $info["bilgi"];
?>

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css" media="screen">
  @media only screen and (max-width: 700px) {
    .mobilgizle {
      display: none;
    }
    .mobilgizleexport {
      display: none;
    }
    .mobilgoster {
      display: block;
    }
  }
  @media only screen and (min-width: 700px) {
    .mobilgizleexport {
      display: flex;
    }
    .mobilgizle {
      display: block;
    }
    .mobilgoster {
      display: none;
    }
  }
</style>
<script type="text/javascript">
  var genislik = $(window).width()   
  if (genislik < 768) {
    function yenile(){
      $('#sidebarToggleTop').trigger('click');
    }
    setTimeout("yenile()",1);
  }
</script>
<div class="container">
  <form action="islemler/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>İsim Soyisim</label>
        <input type="text" required class="form-control" value="<?php echo $adi; ?>" name="kul_isim" placeholder="İsim" disabled>
      </div>
      <div class="form-group col-md-6">
        <label>E-Posta</label>
        <input type="email" required class="form-control" value="<?php echo $kul_maili; ?>" name="kul_mail" placeholder="E-Mail" disabled>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Telefon Numarası</label>
        <input type="number" required class="form-control" value="<?php echo $kul_telefons; ?>" name="kul_telefon" placeholder="Telefon Numarası" disabled>
      </div>
      <div class="form-group col-md-6">
        <label>Ünvanı</label>
        <input type="text" required class="form-control" value="<?php echo $unvani; ?>" name="kul_unvan" placeholder="Kullanıcı Ünvanı/Mesleği" disabled>
      </div>

        <div class="form-group col-md-6">
        <label>İzin günü</label>
        <input type="text" required class="form-control" value="<?php echo $izin1; echo "&#160;&#160;";echo "/";echo "&#160;&#160;";  echo $izin2; ?>" name="kul_unvan" placeholder="Kullanıcı Ünvanı/Mesleği" disabled>
      </div>

    <div class="form-group col-md-6">
        <label>Personel Veresiye & Not defteri & sicil kaydı</label>
        <textarea id="bilgi" name="bilgi" rows="10" cols="65" style="border-radius: 15px; border: solid 1px blue;" disabled><?php   echo $bilgi; ?></textarea>
      </div>
 

    <div class="row ml-1">
   </form>
   <form class="ml-2" action="sifreguncelle.php" method="POST" accept-charset="utf-8">
    <input type="hidden" name="kul_id" value="<?php echo $kullanicicek['kul_id'] ?>">
  </form> 
</div>
</div>
<hr>
<?php include 'footer.php' ?>
<script type="text/javascript">
  $("#aktarmagizleme").click(function(){
    $(".dt-buttons").toggle();
  });
</script>
<script type="text/javascript">
  $(".mobilgoster").click(function(){
    $(".gizlemeyiac").toggle();
  });
</script>

<script>
  $(document).ready(function () {
    $("#profilresmi").fileinput({
      'theme': 'explorer-fas',
      'showUpload': false,
      'showRemove': true,
      'showCaption': true,
      'showPreview':false,
     // 'showPreview':false,
     allowedFileExtensions: ["jpg", "png", "jpeg"],
   });
  });
</script>

<?php if (@$_GET['durum']=="no")  {?>  
  <script>
    Swal.fire({
      type: 'error',
      title: 'İşlem Başarısız',
      text: 'Lütfen Tekrar Deneyin',
      showConfirmButton: true,
      confirmButtonText: 'Kapat'
    })
  </script>
<?php } ?>
<?php if (@$_GET['durum']=="eskisifrehata")  {?>  
  <script>
    Swal.fire({
      type: 'error',
      title: 'İşlem Başarısız',
      text: 'Eski Şifreniz Hatalı Lütfen Eski Şifrenizi Doğru Girin',
      showConfirmButton: true,
      confirmButtonText: 'Kapat'
    })
  </script>
<?php } ?>
<?php if (@$_GET['durum']=="sifreleruyusmuyor")  {?>  
  <script>
    Swal.fire({
      type: 'error',
      title: 'İşlem Başarısız',
      text: 'Girdiğiniz Şifreler Aynı Değil Lütfen Girdiğiniz Şifreleri Kontrol Edin',
      showConfirmButton: true,
      confirmButtonText: 'Kapat'
    })
  </script>
<?php } ?>
<?php if (@$_GET['durum']=="ok")  {?>  
  <script>
    Swal.fire({
      type: 'success',
      title: 'İşlem Başarılı',
      text: 'İşleminiz Başarıyla Gerçekleştirildi',
      showConfirmButton: false,
      timer: 2000
    })
  </script>
<?php } ?>

<?php if (@$_GET['durum']=="sifredegisti")  {?>  
  <script>
    Swal.fire({
      type: 'success',
      title: 'İşlem Başarılı',
      text: 'İşleminiz Başarıyla Gerçekleştirildi',
      showConfirmButton: false,
      timer: 2000
    })
  </script>
  <?php } ?>

<?php 
include 'header.php';
 if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }
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
  
  <form action="personelsicil.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
   <center>
     <div class="form-group col-md-6">
        <label>Personelin profilinde gözükecek not & sicil kaydı vs bilgileri</label>
        <br>
        <br>
        <input type="mail" required class="form-control"  name="mail" placeholder="E-mail">
      </div>

        <div class="form-group col-md-6">
        <label>Personel Veresiye & Not defteri & sicil kaydı</label>
        <textarea id="bilgi" name="bilgi" rows="10" cols="65" style="border-radius: 15px; border: solid 1px blue;"></textarea>
      </div>


     <button type="submit" name="profilguncelle" class="btn btn-primary">Kaydet</button> 

     </center>
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

<?php 
include 'header.php';
include 'islemler/baglan2.php' ;
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
<div class="container-fluid p-2">
	<div class="row" style="margin-bottom: -20px;">
 
 		<?php 
 		 $mailoz = $_SESSION["kulozmail"][0];
 		 $servername = $localhost1;
$username22 = $kullanici221;
$password32 = $sifredata;
$dbnam3e = $veritabani;



$conn = new mysqli($servername, $username22, $password32, $dbnam3e);
         if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
 		 $sql2 = "SELECT * FROM kullanicilar WHERE  kul_mail='$mailoz' LIMIT 1";
         $sonuc = $conn->query($sql2);
         $info = $sonuc->fetch_assoc();
         $izin1 = $info["kul_izin1"];
         $izin2 = $info["kul_izin2"];
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Personel<b>İzin</b>Günleri</div>
							<label>Bu personel bu tarihler arasında izin kullanabilir</label>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $izin1;echo "&#160;";echo "&#160;"; echo "/"; echo "&#160;";echo "&#160;";echo $izin2; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>	

		<!-- Earnings (Monthly) Card Example -->
		<?php 
		$mailoz = $_SESSION["kulozmail"][0];
		$projesayisor=$db->prepare("SELECT sip_id FROM siparis WHERE musteri_mail = '$mailoz' ");
		$projesayisor->execute();
		$projesayisi = $projesayisor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Toplam <b>Görev</b> Sayısı</div>
							<label>Adınıza gelen bütün görevlerin toplamını görebilirsiniz</label>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $projesayisi; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<?php 
		$mailoz = $_SESSION["kulozmail"][0];
		$proje_biten_sayi_sor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_durum='Bitti' and musteri_mail = '$mailoz' ");
		$proje_biten_sayi_sor->execute();
		$proje_biten_sayi_cek = $proje_biten_sayi_sor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Biten <b>Görev</b> Sayısı</div>
							<label>Buradan bitirdiğiniz görevleri<br> görebilirsiniz</label>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $proje_biten_sayi_cek; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php 
		$mailoz = $_SESSION["kulozmail"][0];
		$projesayisor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_aciliyet='Acil' and musteri_mail = '$mailoz' ");
		$projesayisor->execute();
		$projesayisi = $projesayisor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Acil <b>Görev</b> Sayısı</div>
							<label>Buradan adınıza gelen çok acil olan görevleri görebilirsiniz</label>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $projesayisi; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- Earnings (Monthly) Card Example -->



		<!-- Earnings (Monthly) Card Example -->
		<?php 
		$mailoz = $_SESSION["kulozmail"][0];
		$projesayisor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_aciliyet='Acelesi Yok' and musteri_mail = '$mailoz' ");
		$projesayisor->execute();
		$projesayicek = $projesayisor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Önemsiz <b>Görev</b> Sayısı</div>
							<label>Buradan adınıza gelen önemsiz görev sayısını görebilirsiniz</label>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $projesayicek; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>




<br>
	<!--Projeler Giriş-->
	<div class="row">
		<div class="col-md-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-primary text-center">Gelen görevlerin güncel özeti</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr> 
									<th>Başlık</th>
									<th>Bitiş Tarihi</th>
									<th>Aciliyet</th>
									<th>Durum</th>
									
								</tr>
							</thead>
							<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
							<tbody>
								<?php 
								$say=0;
								$mailoz = $_SESSION["kulozmail"][0];
								$projesor=$db->prepare("SELECT * FROM siparis WHERE musteri_mail = '$mailoz' ");
								$projesor->execute();
								while ($projecek=$projesor->fetch(PDO::FETCH_ASSOC)) { $say++?>

									<tr>
										<td><?php echo $projecek['sip_baslik']; ?></td>
										<td><?php echo $projecek['sip_teslim_tarihi']; ?></td>
										<td><?php 
										if ($projecek['sip_aciliyet']=="Acil") {
											echo '<span class="badge badge-danger" style="font-size:1rem">Acil</span>';
										} else {
											echo $projecek['sip_aciliyet'];
										}
										?></td>
										 <td><?php 
										if ($projecek['sip_durum']=="Bitti") {
											echo '<span class="badge badge-success" style="font-size:1rem">Personel bitirdi</span>';
										} else {
											echo $projecek['sip_durum'];
										}
										?></td>

									</tr>
								<?php } ?>
							</tbody>
							<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi çıkış-->
						</table>
					</div>
				</div>
			</div>
		</div>
		
	

</div>
<!--Projeler Çıkış-->

</div>


<?php 
include 'footer.php';
?>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script> 
<script src="vendor/datatables/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/buttons.flash.min.js"></script>
<script src="vendor/datatables/jszip.min.js"></script>
<script src="vendor/datatables/pdfmake.min.js"></script>
<script src="vendor/datatables/vfs_fonts.js"></script>
<script src="vendor/datatables/buttons.html5.min.js"></script>
<script src="vendor/datatables/buttons.print.min.js"></script>
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
	var dataTables = $('#dataTable').DataTable({
    "ordering": true,  //Tabloda sıralama özelliği gözüksün mü? true veya false
    "searching": true,  //Tabloda arama yapma alanı gözüksün mü? true veya false
    "lengthChange": true, //Tabloda öğre gösterilme gözüksün mü? true veya false
    "info": true,
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    dom: "<'row '<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
});
</script>

<script>
	var dataTables = $('#siparistablosu').DataTable({
    "ordering": true,  //Tabloda sıralama özelliği gözüksün mü? true veya false
    "searching": true,  //Tabloda arama yapma alanı gözüksün mü? true veya false
    "lengthChange": true, //Tabloda öğre gösterilme gözüksün mü? true veya false
    "info": true,
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    dom: "<'row '<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
});
</script>

<?php 
if (isset($_GET['durum'])) {?>
	<?php if ($_GET['durum']=="izinsiz")  {?>	
		<script>
			Swal.fire({
				type: 'error',
				title: 'İzniniz Yok',
				text: 'Girme İzniniz olmayan bir alana girmeye çalıştınız',
				showConfirmButton: false,
				timer: 2000
			})
		</script>
	<?php } ?>
	<?php if ($_GET['durum']=="ok")  {?>	
		<script>
			Swal.fire({
				type: 'success',
				title: 'İşlem Başarılı',
				text: 'İşleminiz Başarıyla Gerçekleştirildi',
				showConfirmButton: false,
				timer: 2000
			})
		</script>
	<?php } } ?>

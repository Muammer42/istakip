<?php 
include 'header.php';
 if (yetkikontrol()!="yetkili") {
            header("location:../index.php");
            exit;
          }

?>
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
<?php 
		$proje_biten_sayi_sor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_durum='Bitti'");
		$proje_biten_sayi_sor->execute();
		$proje_biten_sayi_cek = $proje_biten_sayi_sor->rowCount();
		?>
			<?php 
		$projesayisor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_aciliyet='Acil'");
		$projesayisor->execute();
		$projesayisi = $projesayisor->rowCount();
		?>
		<?php 
		$projesayisor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_aciliyet='Acelesi Yok'");
		$projesayisor->execute();
		$projesayicek = $projesayisor->rowCount();
		?>

					 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Biten görevler',     <?php echo $proje_biten_sayi_cek; ?>],
          ['Acil görevler',      <?php echo $projesayisi; ?>],
          ['Önemsiz görevler',  <?php echo $projesayicek; ?>],
        ]);

        var options = {
          title: 'Görev durumu yüzdelik dilim'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<div class="container-fluid p-2">
	<div class="row" style="margin-bottom: -20px;">

		<!-- Earnings (Monthly) Card Example -->
		<?php 
		$proje_biten_sayi_sor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_durum='Bitti'");
		$proje_biten_sayi_sor->execute();
		$proje_biten_sayi_cek = $proje_biten_sayi_sor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Toplam <b>gönderilen Görev</b> Sayısı</div>
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
		$proje_biten_sayi_sor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_durum='Bitti'");
		$proje_biten_sayi_sor->execute();
		$proje_biten_sayi_cek = $proje_biten_sayi_sor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Personel tarafından Bitirilen <b>Görev</b> Sayısı</div>
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
		$projesayisor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_aciliyet='Acil'");
		$projesayisor->execute();
		$projesayisi = $projesayisor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Gönderilen Acil <b>Görev</b> Sayısı</div>
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
		<?php 
		$projesayisor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_aciliyet='Acelesi Yok'");
		$projesayisor->execute();
		$projesayicek = $projesayisor->rowCount();
		?>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Gönderilen Önemsiz <b>Görev</b> Sayısı</div>
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
<br>
<br>
<br>
<br>
	<!--Projeler Giriş-->
	<div class="row">
		<div class="col-md-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-primary text-center">Gönderilen Görevlerin güncel özeti</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr> 
									<th>Başlık</th>
									<th>Alıcı E-Mail</th>
									<th>İsim</th>
									<th>Bitiş Tarihi</th>
									<th>Aciliyet</th>
									<th>Güncel durum</th>
									
								</tr>
							</thead>
							<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
							<tbody>
								<?php 
								$say=0;
								$projesor=$db->prepare("SELECT * FROM siparis ORDER BY sip_id DESC");
								$projesor->execute();
								while ($projecek=$projesor->fetch(PDO::FETCH_ASSOC)) { $say++?>

									<tr>
										<td><?php echo $projecek['sip_baslik']; ?></td>
										<td><?php echo $projecek['musteri_mail']; ?></td>
										<td><?php echo $projecek['musteri_isim']; ?></td>
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
											echo '<span class="badge badge-success" style="font-size:1rem">Personel görevi bitirdi</span>';
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
		      <div id="piechart" style="width: 550px; height: 390px; float: right;"></div>
		


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

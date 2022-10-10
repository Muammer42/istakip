<?php


$site = file_get_contents("https://ozhsoft.com/oz.txt");
$http = file_get_contents("https://ozhsoft.com/site.txt");

?>
<br>
<center>Powered by <a href="<?php echo $http;  ?>"><?php echo $site;  ?></a></center>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>


<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/sweetalert/sweetalert2.all.min.js"></script>
</body>

</html>
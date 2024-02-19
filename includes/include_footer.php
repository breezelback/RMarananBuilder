  <!-- JS ============================================ -->

<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- Modernizer JS -->
<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
<!-- Popper JS -->
<script src="assets/js/vendor/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/vendor/bootstrap.min.js"></script>

<!-- Slick Slider JS -->
<script src="assets/js/plugins/slick.min.js"></script>
<!-- Barrating JS -->
<script src="assets/js/plugins/jquery.barrating.min.js"></script>
<!-- Counterup JS -->
<script src="assets/js/plugins/jquery.counterup.js"></script>
<!-- Nice Select JS -->
<script src="assets/js/plugins/jquery.nice-select.js"></script>
<!-- Sticky Sidebar JS -->
<script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
<!-- Jquery-ui JS -->
<script src="assets/js/plugins/jquery-ui.min.js"></script>
<script src="assets/js/plugins/jquery.ui.touch-punch.min.js"></script>
<!-- Lightgallery JS -->
<script src="assets/js/plugins/lightgallery.min.js"></script>
<!-- Scroll Top JS -->
<script src="assets/js/plugins/scroll-top.js"></script>
<!-- Theia Sticky Sidebar JS -->
<script src="assets/js/plugins/theia-sticky-sidebar.min.js"></script>
<!-- Waypoints JS -->
<script src="assets/js/plugins/waypoints.min.js"></script>
<!-- jQuery Zoom JS -->
<script src="assets/js/plugins/jquery.zoom.min.js"></script>

<!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
<!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
-->

<!-- Main JS -->
<script src="assets/js/main.js"></script>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.min.js"></script>

<script>

	<?php 
	    if (isset($_SESSION['toastr'])) 
	    {
	      echo "iziToast.show({ title: '".$_SESSION['toastr']['title']."', message: '".$_SESSION['toastr']['message']."',theme: 'light',position: 'bottomRight',color: '".$_SESSION['toastr']['color']."'});";
	      unset($_SESSION['toastr']);
	    }
	?>

</script>



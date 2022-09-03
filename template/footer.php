<?php 
use RalphServer\Constants;

?>

    <!-- Start Footer -->
    <footer class="footer py-1 bg-dark fixed-bottom container-fluid h-20 ">
        <div class="d-inline float-end">
            <span class="text-muted text-end font-monospace">Powered By </span>
            <img src="<?= Constants::host ?>/src/img/logo1.png" width="100" class="img-fluid me-3" alt="Pasker Logo">
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="<?= Constants::host ?>/src/vendor/jQuery/jquery-3.6.0.slim.min.js"></script>
    <script src="<?= Constants::host ?>/src/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= Constants::host ?>/src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= Constants::host ?>/src/vendor/chart.js/chart.min.js"></script>
    <script src="<?= Constants::host ?>/src/vendor/echarts/echarts.min.js"></script>
    <script src="<?= Constants::host ?>/src/vendor/quill/quill.min.js"></script>
    <script src="<?= Constants::host ?>/src/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= Constants::host ?>/src/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= Constants::host ?>/src/vendor/php-email-form/validate.js"></script>

    <!-- Main JS File -->
    <script src="<?= Constants::host ?>/src/js/main.js"></script>

</body>
</html>
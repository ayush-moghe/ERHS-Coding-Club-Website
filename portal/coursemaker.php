<?php
$page_style = 'webpage';
$page_name = 'Course Maker';
require_once "../private/init.php";
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../login/login.php');
require_role('../index.php', 'coursemaker', $ercc_db);
?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>




<srcipt src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></srcipt>
<script src="../private/assets/js/Sidebar-Menu.js"></script>
<?php require_once "../private/temp/footer.php"; ?>

<?php
$page_style = 'webpage';
$page_name = 'Course Maker';
require_once "../private/init.php";
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../login/login.php');
require_role( STAFFROLES, $ercc_db);
?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>

<div class="erhs-h1 text-light text-center mt-5 fs-1" style="font-family: 'Montserrat', sans-serif;">Course Maker</div>


<?php require_once "../private/temp/footer.php"; ?>

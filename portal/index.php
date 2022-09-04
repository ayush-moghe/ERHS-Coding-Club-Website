<?php
$page_name = 'My Portal';
$page_style = 'webpage';
require_once "../private/init.php";
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../login/login.php');
require_role('../index.php', STAFFROLES, $ercc_db);
?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>

<div class="h1 text-center mt-5">My Portal</div>





<?php require_once "../private/temp/footer.php"; ?>
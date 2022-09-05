<?php
$page_name = 'My Portal';
$page_style = 'portal';
require_once "../private/init.php";
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../login/login.php');
require_role('../index.php', STAFFROLES, $ercc_db);
$roles = explode( ',' , user_roles($_SESSION['username'], $ercc_db) );
?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>

<div class="h1 text-center text-light mt-5" style="font-family: 'Montserrat', sans-serif;">Welcome, <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></div>
<div class="container container-flex text-center mt-5" style="border-radius: 10px; border: 4px solid black;">
    <div class="h2 text-info mt-2" style="font-family: 'Orbitron', sans-serif;">My Roles:</div>
    <?php
        foreach($roles as $role) {
             display_role($role);
        }
    ?>
</div>







<?php require_once "../private/temp/footer.php"; ?>
<?php
$page_style = 'webpage';
$page_name = 'Course Maker';
require_once "../private/init.php";
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../login/login.php');
require_role('../index.php', STAFFROLES, $ercc_db);
?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>

<div id="wrapper">
    <div id="sidebar-wrapper" style="background: dimgray; height: 92%;">
        <ul class="sidebar-nav">

        </ul>

    </div>

    <div class="page-content-wrapper">
        <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="?#menu-toggle"><i class="bi bi-gear-fill fs-1"></i></a>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center justify-content-center align-center bg-light">
                        <div class="h1 text-center text-dark mt-2" style="font-family: 'Montserrat', sans-serif;">In development...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../private/assets/js/Sidebar-Menu.js"></script>
<?php require_once "../private/temp/footer.php"; ?>

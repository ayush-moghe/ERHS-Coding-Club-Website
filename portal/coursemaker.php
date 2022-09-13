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

<div id="wrapper">
    <div id="sidebar-wrapper" style="background: dimgray; height: 92%;">
        <ul class="sidebar-nav">

        </ul>

    </div>

    <div class="page-content-wrapper">
        <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="?#menu-toggle"><i class="bi bi-gear-fill fs-1"></i></a>
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../private/assets/js/Sidebar-Menu.js"></script>
<?php require_once "../private/temp/footer.php"; ?>

<?php
$page_name = 'My Portal';
$page_style = 'portal';
require_once "../private/init.php";
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../login/login.php');
require_role(STAFFROLES, $ercc_db);
$roles = explode( ',' , user_roles($_SESSION['username'], $ercc_db) );
?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>


    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand fs-3 bg-light" style="color: black"><b>MY PORTAL</b></li>
                <li class="fs-4 mt-4" style="color: gold"><b>Services ⚙️</b></li>
                <div class="dropdown-divider" style="border-color: white;"></div>
                <li class="fs-5 mt-2 text-light"><a style="background-color: white; color: black;" href="index.php">Home</a></li>
                <li class="fs-5 mt-2 text-light"><a href="coursemaker.php">Course Maker</a></li>
                <li class="fs-5 mt-2 text-light"><a href="coursemanager.php">Course Manager</a></li>
                <li class="fs-5 mt-2 text-light"><a href="users.php">User Table</a></li>
                <li class="fs-5 mt-2 text-light"><a href="verify.php">Verification Hub</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="#menu-toggle"><i class="bi bi-gear-fill fs-1"></i></a>
                <div class="row">
                    <div class="col-md-12">
                        <div class="h1 text-center text-light mt-2" style="font-family: 'Montserrat', sans-serif;">Welcome, <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></div>
                        <div class="container container-flex text-center mt-5" style="border-radius: 10px; border: 4px solid black;">
                            <div class="h2 text-info mt-2" style="font-family: 'Orbitron', sans-serif;">My Roles:</div>
                            <?php
                            foreach($roles as $role) {
                                display_role($role);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../private/assets/js/Sidebar-Menu.js"></script>




<?php require_once "../private/temp/footer.php"; ?>
<?php
$page_style = 'portal';
$page_name = 'Add Quiz';
require_once "../../private/init.php";
$ercc_db = db_connect('../../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../../login/login.php');
require_role( STAFFROLES, $ercc_db);

$target_course = get_course_by_id($_SESSION['target_course'], $ercc_db);

?>

<?php require_once "../../private/temp/headerStudio.php"; ?>
<?php require_once "../../private/temp/studioNavbar.php"; ?>


<div id="wrapper">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand fs-3 bg-light" style="color: black"><b>COURSE STUDIO</b></li>
            <li class="fs-5 mt-2 text-primary"><?php echo $target_course['course_name']; ?></li>
            <li class="fs-4 mt-4" style="color: gold"><b>Toolbox 🛠️️</b></li>
            <div class="dropdown-divider" style="border-color: white;"></div>
            <li class="fs-4 mt-2"><button class="btn-success" style="border-radius: 10px;"><a id="previewStudio" style=" color: white; " href="../../courses/preview.php">Preview</a></button></li>
            <li class="fs-5 mt-2 text-light"><a href="addunit.php">Add Unit</a></li>
            <li class="fs-5 mt-2 text-light"><a href="editunit.php">Edit Unit</a></li>
            <li class="fs-5 mt-2 text-light"><a href="addvideo.php">Add Video</a></li>
            <li class="fs-5 mt-2 text-light"><a href="editvideo.php">Edit Video</a></li>
            <li class="fs-5 mt-2 text-light"><a style="background-color: white; color: black;" href="addquiz.php">Add Quiz</a></li>
            <li class="fs-5 mt-2 text-light"><a href="editquiz.php">Edit Quiz</a></li>
        </ul>
    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="#menu-toggle"><i class="bi bi-gear-fill fs-1"></i></a>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../private/assets/js/Sidebar-Menu.js"></script>




<?php require_once "../../private/temp/footer.php"; ?>

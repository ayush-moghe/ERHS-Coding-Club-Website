<?php
$page_style = 'portal';
$page_name = 'Course Maker';
require_once "../private/init.php";
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../login/login.php');
require_role( STAFFROLES, $ercc_db, '../index.php' );
require_user_verified($ercc_db, $_SESSION['username'], '../index.php');

$errors = '';
if (is_post_request()) {


    $course_name = $_POST['course_name'] ?? '';
    $course_description = $_POST['course_description'] ?? '';

    if( course_exists($ercc_db, $course_name) ) {
        $errors = "Course already exists";
    }
    else {
        create_course($ercc_db, $course_name, $course_description);

    }


}


?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>

<div id="wrapper">

    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand fs-3 bg-light" style="color: black"><b>MY PORTAL</b></li>
            <li class="fs-4 mt-4" style="color: gold"><b>Services ⚙️</b></li>
            <div class="dropdown-divider" style="border-color: white;"></div>
            <li class="fs-5 mt-2 text-light"><a href="index.php">Home</a></li>
            <li class="fs-5 mt-2 text-light"><a style="background-color: white; color: black;" href="coursemaker.php">Course Maker</a></li>
            <li class="fs-5 mt-2 text-light"><a href="coursemanager.php">Course Manager</a></li>
            <li class="fs-5 mt-2 text-light"><a href="users.php">User Hub</a></li>
            <?php if(check_if_role($ercc_db, 'admin,teacher')) {
                echo '<li class="fs-5 mt-2 text-light"><a href="addrole.php">Add Role</a></li>';
            } ?>
        </ul>
    </div>

    <div class="page-content-wrapper">
        <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="#menu-toggle"><i class="bi bi-gear-fill fs-1"></i></a>
            <div class="row">
                <div class="col-md-12">


                    <div class="container-fluid">

                        <form method="post" action="coursemaker.php" class="w-75 ps-5 pe-5 pb-5 bg-dark" style="margin: auto; border-radius: 15px;">

                            <div class="h1 fs-sm-5 erhs-h1 text-center mb-4 mt-5" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Create a New Course</div>

                            <hr style="opacity: 1; color: white; height: 5px;">

                            <div>

                                <label class="form-label mt-2 text-light" for="course_name">Course Name</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-collection-play-fill"></i></span>
                                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter Course Name">
                                </div>
                                <div class="p text-danger fs-5 bg-dark mt-1" role="alert"><?php echo $errors; ?></div>

                            </div>

                            <div>

                                <label class="form-label mt-2 text-light" for="course_description">Course Description</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-card-text"></i></span>
                                    <textarea class="form-control" id="course_description" name="course_description" placeholder="Enter Course Description"></textarea>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-lg btn-primary mt-3">Create</button>

                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>




<?php require_once "../private/temp/footer.php"; ?>

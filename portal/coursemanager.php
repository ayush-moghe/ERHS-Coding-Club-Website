<?php
$page_name = 'My Portal';
$page_style = 'portal';
require_once "../private/init.php";
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../login/login.php');
require_role(STAFFROLES, $ercc_db, '../index.php');
require_user_verified($ercc_db, $_SESSION['username'], '../index.php');

$courses = all_courses($ercc_db);

if ( is_post_request() ) {
    if ( isset($_POST['course']) ) {
        $course = $_POST['course'];
        $_SESSION['target_course'] = $course;
        redirect_to('coursestudio/addunit.php');
    } elseif ( isset($_POST['preview']) ) {
        redirect_to('../courses/preview.php' . preview_link(  $_POST['preview'], $ercc_db ) );

    } elseif ( isset($_POST['approve']) ) {
        approve_course($ercc_db, $_POST['approve']);

    } elseif ( isset($_POST['disapprove']) ) {
        disapprove_course($ercc_db, $_POST['disapprove']);

    } elseif ( isset($_POST['delete']) ) {
        delete_course($ercc_db, $_POST['delete']);
        redirect_to('coursemanager.php');
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
                <li class="fs-5 mt-2 text-light"><a href="coursemaker.php">Course Maker</a></li>
                <li class="fs-5 mt-2 text-light"><a style="background-color: white; color: black;" href="coursemanager.php">Course Manager</a></li>
                <li class="fs-5 mt-2 text-light"><a href="users.php">User Hub</a></li>
                <?php if(check_if_role($ercc_db, 'admin,teacher')) {
                    echo '<li class="fs-5 mt-2 text-light"><a href="addrole.php">Add Role</a></li>';
                    echo '<li class="fs-5 mt-2 text-light"><a href="deleterole.php">Delete Role</a></li>';
                } ?>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="#menu-toggle"><i class="bi bi-gear-fill fs-1"></i></a>
                <form method="post" action="coursemanager.php">
                    <div class="row w-75 mt-5" style="margin: auto;">
                        <?php while($course = mysqli_fetch_assoc($courses)) { ?>
                            <div class="col mt-4">
                                <div class="card h-100" style="background-color: dimgrey; border: 4px solid darkgreen;">
                                    <img class="card-img-top" src="../private/assets/img/ERHSCC.png" alt="python logo">
                                    <div class="card-header" style="border-bottom: 2px solid white;">
                                        <h4 class="card-title" style="color: orange"><b><?php echo $course['course_name']; ?></b></h4>
                                        <h5 style="color: yellow"><i>Author: <?php echo $course['author']; ?></i></h5>
                                        <h5>Approved:
                                            <?php if (check_course_approved($ercc_db, $course['id'])) { ?>
                                                <i class="bi bi-check-circle-fill text-success"></i>
                                            <?php } else { ?>
                                                <i class="bi bi-x-circle-fill text-danger"></i>
                                            <?php } ?>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text" style="color: white;"><b style="color: lawngreen">Description: </b> <?php echo $course['description']; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary mt-1" type="submit" name="course" value="<?php echo $course['id']; ?>">Build/Edit</button>
                                        <button class="btn btn-success mt-1" type="submit" name="preview" value="<?php echo $course['id']; ?>">Preview</button>
                                        <?php if (check_if_role($ercc_db, 'admin,teacher') ) { ?>
                                            <?php if (!check_course_approved($ercc_db, $course['id']) ) { ?>
                                                <button class="btn btn-light mt-1" type="submit" name="approve" value="<?php echo $course['id']; ?>">Approve</button>
                                            <?php } else { ?>
                                                <button class="btn btn-warning mt-1" type="submit" name="disapprove" value="<?php echo $course['id']; ?>">Disapprove</button>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (check_if_role($ercc_db, 'admin') ) { ?>
                                            <button class="btn btn-danger mt-1" type=submit" name="delete" value="<?php echo $course['id']; ?>">Delete</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>






<?php require_once "../private/temp/footer.php"; ?>
<?php
$page_name = 'Dashboard';
$page_style = 'webpage';
require_once "./private/init.php";
require_login('./login/login.php');

$ercc_db = db_connect('./private/cert/BaltimoreCyberTrustRoot.crt.pem');
$enrolled_courses = get_enrolled_courses($ercc_db);
$approved_courses = get_approved_courses($ercc_db);
if(is_get_request() ) {

    if( isset( $_GET['enroll'] ) ) {
        $cid = $_GET['enroll'];
        enroll_course($cid, $ercc_db);
        redirect_to('dashboard.php');
    }

}


?>
<?php require_once "./private/temp/header.php"; ?>
<?php require_once "./private/temp/navbar.php"; ?>





<div class="container">
    <p class="fs-5 text-center mt-5" style="background-color: rgba(202, 202, 187, 0.47); color: white; border-radius: 15px; border: 2px solid white;"><b>You must enroll in courses to play them.</b></p>
    <div class="row w-75 mt-5" style="margin: auto;">
        <h1 class="text-center fs-1" style="color: lightblue">Enrolled Courses</h1>
        <?php while($course = mysqli_fetch_assoc($enrolled_courses)) { ?>
            <div class="col mt-4">
                <div class="card h-100" style="background-color: dimgrey; border: 4px solid darkgreen;">
                    <img class="card-img-top" src="private/assets/img/ERHSCC.png" alt="python logo">
                    <div class="card-header" style="border-bottom: 2px solid white;">
                        <h4 class="card-title" style="color: orange"><b><?php echo $course['course_name']; ?></b></h4>
                        <h5 style="color: yellow"><i>Author: <?php echo $course['author']; ?></i></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text" style="color: white;"><b style="color: lawngreen">Description: </b> <?php echo $course['description']; ?></p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success ms-md-2" role="button" href="courses/courseplayer.php?cid=<?php echo $course['id'] . '&uid=1&iid=1'; ?>">Play</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row w-75 mt-5" style="margin: auto;">
        <h1 class="text-center fs-1" style="color: lightblue">Approved Courses</h1>
        <?php while($course = mysqli_fetch_assoc($approved_courses)) { ?>
            <div class="col mt-4">
                <div class="card h-100" style="background-color: dimgrey; border: 4px solid darkgreen;">
                    <img class="card-img-top" src="private/assets/img/ERHSCC.png" alt="python logo">
                    <div class="card-header" style="border-bottom: 2px solid white;">
                        <h4 class="card-title" style="color: orange"><b><?php echo $course['course_name']; ?></b></h4>
                        <h5 style="color: yellow"><i>Author: <?php echo $course['author']; ?></i></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text" style="color: white;"><b style="color: lawngreen">Description: </b> <?php echo $course['description']; ?></p>
                    </div>
                    <div class="card-footer">
                        <?php if( check_course_enrolled($course['id'], $ercc_db) ) { ?>
                            <a class="btn btn-success ms-md-2" role="button" href="courses/courseplayer.php?cid=<?php echo $course['id'] . '&uid=1&iid=1'; ?>">Play</a>
                        <?php } else {?>
                            <a class="btn btn-success ms-md-2" role="button" href="dashboard.php?enroll=<?php echo $course['id']; ?>">Enroll</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php mysqli_free_result($approved_courses); ?>

</div>




<?php require_once "./private/temp/footer.php"; ?>

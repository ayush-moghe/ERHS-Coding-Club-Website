<?php
$page_style = "webpage";
$page_name = "Student Login";
require_once "../private/init.php";

$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
$errors = ['sid' => '', 'username' => '', 'password' => '', 'cpwd' => '', 'present' => false];

if( is_post_request() ) {

    $errors = register_user( $_POST, $ercc_db);

    if ($errors === true) {
        login_user($_POST) ;
        redirect_to('../index.php');
    }
    db_disconnect($ercc_db);
}

?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>

    <div class="container-fluid">

        <form method="post" action="register.php" class="w-75 ps-5 pe-5" style="margin: auto; background-color: rgba(91, 232, 105, 0.63); border-radius: 15px;">

            <div class="h1 fs-sm-5 erhs-h1 text-center mb-4 mt-3" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Login/ Register</div>

            <hr style="opacity: 1; color: white; height: 5px;">

            <ul class="nav nav-pills justify-content-center mt-4">
                <li class="nav-item me-2 ms-2">
                    <a class="nav-link bg-dark pe-5 ps-5 pt-3 pb-3" aria-current="page" href="register.php">Register</a>
                </li>
                <li class="nav-item dropdown me-2 ms-2">
                    <a class="nav-link dropdown-toggle bg-dark pe-5 ps-5 pt-3 pb-3" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Login</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item mb-2" href="student.php">Login as Student</a></li>
                        <li><a class="dropdown-item mb-2" href="teacher.php">Login as Teacher</a></li>
                    </ul>
                </li>
            </ul>

            <p class="fs-5 text-center mt-3" style="background-color: rgba(202, 202, 187, 0.47); color: black; border-radius: 15px; border: 2px solid white;"><b>Note: Staff and Teacher Accounts are created by Club Admins such as the Founder and Advisor</b></p>

            <div class="h2 erhs-h2 text-center mb-3 mt-3" style="font-family: 'Orbitron', sans-serif;">Student Register</div>

            <div>
                <label class="form-label mt-2 text-light" for="sid">Student ID</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card-2-front"></i></span>
                    <input type="text" class="form-control" id="sid" name="sid" placeholder="Enter id">
                </div>
                <div class="p text-danger fs-5 bg-dark mt-1" role="alert"><?php echo $errors['sid'] ?></div>

            </div>

            <div>
                <label class="form-label mt-2 text-light" for="username">Username</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter username">
                </div>
                <div class="p text-danger fs-5 bg-dark mt-1" role="alert"><?php echo $errors['username'] ?></div>

            </div>

            <div>
                <label class="form-label mt-2 text-light" for="password">Password</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password">
                </div>
                <div class="p text-danger fs-5 bg-dark mt-1" role="alert"><?php echo $errors['password'] ?></div>

            </div>

            <div>
                <label class="form-label mt-2 text-light" for="cpwd">Confirm Password</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                    <input type="password" class="form-control form-control-lg" id="cpwd" name="cpwd" placeholder="Enter password">
                </div>
                <div class="p text-danger fs-5 bg-dark mt-1" role="alert"><?php echo $errors['cpwd'] ?></div>

            </div>

            <button type="submit" class="btn btn-lg btn-primary mt-3 mb-3">Register</button>
        </form>

    </div>



<?php require_once "../private/temp/footer.php"; ?>
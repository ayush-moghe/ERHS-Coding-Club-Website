<?php
$page_style = "webpage";
$page_name = "Register";
require_once "../private/init.php";

$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
$errors = ['first_name' => '', 'last_name' => '', 'sid' => '', 'username' => '', 'password' => '', 'cpwd' => '', 'present' => false];

if( is_post_request() ) {

    $errors = register_user( $_POST, $ercc_db);

    if ($errors === true) {
        login_user($_POST) ;
        redirect_to('../dashboard.php');
    }
    db_disconnect($ercc_db);
}

?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>

    <div class="container-fluid">

        <form method="post" action="register.php" class="w-75 ps-5 pe-5" style="margin: auto; background-color: rgba(91, 232, 105, 0.63); border-radius: 15px;">

            <div class="h1 fs-sm-5 erhs-h1 text-center mb-4 mt-3 pe-5 ps-5 pt-3 pb-3" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Login/ Register</div>

            <hr style="opacity: 1; color: white; height: 5px;">

            <ul class="nav nav-pills justify-content-center text-center mt-4 d-block">
                <li class="nav-item me-2 ms-2">
                    <a class="nav-link bg-warning pe-5 ps-5 pt-3 pb-3 fs-3 reglog" style="border-bottom: 3px solid white;" aria-current="page" href="register.php">Register</a>
                </li>
                <li class="nav-item me-2 ms-2">
                    <a class="nav-link bg-dark pe-5 ps-5 pt-3 pb-3 fs-3 reglog" href="login.php">Login</a>
                </li>
            </ul>

            <p class="fs-5 text-center mt-3" style="background-color: rgba(202, 202, 187, 0.47); color: black; border-radius: 15px; border: 2px solid white;"><a href="../teacher/register.php"><b>Are you a teacher? Register here instead.</b></a></p>
            <div class="h2 text-light text-center mb-3 mt-3" style="font-family: 'Orbitron', sans-serif;">Register</div>

            <div class="row">

                <div class="col-md-6">
                    <label class="form-label mt-2 text-light" for="first_name">First Name</label>
                    <input type="text" class="form-control form-control-lg" id="first_name" name="first_name" placeholder="Enter first name">
                    <div class="p text-danger fs-5 bg-dark mt-1" role="alert"><?php echo $errors['first_name'] ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label mt-2 text-light" for="last_name">Last Name</label>
                    <input type="text" class="form-control form-control-lg" id="last_name" name="last_name" placeholder="Enter last name">
                    <div class="p text-danger fs-5 bg-dark mt-1" role="alert"><?php echo $errors['last_name'] ?></div>
                </div>

            </div>

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
<?php
$page_style = "webpage";
$page_name = "Student Login";
require_once "../private/init.php";

$error = false;
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');

if (is_post_request()) {
    $try_login = member_login($_POST, $ercc_db);
    if ($try_login === true) {
        redirect_to('../dashboard.php');
    } else {
        $error = true;
    }
}

?>


<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>

<div class="container-fluid">
    <form method="post" action="login.php" class="w-75 ps-5 pe-5" style="margin: auto; background-color: rgba(91, 232, 105, 0.63); border-radius: 15px;">

        <div class="h1 fs-sm-5 erhs-h1 text-center mb-4 mt-3" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Login/ Register</div>

        <hr style="opacity: 1; color: white; height: 5px;">

        <ul class="nav nav-pills justify-content-center text-center mt-4 d-block">
            <li class="nav-item me-2 ms-2">
                <a class="nav-link bg-dark pe-5 ps-5 pt-3 pb-3 fs-3 reglog" style="border-bottom: 3px solid white;" aria-current="page" href="register.php">Register</a>
            </li>
            <li class="nav-item me-2 ms-2">
                <a class="nav-link bg-light pe-5 ps-5 pt-3 pb-3 fs-3 reglog" href="login.php">Login</a>
            </li>
        </ul>

        <div class="h2 text-light text-center mb-3 mt-3" style="font-family: 'Orbitron', sans-serif;">Login</div>

        <div>
            <label class="form-label mt-2 text-light" for="sid">Student ID</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card-2-front"></i></span>
                <input type="text" class="form-control" id="sid" name="sid" placeholder="Enter id">
            </div>
        </div>

        <div>
            <label class="form-label mt-2 text-light" for="username">Username</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter username">
            </div>

        </div>

        <div>
            <label class="form-label mt-2 text-light" for="password">Password</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password">
            </div>

        </div>

        <?php if($error) { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Error!</strong> Your login was invalid.
            </div>
        <?php } ?>

        <button type="submit" class="btn btn-lg btn-primary mt-3 mb-3">Login</button>
    </form>

</div>



<?php require_once "../private/temp/footer.php"; ?>


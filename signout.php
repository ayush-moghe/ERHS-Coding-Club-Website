<?php
$page_name = 'Sign Out';
$page_style = 'webpage';
require_once "./private/init.php";
require_login('./login/login.php');

if (is_post_request()) {
    $signout = $_POST['signout'] ?? 'no';
    if ($signout == 'yes') {
        logout_user();
        redirect_to('./login/login.php');

    } elseif ($signout == 'no') {
        redirect_to('index.php');
    }
}

?>

<?php require_once "./private/temp/header.php"; ?>
<?php require_once "./private/temp/navbar.php"; ?>

<div class="container-fluid">

    <form method="post" action="signout.php" class="w-75 ps-5 pe-5" style="margin: auto; background-color: rgba(91, 232, 105, 0.63); border-radius: 15px;">

        <div class="h1 fs-sm-5 erhs-h1 text-center mb-4 mt-3" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Sign-out</div>

        <hr style="opacity: 1; color: white; height: 5px;">

        <div class="h1 fs-1 text-center mt-3" style="background-color: rgb(255,255,255); color: orangered; border-radius: 15px; border: 2px solid orangered;"><b>Are you sure you want to sign out?</b></div>

        <div class="form-check form-check mb-4">
            <label class="form-check-label fs-2" for="yes" style="color: orange;"><input class="form-check-input form-check-input-lg" type="radio" name="signout" id="yes" value="yes"><b>Yes, sign me out</b></label>
        </div>

        <div class="form-check form-check">
            <label class="form-check-label fs-2" for="no" style="color: orange"><input class="form-check-input form-check-input-lg" type="radio" name="signout" id="no" value="no"><b>No, keep me logged in</b></label>
        </div>
        <br>
        <button type="submit" class="btn btn-lg btn-primary mt-3 mb-3">Confirm</button>
    </form>

</div>



<?php require_once "./private/temp/footer.php"; ?>

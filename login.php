<?php
$page_style = 'webpage';
$page_name = 'Login';
?>

<?php require_once('./private/init.php'); ?>
<?php require_once('./private/temp/header.php'); ?>
<?php require_once('./private/temp/navbar.php'); ?>

<div class="container-fluid text-centet" style="position: fixed; top: 30%; bottom: 50%">
    <form method="post" action="login.php" class="w-75 ps-5 pe-5" style="margin: auto; background-color: rgba(91, 232, 105, 0.63); border-radius: 15px;">
        <div class="h1 erhs-h1 text-center mb-3 mt-3" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Login</div>

        <div>
            <label class="form-label mt-2" for="username">Student ID</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card-2-front"></i></span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter id" style="color: white; background-color: orange;">
            </div>
        </div>

        <div>
            <label class="form-label mt-2" for="username">Username</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter username" style="color: white; background-color: orange;">
            </div>

        </div>

        <div>
            <label class="form-label mt-2" for="password">Password</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" style="color: white; background-color: orange;">
            </div>

        </div>

        <button type="submit" class="btn btn-primary mt-3 mb-3">Login</button>
    </form>
</div>



<?php require_once('./private/temp/footer.php'); ?>

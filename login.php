<?php
$page_style = 'webpage';
$page_name = 'Login';
$opt = $_GET['opt'] ?? 1;
?>

<?php require_once('./private/init.php'); ?>
<?php require_once('./private/temp/header.php'); ?>
<?php require_once('./private/temp/navbar.php'); ?>

<div class="container-fluid text-centet">
    <form method="post" action="login.php" class="w-75 ps-5 pe-5" style="margin: auto; background-color: rgba(91, 232, 105, 0.63); border-radius: 15px;">

        <div class="h1 fs-sm-5 erhs-h1 text-center mb-4 mt-3" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Login/ Register</div>

        <hr style="opacity: 1; color: white; height: 5px;">

        <ul class="nav nav-pills justify-content-center mt-4">
            <li class="nav-item me-2 ms-2">
                <a class="nav-link bg-dark pe-5 ps-5 pt-3 pb-3" aria-current="page" href="https://erhscodingclub.org/login.php?opt=3">Register</a>
            </li>
            <li class="nav-item dropdown me-2 ms-2">
                <a class="nav-link dropdown-toggle bg-dark pe-5 ps-5 pt-3 pb-3" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Login</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="https://erhscodingclub.org/login.php?opt=1">Login as Student</a></li>
                    <li><a class="dropdown-item" href="https://erhscodingclub.org/login.php?opt=2">Login as Teacher</a></li>
                </ul>
            </li>
        </ul>
        <hr style="opacity: 1; color: red; height: 5px;">

        <?php if($opt == 1) { ?>
        <div class="h2 erhs-h2 text-center mb-3 mt-3" style="font-family: 'Orbitron', sans-serif;">Student Login</div>

        <div>
            <label class="form-label mt-2 text-light" for="username">Student ID</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card-2-front"></i></span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter id" style="color: white; background-color: orange;">
            </div>
        </div>

        <div>
            <label class="form-label mt-2 text-light" for="username">Username</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter username" style="color: white; background-color: orange;">
            </div>

        </div>

        <div>
            <label class="form-label mt-2 text-light" for="password">Password</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" style="color: white; background-color: orange;">
            </div>

        </div>

        <button type="submit" class="btn btn-primary mt-3 mb-3">Login</button>

        <?php } elseif($opt == 2) { ?>
        <div class="h2 erhs-h2 text-center mb-3 mt-3" style="font-family: 'Orbitron', sans-serif;">Teacher Login</div>

        <div>
            <label class="form-label mt-2 text-light" for="username">Username</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter username" style="color: white; background-color: orange;">
            </div>

        </div>

        <div>
            <label class="form-label mt-2 text-light" for="password">Password</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" style="color: white; background-color: orange;">
            </div>

        </div>

        <button type="submit" class="btn btn-primary mt-3 mb-3">Login</button>
    </form>
    <?php } elseif($opt == 3) {  ?>
    <div class="h2 erhs-h2 text-center mb-3 mt-3" style="font-family: 'Orbitron', sans-serif;">Student Register</div>

    <div>
        <label class="form-label mt-2 text-light" for="username">Student ID</label>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-credit-card-2-front"></i></span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter id" style="color: white; background-color: orange;">
        </div>
    </div>

    <div>
        <label class="form-label mt-2 text-light" for="username">Username</label>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
            <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter username" style="color: white; background-color: orange;">
        </div>

    </div>

    <div>
        <label class="form-label mt-2 text-light" for="password">Password</label>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" style="color: white; background-color: orange;">
        </div>

    </div>

    <div>
        <label class="form-label mt-2 text-light" for="password">Confirm Password</label>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" style="color: white; background-color: orange;">
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-3 mb-3">Login</button>
    <?php } ?>

</div>



<?php require_once('./private/temp/footer.php'); ?>

<?php
$page_style = "webpage";
$page_name = "Student Login";
?>

<?php require_once "../private/init.php"; ?>
<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>

<div class="container-fluid">
    <form method="post" action="" class="w-75 ps-5 pe-5" style="margin: auto; background-color: rgba(91, 232, 105, 0.63); border-radius: 15px;">

        <div class="h1 fs-sm-5 erhs-h1 text-center mb-4 mt-3" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Login/ Register</div>

        <hr style="opacity: 1; color: white; height: 5px;">

        <ul class="nav nav-pills justify-content-center mt-4">
            <li class="nav-item me-2 ms-2">
                <a class="nav-link bg-dark pe-5 ps-5 pt-3 pb-3" aria-current="page" href="register.php">Register</a>
            </li>
            <li class="nav-item dropdown me-2 ms-2">
                <a class="nav-link dropdown-toggle bg-dark pe-5 ps-5 pt-3 pb-3" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Login</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="student.php">Login as Student</a></li>
                    <li><a class="dropdown-item" href="teacher.php">Login as Teacher</a></li>
                </ul>
            </li>
        </ul>

        <div class="h2 erhs-h2 text-center mb-3 mt-3" style="font-family: 'Orbitron', sans-serif;">Teacher Login</div>

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

        <button type="submit" class="btn btn-lg btn-primary mt-3 mb-3">Login</button>
    </form>

</div>



<?php require_once "../private/temp/footer.php"; ?>

<?php if( !(isset($_SESSION['sid'])) ) {?>
    <nav class="navbar navbar-flex navbar-dark navbar-expand-md bg-dark py-3 sticky-top" style="">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><img src="./private/assets/img/ERHSCC.png" width="104" height="87"></span><span><strong class="erhs-h1">&nbsp; ERHS Coding Club</strong></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><b>Home</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                </ul><a class="btn btn-primary ms-md-2" role="button" href="login/login.php">Login/Register</a>
            </div>
        </div>
    </nav>
<?php }?>



<?php if( isset($_SESSION['sid']) ) {?>
    <nav class="navbar navbar-flex navbar-dark navbar-expand-md bg-dark py-3 sticky-top" style="">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><img src="./private/assets/img/ERHSCC.png" width="104" height="87"></span><span><strong class="erhs-h1">&nbsp; ERHS Coding Club</strong></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><b>Home</b></a></li>
                    <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Account</a>
                        <div class="dropdown-menu">
                            <div class="dropdown-header"><?php echo $_SESSION['username']; ?></div>
                            <div class="dropdown-header">SID: <?php echo $_SESSION['sid']; ?></div>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-header">First Name: <?php echo $_SESSION['first_name'] ?></div>
                            <div class="dropdown-header">Last Name: <?php echo $_SESSION['last_name'] ?></div>
                            <?php if( check_if_role($ercc_db, STAFFROLES) ) { ?>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header text-primary"><a style="text-decoration: none;" href="portal/"><b>Staff Portal</b></a></div>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
                <a class="btn btn-primary ms-md-2" role="button" href="signout.php">Sign-out</a>
            </div>
        </div>
    </nav>
<?php }?>


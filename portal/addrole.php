<?php
$page_style = 'portal';
$page_name = 'Add Role';
require_once "../private/init.php";
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../login/login.php');
require_role( 'teacher,admin', $ercc_db, '../index.php' );
require_user_verified($ercc_db, $_SESSION['username'], '../index.php');
$user_set = all_users($ercc_db);

if(is_post_request()) {
    $user_id = $_POST['user_select'] ?? '';
    $role = $_POST['role_select'] ?? '';
    add_role($ercc_db, $user_id, $role);
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
            <li class="fs-5 mt-2 text-light"><a href="coursemanager.php">Course Manager</a></li>
            <li class="fs-5 mt-2 text-light"><a href="users.php">User Hub</a></li>
            <?php if(check_if_role($ercc_db, 'admin,teacher')) {
                echo '<li class="fs-5 mt-2 text-light"><a style="background-color: white; color: black;" href="addrole.php">Add Role</a></li>';
            } ?>
        </ul>
    </div>

    <div class="page-content-wrapper">
        <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="#menu-toggle"><i class="bi bi-gear-fill fs-1"></i></a>
            <div class="row">
                <div class="col-md-12">


                    <div class="container-fluid">

                        <form method="post" action="addrole.php" class="w-75 ps-5 pe-5 pb-5" style="margin: auto; border-radius: 15px; background-color: darkgreen">

                            <div class="h1 fs-sm-5 erhs-h1 text-center mb-4 mt-5" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Add Role User:</div>

                            <hr style="opacity: 1; color: white; height: 5px;">

                            <div>

                                <label class="form-label mt-2 text-light" for="user_select">Select User</label>
                                <div class="input-group input-group-lg">

                                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i></span>
                                    <select id="user_select" name="user_select" class="form-select">
                                        <?php
                                            while($users = mysqli_fetch_assoc($user_set)) {
                                                echo '<option value="' . $users['username'] . '">' . $users['username'] . '</option>';
                                            }
                                        ?>
                                    </select>

                                </div>

                            </div>

                            <div>

                                <label class="form-label mt-2 text-light" for="role_select">Add Role</label>
                                <div class="input-group input-group-lg">

                                    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-gem"></i></span>
                                    <select id="role_select" name="role_select" class="form-select">
                                        <option value="student" >Student</option>
                                        <option value="officer" >Officer</option>
                                        <option value="teacher" >Teacher</option>
                                        <option value="admin" >Admin</option>
                                        <option value="president" >President</option>
                                        <option value="vicepresident" >Vice President</option>
                                        <option value="secretary" >Secretary</option>
                                        <option value="treasurer" >Treasurer</option>
                                        <option value="historian" >Historian</option>
                                    </select>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-lg btn-primary mt-3">Add Role</button>

                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>




<?php require_once "../private/temp/footer.php"; ?>

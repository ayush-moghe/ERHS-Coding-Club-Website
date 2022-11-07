<?php
$page_name = 'Verification Hub';
$page_style = 'webpage';
require_once "../private/init.php";
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../login/login.php');
require_role( STAFFROLES, $ercc_db);
$user_set = all_users($ercc_db);

if (is_post_request()) {
    $uid = $_POST['id'];
    update_verification($ercc_db, $uid);
    $user_set = all_users($ercc_db);
}
?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>

<div class="h1 text-light text-center mt-5" style="font-family: 'Montserrat', sans-serif;">Verification Hub</div>
<div class="table-responsive-md mt-5 mb-5 ">

    <table class="table table-hover table-success table-bordered w-75 text-center" style="margin: auto;">

        <thead>
        <tr>
            <th colspan="9" class="h2 mt-5 align-self-center fs-2 pt-2 pb-2 bg-primary mb-0" style="margin: auto; font-family: 'Work Sans', sans-serif; color: lightgrey;">Users</th>
        </tr>
        <tr class="table-light">
            <th scope="col">Database ID</th>
            <th scope="col">Student ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Username</th>
            <th scope="col">Verified</th>
            <th scope="col">Roles</th>
            <th scope="col">Course Enrollment</th>
            <th scope="col">Verify</th>
        </tr>
        </thead>

        <tbody>

        <?php while($users = mysqli_fetch_assoc( $user_set )) { ?>
            <tr scope="row">
                <td><?php echo $users['id']; ?></td>
                <td><?php echo $users['sid']; ?></td>
                <td><?php echo $users['first_name']?></td>
                <td><?php echo $users['last_name']?></td>
                <td><?php echo $users['username']; ?></td>
                <td><?php echo $users['verified']; ?></td>
                <td><?php echo $users['role']; ?></td>
                <td><?php echo $users['enrollment']; ?></td>
                <td>
                    <?php if($users['verified'] == 0) { ?>
                        <form action="verify.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $users['id']; ?>">
                            <input type="submit" name="verify" value="Verify" class="btn btn-success">
                        </form>
                    <?php } elseif($users['verified'] == 1) { ?>
                        <form action="verify.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $users['id']; ?>">
                            <input type="submit" name="unverify" value="Unverify" class="btn btn-danger">
                        </form>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>

        </tbody>


    </table>

</div>
<?php require_once "../private/temp/footer.php"; ?>

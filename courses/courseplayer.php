<?php
$page_name = 'courseplayer';
$page_style = 'webpage';
require_once "../private/init.php";
require_login('../login/login.php');
$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');

if( !isset($_GET['cid']) or !isset($_GET['uid']) or !isset($_GET['iid']) or !check_course_approved($ercc_db, $_GET['cdi']) ) {
    redirect_to('../dashboard.php');
}

$course = get_course_by_id($_GET['cid'], $ercc_db);
$course_units = get_units_by_cid($ercc_db, $_GET['cid']);
?>

<?php require_once "../private/temp/headerNest.php"; ?>
<?php require_once "../private/temp/navbarNest.php"; ?>


<div id="wrapper">
    <div id="sidebar-wrapper" style="background: dimgray; height: 92%;">
        <ul class="sidebar-nav">
            <li class="fs-1 text-center" style="color: black; background: orange"><b><?php echo $course['course_name']; ?></b></li>
            <?php while($units = mysqli_fetch_assoc($course_units)) { ?>

                <div class="text-light fs-2 text-center pt-2 pb-2 unit" style="border-bottom: 3px solid white;"><?php echo $units['unit_name'] . ' '?><i class="bi bi-book fs-2"></i></div>
                <?php $unit_items = get_items_by_uid($ercc_db, $units['id']); ?>

                <?php while($items = mysqli_fetch_assoc($unit_items)) { ?>

                    <?php if( $items['type'] == 'VID' ) { ?>
                        <div class="text-light fs-5 text-center unit-item" style="border-bottom: 3px solid white;"><a href="<?php echo '?cid=' . $course['id'] . '&uid=' . $units['id'] . '&iid=' . $items['id'];?>" class="nav-link text-light"><?php echo $items['item_name'] . ' ';?><i  class="bi bi-play-circle fs-5"></i></a></div>
                    <?php } elseif( $items['type'] == 'QUIZ' ) { ?>
                        <div class="text-light fs-5 text-center unit-item" style="border-bottom: 3px solid white;"><a href="<?php echo '?cid=' . $course['id'] . '&uid=' . $units['id'] . '&iid=' . $items['id'];?>" class="nav-link text-light"><?php echo $items['item_name'] . ' ';?><i  class="bi bi-clipboard-check fs-5"></i></a></div>
                    <?php } ?>

                <?php } ?>

            <?php } ?>
        </ul>

    </div>

    <div class="page-content-wrapper">
        <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="?#menu-toggle"><i class="bi bi-gear-fill fs-1"></i></a>
            <div class="row">
                <div class="col-md-12">
                    <?php $item = get_item($ercc_db, $_GET['iid']); ?>
                    <?php if($item['type'] == 'VID') { ?>
                        <div class="container h-60 w-100">
                            <div class="embed-responsive ratio ratio-16x9">
                                <iframe class="embed-responsive-item" src="<?php echo $item['content']?>" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="erhs-h1 h1 text-center mt-2" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;"><u><?php echo $item['item_name']; ?></u></div>
                        <div class="container justify-content-start mb-5">
                            <div class="erhs-h2 h2 text-wrap" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Description</div>
                            <div class="erhs-p fs-4"><?php echo $item['item_description']; ?></div>
                        </div>
                    <?php } elseif ($item['type'] == 'QUIZ') { ?>
                        <div class="quiz" style="align-content: center">
                            <?php echo $item['content']; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../private/assets/js/Sidebar-Menu.js"></script>




<?php require_once "../private/temp/footer.php"; ?>

<?php
$page_name = 'courseplayer';
$page_style = 'webpage';
require_once "../private/init.php";
require_login('../login/login.php');

if( !isset($_GET['cid']) or !isset($_GET['uid']) or !isset($_GET['iid']) ) {
    redirect_to('../dashboard.php');
}

$ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
$course = get_course_by_id($_GET['cid'], $ercc_db);
$course_units = get_units_by_cid($ercc_db, $_GET['cid']);

?>

<?php require_once("../private/temp/headerNest.php"); ?>
<?php require_once("../private/temp/navbarNest.php"); ?>

<div class="container-flex">
    <nav class="navbar navbar-expand d-flex flex-column align-item-center text-center" style="width: 30vw;" id="sidebar">
        <div class="font-weight-bold fs-1 navbar-brand text-light mt-5 sb-title"><b><?php echo $course['course_name'];?></b></div>
        <ul class="navbar-nav d-flex flex-column mt-5 w-100 sb-content">

            <?php while($units = mysqli_fetch_assoc($course_units)) { ?>

                <li class="nav-item w-100 mb-0 pt-5 pb-5 fs-4 unit" style="border-bottom: 2px solid black;">
                    <div class="text-light pl-4"><?php echo $units['unit_name'] . ' '?><i class="bi bi-book fs-2"></i></div>
                </li>

                <?php $unit_items = get_items_by_uid($ercc_db, $units['id']); ?>

                <?php while($items = mysqli_fetch_assoc($unit_items)) { ?>

                    <?php if( $items['type'] == 'VID' ) { ?>
                        <li class="nav-item w-100 mb-0 pt-3 pb-3 fs-4 unit-item" style="border-bottom: 2px solid black;">
                            <a href="<?php echo '?cid=' . $course['id'] . '&uid=' . $units['id'] . '&iid=' . $items['id'];?>" class="nav-link text-light pl-4"><?php echo $items['item_name'] . ' ';?><i  class="bi bi-play-circle fs-2"></i></a>
                        </li>
                    <?php } elseif( $items['type'] == 'QUIZ' ) { ?>
                        <li class="nav-item w-100 mb-0 pt-3 pb-3 fs-4 unit-item" style="border-bottom: 2px solid black;">
                            <a href="<?php echo '?cid=' . $course['id'] . '&uid=' . $units['id'] . '&iid=' . $items['id'];?>" class="nav-link text-light pl-4"><?php echo $items['item_name'] . ' ';?><i class="bi bi-clipboard-check fs-2"></i></a>
                        </li>
                    <?php } ?>

                <?php } ?>
            <?php } ?>
        </ul>
    </nav>

    <?php $item = get_item($ercc_db, $_GET['iid']); ?>


        <?php if($item['type'] == 'VID') { ?>

            <div class="d-flex flex-column" id="content" style="margin-left: 30vw; width: 68vw; height: 100vh">

                <div class="embed-responsive embed-responsive-16by9 text-center mt-2 mb-2" style="width: 100%; height: 50%; margin: auto;">
                    <iframe class="embed-responsive-item" width="100%" height="100%" src="<?php echo $item['content']; ?>" allowfullscreen></iframe>
                </div>

                <div class="erhs-h1 h1 text-center mt-2" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;"><u><?php echo $item['item_name']; ?></u></div>
                <hr style="height: 4px; color: white; opacity: 1;">

                <div class="container justify-content-start">
                    <div class="erhs-h2 h2 text-wrap" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Description</div>
                    <div class="erhs-p fs-4"><?php echo $item['item_description']; ?></div>
                </div>

            </div>

        <?php } elseif($item['type'] == 'QUIZ') { ?>

            <div class="d-flex flex-column quiz mt-3" id="content" style="margin-left: 30vw; width: 68vw; height: 100vh">
                <?php echo $item['content']; ?>
            </div>

        <?php } ?>

</div>

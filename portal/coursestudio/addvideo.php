<?php
$page_style = 'portal';
$page_name = 'Add Video';
require_once "../../private/init.php";
$ercc_db = db_connect('../../private/cert/BaltimoreCyberTrustRoot.crt.pem');
require_login('../../login/login.php');
require_role( STAFFROLES, $ercc_db);

$target_course = get_course_by_id($_SESSION['target_course'], $ercc_db);
$course_units = get_units_by_cid($ercc_db, $target_course['id']);

if ( is_post_request() ) {

    if( isset($_POST['add_video']) ) {

        $target_unit = get_unit($ercc_db, $_POST['unit_select']);
        $video_name = $_POST['video_name'];
        $video_url = $_POST['video_url'];
        $video_desc = $_POST['video_desc'];

        add_video($ercc_db, $target_course['id'], $target_unit['id'], $video_name, $video_url, $video_desc, $target_unit['unit_number']);

    }

}

?>

<?php require_once "../../private/temp/headerStudio.php"; ?>
<?php require_once "../../private/temp/studioNavbar.php"; ?>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand fs-3 bg-light" style="color: black"><b>COURSE STUDIO</b></li>
                <li class="fs-5 mt-2 text-primary"><?php echo $target_course['course_name']; ?></li>
                <li class="fs-4 mt-4" style="color: gold"><b>Toolbox 🛠️️</b></li>
                <div class="dropdown-divider" style="border-color: white;"></div>
                <li class="fs-4 mt-2"><button class="btn-success" style="border-radius: 10px;"><a id="previewStudio" style=" color: white; " href="../../courses/preview.php">Preview</a></button></li>
                <li class="fs-5 mt-2 text-light"><a href="addunit.php">Add Unit</a></li>
                <li class="fs-5 mt-2 text-light"><a href="editunit.php">Edit Unit</a></li>
                <li class="fs-5 mt-2 text-light"><a style="background-color: white; color: black;" href="addvideo.php">Add Video</a></li>
                <li class="fs-5 mt-2 text-light"><a href="editvideo.php">Edit Video</a></li>
                <li class="fs-5 mt-2 text-light"><a href="addquiz.php">Add Quiz</a></li>
                <li class="fs-5 mt-2 text-light"><a href="editquiz.php">Edit Quiz</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="#menu-toggle"><i class="bi bi-gear-fill fs-1"></i></a>
                <div class="row">
                    <div class="col-md-12">

                        <div class="container-fluid w-75 ps-5 pe-5 pb-5 bg-dark" style="margin: auto; border-radius: 15px;">

                            <form method="post" action="addvideo.php">

                                <div class="h1 fs-sm-5 erhs-h1 text-center mb-4 mt-5" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Add A Video</div>

                                <hr style="opacity: 1; color: white; height: 5px;">

                                <div>

                                    <label class="form-label mt-2 text-light" for="unit_select">Select Unit</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-collection-play-fill"></i></span>
                                        <select class="form-select" name="unit_select" id="unit_select">
                                            <?php while($units = mysqli_fetch_assoc($course_units) ) { ?>
                                                <option value="<?php echo $units['id']; ?>"><?php echo $units['unit_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php $course_units = get_units_by_cid($ercc_db, $target_course['id']); ?>
                                    </div>

                                </div>

                                <div>

                                    <label class="form-label mt-4 text-light" for="video_url">Youtube URL</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-youtube"></i></span>
                                        <input type="url" class="form-control" name="video_url" id="video_url" placeholder="Enter the youtube link for the video.">
                                    </div>

                                </div>

                                <div>

                                    <label class="form-label mt-4 text-light" for="video_name">Video Name</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-plus-square-fill"></i></span>
                                        <input type="text" class="form-control" id="video_name" name="video_name" placeholder="Enter a name for the video.">
                                    </div>


                                </div>

                                <div>

                                    <label class="form-label mt-4 text-light" for="video_desc">Video Description</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-card-text"></i></span>
                                        <textarea class="form-control" id="video_desc" name="video_desc" placeholder="Enter a description for the video."></textarea>
                                    </div>

                                </div>


                                <button type="submit" name="add_video" class="btn btn-lg btn-primary mt-3">Create</button>

                                <hr style="opacity: 1; color: white; height: 5px;">

                            </form>

                            <!-- Course Schema -->
                            <form action="addvideo.php" method="post">
                                <div class="table-responsive-md mt-5 mb-5">
                                    <table class="table table-success table-bordered w-100 text-center" style="margin: auto;">

                                        <thead>
                                        <tr>
                                            <th class="h2 mt-5 fs-1 pt-2 pb-2 mb-0" style="background-color: orange; margin: auto; font-family: 'Work Sans', sans-serif; color: black;">Course Schema</th>
                                            <th class="pt-2 pb-2 mb-0 bg-danger"><button class="btn-danger btn-lg text-center w-100 ps-0 pe-0" type="submit" name="delete">Delete</button></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php while($units = mysqli_fetch_assoc($course_units) ) { ?>

                                            <tr scope="row">
                                                <td class="fs-3 text-light text-start" style="background-color: darkslategray"><?php echo 'Unit '. $units['unit_number'] . ': ' . $units['unit_name']; ?>  <i class="bi bi-book fs-2"></i></td>
                                                <td style="background-color: darkslategray"><input class=" schema_checkbox form-check-input form-check-input-lg" type="checkbox" name="schema[]" value="unit,<?php echo $units['id']; ?>"></td>
                                            </tr>

                                            <?php $unit_items = get_items_by_uid($ercc_db, $units['id']); ?>

                                            <?php while($items = mysqli_fetch_assoc($unit_items)) { ?>

                                                <?php if($items['type'] == 'VID') { ?>

                                                    <tr scope="row">
                                                        <td class="fs-4 text-light text-start" style="background-color: slategray"><?php echo $items['item_name']; ?> <i class="bi bi-play-circle fs-4"></i></td>
                                                        <td style="background-color: slategray"><input class=" schema_checkbox form-check-input form-check-input-lg" type="checkbox" name="schema[]" value="item,<?php echo $items['id']; ?>"></td>
                                                    </tr>

                                                <?php } elseif($items['type'] == 'QUIZ') { ?>

                                                    <tr scope="row">
                                                        <td class="fs-4 text-light text-start" style="background-color: slategray"><?php echo $items['item_name']; ?> <i class="bi bi-clipboard-check fs-4"></i></td>
                                                        <td style="background-color: slategray"><input class=" schema_checkbox form-check-input form-check-input-lg" type="checkbox" name="schema[]" value="item,<?php echo $items['id']; ?>"></td>
                                                    </tr>

                                                <?php } ?>

                                            <?php } ?>

                                        <?php } ?>


                                        </tbody>

                                    </table>

                                </div>
                            </form>


                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../private/assets/js/Sidebar-Menu.js"></script>




<?php require_once "../../private/temp/footer.php"; ?>
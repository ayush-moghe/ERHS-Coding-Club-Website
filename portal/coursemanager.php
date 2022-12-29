 <?php
 $page_style = 'portal';
 $page_name = 'Course Manager';
 require_once "../private/init.php";
 $ercc_db = db_connect('../private/cert/BaltimoreCyberTrustRoot.crt.pem');
 require_login('../login/login.php');
 require_role( STAFFROLES, $ercc_db);

 $courses = all_courses($ercc_db);

 if ( is_post_request() ) {

     if( isset($_POST['course']) ) {

         $course = $_POST['course'];
         $_SESSION['target_course'] = $course;
         redirect_to('coursestudio/addunit.php');

     } elseif ( isset($_POST['preview']) ) {
         redirect_to('../index.php');
     }


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
             <li class="fs-5 mt-2 text-light"><a style="background-color: white; color: black;" href="coursemanager.php">Course Manager</a></li>
             <li class="fs-5 mt-2 text-light"><a href="users.php">User Table</a></li>
             <li class="fs-5 mt-2 text-light"><a href="verify.php">Verification Hub</a></li>
         </ul>
     </div>
     <div class="page-content-wrapper">
         <div class="container-fluid"><a id="menu-toggle" class="btn btn-link" role="button" href="#menu-toggle"><i class="bi bi-gear-fill fs-1"></i></a>
             <h1 class="text-center fs-1" style="color: lightblue">Choose A Course</h1>
             <form method="post" action="coursemanager.php">
                 <div class="row w-75 mt-5" style="margin: auto;">
                     <?php while($course = mysqli_fetch_assoc($courses)) { ?>
                         <div class="col mt-4">
                             <div class="card h-100" style="background-color: dimgrey; border: 4px solid darkgreen;">
                                 <img class="card-img-top" src="../private/assets/img/ERHSCC.png" alt="python logo">
                                 <div class="card-header" style="border-bottom: 2px solid white;">
                                     <h4 class="card-title" style="color: orange"><b><?php echo $course['course_name']; ?></b></h4>
                                     <h5 style="color: yellow"><i>Author: <?php echo $course['author']; ?></i></h5>
                                     <h5>Approved:
                                         <?php if ($course['approved'] == 1) { ?>
                                             <i class="bi bi-check-circle-fill text-success"></i>
                                         <?php } else { ?>
                                             <i class="bi bi-x-circle-fill text-danger"></i>
                                         <?php } ?>
                                     </h5>
                                 </div>
                                 <div class="card-body">
                                     <p class="card-text" style="color: white;"><b style="color: lawngreen">Description: </b> <?php echo $course['description']; ?></p>
                                 </div>
                                 <div class="card-footer">
                                     <button class="btn btn-primary" type="submit" name="course" value="<?php echo $course['id']; ?>">Build/Edit</button>
                                     <button class="btn btn-success" type="submit" name="preview" value="<?php echo $course['id']; ?>">Preview</button>
                                 </div>
                             </div>
                         </div>
                     <?php } ?>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="../private/assets/js/Sidebar-Menu.js"></script>




 <?php require_once "../private/temp/footer.php"; ?>

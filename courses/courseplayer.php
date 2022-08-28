<?php
$page_name = 'courseplayer';
$page_style = 'webpage';
require_once "../private/init.php";
require_login('../login/student.php');
?>

<?php require_once("../private/temp/headerNest.php"); ?>
<?php require_once("../private/temp/navbarNest.php"); ?>

<aside>
    <div class="container-flex">
        <nav class="navbar navbar-expand d-flex flex-column align-item-center text-center" style="width: 30vw;" id="sidebar">
            <a href="#" class="navbar-brand text-light mt-5 sb-title">
                <div class="font-weight-bold fs-1"><b>Course</b></div>
            </a>
            <ul class="navbar-nav d-flex flex-column mt-5 w-100">
                <li class="nav-item w-100 mb-0 pt-5 pb-5 fs-4 unit" style="border-bottom: 2px solid black;">
                    <a href="#" class="nav-link text-light pl-4">Chapter 1 <i class="bi bi-book fs-2"></i></a>
                </li>
                <li class="nav-item w-100 mb-0 pt-3 pb-3 fs-4 unit-item" style="border-bottom: 2px solid black;">
                    <a href="#" class="nav-link text-light pl-4">video 1 <i  class="bi bi-play-circle fs-2"></i></a>
                </li>
                <li class="nav-item w-100 mb-0 pt-3 pb-3 fs-4 unit-item" style="border-bottom: 2px solid black;">
                    <a href="#" class="nav-link text-light pl-4">video 1 <i  class="bi bi-play-circle fs-2"></i></a>
                </li>
                <li class="nav-item w-100 mb-0 pt-3 pb-3 fs-4 unit-item" style="border-bottom: 2px solid black;">
                    <a href="#" class="nav-link text-light pl-4">video 1 <i  class="bi bi-play-circle fs-2"></i></a>
                </li>
                <li class="nav-item w-100 mb-0 pt-5 pb-5 fs-4 unit" style="border-bottom: 2px solid black;">
                    <a href="#" class="nav-link text-light pl-4">Chapter 1 <i class="bi bi-book fs-2"></i></a>
                </li>
                <li class="nav-item w-100 mb-0 pt-3 pb-3 fs-4 unit-item" style="border-bottom: 2px solid black;">
                    <a href="#" class="nav-link text-light pl-4">video 1 <i  class="bi bi-play-circle fs-2"></i></a>
                </li>
                <li class="nav-item w-100 mb-0 pt-3 pb-3 fs-4 unit-item" style="border-bottom: 2px solid black;">
                    <a href="#" class="nav-link text-light pl-4">video 1 <i  class="bi bi-play-circle fs-2"></i></a>
                </li>
                <li class="nav-item w-100 mb-0 pt-3 pb-3 fs-4 unit-item" style="border-bottom: 2px solid black;">
                    <a href="#" class="nav-link text-light pl-4">video 1 <i  class="bi bi-play-circle fs-2"></i></a>
                </li>

            </ul>

        </nav>
        <div class="d-flex flex-column" id="content" style="margin-left: 30vw; width: 68vw; height: 100vh">
            <div class="embed-responsive embed-responsive-16by9 text-center mt-2 mb-2" style="width: 100%; height: 50%; margin: auto;">
                <iframe class="embed-responsive-item" width="100%" height="100%" src="https://www.youtube.com/embed/jjZHVAzat70" allowfullscreen></iframe>
            </div>
            <div class="erhs-h1 h1 text-center mt-2" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;"><u>Video</u></div>
            <hr style="height: 4px; color: white; opacity: 1;">
            <div class="container justify-content-start">
                <div class="erhs-h2 h2 text-wrap" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Description</div>
                <div class="erhs-p fs-4">testesttest</div>
            </div>
        </div>
    </div>
</aside>









<?php require_once("../private/temp/footer.php"); ?>

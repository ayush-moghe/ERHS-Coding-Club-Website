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
        <nav class="navbar navbar-expand d-flex flex-column align-item-center text-center" style="width: 40vw;" id="sidebar">
            <a href="#" class="navbar-brand text-light mt-5 sb-title">
                <div class="font-weight-bold fs-1"><b>Course</b></div>
            </a>
            <ul class="navbar-nav d-flex flex-column mt-5 w-100">
                <li class="nav-item w-100 mb-0 pt-5 pb-5 fs-4 sb-item">
                    <a href="#" class="nav-link text-light pl-4">Chapter 1</a>
                </li>
                <li class="nav-item w-100 mb-0 pt-5 pb-5 fs-4 sb-item">
                    <a  href="#" class="nav-link text-light pl-4">Chapter 1</a>
                </li>
                <li class="nav-item dropdown w-100 mb-0 pt-5 pb-5 fs-4 sb-item">
                    <a class="nav-link dropdown-toggle text-light pl-4 mb-0" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Chapter 1</a>
                    <ul class="dropdown-menu justify-content-center text-center align-item-center">
                        <li><a class="dropdown-item w-100 mb-0 pt-3 pb-3 fs-5 sb-item text-center" style="margin: auto;" href="#">video 1</a></li>
                        <li><a class="dropdown-item w-100 mb-0 pt-3 pb-3 fs-5 sb-item text-center" style="margin: auto;" href="#">video 2</a></li>
                    </ul>
                </li>
            </ul>

        </nav>
    </div>
</aside>


<div class="flex-column d-flex justify-content-center" id="content" style="margin-left: 40vw; width: 60vw; height: 100vh">
    <div class="erhs-h1 h1 text-center mt-3" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Video</div>
    <div class="embed-responsive embed-responsive-16by9 text-center mt-5 mb-5" style="width: 75%; height: 50%; margin: auto;">
        <iframe class="embed-responsive-item" width="100%" height="100%" src="https://www.youtube.com/embed/jjZHVAzat70" allowfullscreen></iframe>
    </div>
    <div class="erhs-h2 h2 text-center" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Description</div>
    <div class="text-center erhs-p w-75 fs-4">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisi eu consectetur consectetur, nisi nisi consectetur nisi, euismod nisi nisi euismod nisi.
    </div>
</div>






<?php require_once("../private/temp/footer.php"); ?>

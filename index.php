<?php
$page_style = "webpage";
$page_name = "Home";
$section_classes = ["erhs-section", "erhs-section", "erhs-section", "erhs-section"];
$tab = $_GET['tab'] ?? 0;
$section_classes[$tab] = "erhs-section-selected";


?>

<?php require_once "./private/init.php"; ?>
<?php require_once './private/temp/header.php'; ?>
<?php require_once './private/temp/navbar.php'; ?>

<div class="container-fluid text-center">

    <img class="img-fluid" src="./private/assets/img/ERHSCC.png" alt="ERHS Coding Club Logo">
    <div class="h1 erhs-h1 mt-5" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">&lt Welcome to the ERHS Coding Club &gt</div>
    <ul class="pagination pagination-lg justify-content-center mt-5">
        <li class="page-item"><a class="page-link" href="?tab=0#tab1">1</a></li>
        <li class="page-item"><a class="page-link" href="?tab=1#tab2">2</a></li>
        <li class="page-item"><a class="page-link" href="?tab=2#tab3">3</a></li>
        <li class="page-item"><a class="page-link" href="?tab=3#tab4">4</a></li>
    </ul>
    <div class="<?php echo $section_classes[0];?> container mt-5 mb-5" id="tab1">
        <div class="h2 text-center erhs-h2 mt-5" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;" >&lt Description &gt</div>
        <div class="p fs-5 mb-5 text-center erhs-p" style="font-family: 'Courier Prime', monospace;" >In this club, students are given access to a rich variety of courses covering various coding languages. Students
            follow along with the courses and complete substantial projects such as developing video-games or websites.
            Students also gain volunteer hours for completing course content.</div>
    </div>

    <div class="<?php echo $section_classes[1];?> container mt-5 mb-5" id="tab2">
        <div class="h2 text-center erhs-h2 mt-5" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;" >&lt Content &gt</div>
        <div class="p fs-5 mb-5 text-center erhs-p" style="font-family: 'Courier Prime', monospace;" >We teach a variety of real world top programming languages used in today's tech industry such as
            python, html, css, and javascript. We make sure that the content we deliver is valid and professional. We also teach various tech concepts
            and technologies that are essential for getting a tech lead in the competition.</div>
    </div>

    <div class="<?php echo $section_classes[2];?> container mt-5 mb-5" id="tab3">
        <div class="h2 text-center erhs-h2 mt-5" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;" >&lt Why You Should Join &gt</div>
        <div class="p fs-5 mb-5 text-center erhs-p" style="font-family: 'Courier Prime', monospace;" >A main factor colleges look for in students is early passion. This club allows students to do that by giving them
            free content so they can learn about coding and technology. We also make students do impactful projects which they can put on their applications and portfolios. Students
            also get volunteer hours for completing courses and attending events/meetings.</div>
    </div>

    <div class="<?php echo $section_classes[3];?> container mt-5 mb-5" id="tab4">
        <div class="h2 text-center erhs-h2 mt-5" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">&lt Already Know Coding? &gt</div>
        <div class="p fs-5 mb-5 text-center erhs-p" style="font-family: 'Courier Prime', monospace;" >Students that already know coding can sign up to be a course instructor. This allows them to make their own free course
            for other students to learn, such as a programming langauge. These students will get a huge amount of volunteer hours for teaching, and will show leadership and management
            on their portfolio.</div>
    </div>



</div>



<?php require_once './private/temp/footer.php'; ?>

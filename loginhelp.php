<?php
$page_style = 'webpage';
$page_name = 'Login Help';
require_once "./private/init.php";
?>

<?php require_once './private/temp/header.php'; ?>
<?php require_once './private/temp/navbar.php'; ?>

<div class="container-fluid text-center">
    <div class="h1 erhs-h1 mt-5" style="font-family: 'Orbitron', sans-serif; text-shadow: 2px 2px 2px white;">Resetting Password or Username:</div>
    <div class="container mt-5 mb-5">
        <div class="p fs-5 mb-5 text-center erhs-p" style="font-family: 'Courier Prime', monospace;" >
            To reset your password or username if you have forgotten it, you must first email the club president (Ayush Moghe): <b>314361@students.cnusd.k12.ca.us</b>
        </div>
        <div class="p fs-5 mb-5 text-center erhs-p" style="font-family: 'Courier Prime', monospace;" >
            You must email the club president using your school email, so we can verify your account since your student email has your student id.
        </div>
        <div class="p fs-5 mb-5 text-center erhs-p" style="font-family: 'Courier Prime', monospace;" >
            In your email, you must specify the account you want to reset. Once we get your email we will delete your account as soon as possible, so you can re-register using the same student id.
        </div>
        <div class="p fs-5 mb-5 text-center erhs-p" style="font-family: 'Courier Prime', monospace;" >
            Once you have re-registered, you must send us another email with your new username so we can confirm it is you and not someone else who has stolen your student id. Once we confirm we will then restore all your data on the previous account.
        </div>
        <div class="p fs-5 mb-5 text-center erhs-p" style="font-family: 'Courier Prime', monospace;" >
            If someone has made an account with your id, you can email the club president with your student email and we will delete the account.
        </div>
    </div>

    <img class="img-fluid mb-5" src="./private/assets/img/exampleemail.PNG" alt="An example email">




</div>






<?php require_once './private/temp/footer.php'; ?>

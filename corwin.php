<?php
$page_style = "webpage";
$page_name = "Home";
require_once "./private/init.php";
?>

<?php require_once './private/temp/header.php'; ?>


<h1 style='text-shadow: 2px 2px 2px white; color: red;' class="align-center text-center mt-5">Happy Birthday Monkey:</h1>
    <h1 style='text-shadow: 2px 2px 2px white; color: red;' class="align-center text-center mt-5">Scroll Down for reward</h1>
    <img src="./private/assets/img/crw1.jpg" alt="Happy Birthday Monkey" class="img-fluid mt-5 mb-5"/>

    <img src="./private/assets/img/crw2.jpg" alt="Happy Birthday Monkey" class="img-fluid mt-5 mb-5"/>

    <img src="./private/assets/img/crw3.PNG" alt="Happy Birthday Monkey" class="img-fluid mt-5 mb-5"/>

    <h1 style='text-shadow: 2px 2px 2px white; color: red;' class="align-center text-center mt-5">Reward:</h1>

    <button class="btn btn-success" onclick="reward()">Click For Reward</button>

    <script>
        alert("Happy Birthday Monkey");
        function reward() {
            let result = prompt("What is the password?");
            if(result === "africa") {
                alert("Valorant giftcard: RA-VYYRHY4AVBP7MCH8");
            }
        }
    </script>
<?php require_once "./private/temp/footer.php"; ?>
<?php
$page_style = "webpage";
$page_name = "About";
?>
<?php require_once './private/init.php'; ?>
<?php require_once './private/temp/header.php'; ?>
<?php require_once './private/temp/navbar.php'; ?>

<div class="container-fluid text-center">
    <img class="img-fluid text-center" src="private/assets/img/ERHSCC.png" alt="ERHS Coding Club Logo">
    <div class="h1 erhs-h1 mt-5 fs-1 mb-5" style="font-family: 'Manrope', sans-serif; text-shadow: 2px 2px 2px white;">About Us</div>

    <div class="table-responsive-md mb-5 mt-5">
        <table class="table table-hover table-success table-bordered w-75 text-center" style="margin: auto;">
            <thead>
            <tr>
                <th colspan="2" class="h2 mt-5 align-self-center fs-2 pt-2 pb-2 bg-primary mb-0" style="margin: auto; font-family: 'Work Sans', sans-serif; color: lightgrey;">Club Media/Links</th>
            </tr>
            <tr class="table-light">
                <th scope="col">Media</th>
                <th scope="col">Links</th>
            </tr>
            </thead>
            <tbody>
            <tr scope="row">
                <td>Discord</td>
                <td><a target="_blank" href="https://discord.gg/TyDzJdM8Pp">ERHS Coding Club Discord</a></td>
            </tr>
            <tr scope="row">
                <td>YouTube</td>
                <td><a target="_blank" href="https://www.youtube.com/channel/UC6he2jAFjkNmqfwLRRt-xXg">ERHS Coding Club YouTube</a></td>
            </tr>
            </tbody>
        </table>
    </div>


    <hr style="color: white; height: 5px;">
        <div class="table-responsive-md mb-5 mt-5">

            <table class="table table-hover table-success table-bordered w-75 text-center" style="margin: auto;">
                <thead>
                <tr>
                    <th colspan="2" class="h2 mt-5 align-self-center fs-2 pt-2 pb-2 bg-primary mb-0" style="margin: auto; font-family: 'Work Sans', sans-serif; color: lightgrey;"><b>Roles:</b></th>
                </tr>
                <tr class="table-light">
                    <th scope="col">Role</th>
                    <th scope="col">Responsibility</th>
                </tr>
                </thead>
                <tbody>
                    <tr scope="row">
                        <td>President/Founder</td>
                        <td>The creator of the club and club website.</td>
                    </tr>
                    <tr scope="row">
                        <td>Vice President</td>
                        <td>Assist the president with managing the club and completing important club activities.</td>
                    </tr>
                    <tr scope="row">
                        <td>Treasurer</td>
                        <td>In charge of the financial aspect of the club, also manages events.</td>
                    </tr>
                    <tr scope="row">
                        <td>Secretary</td>
                        <td>Help in various spots around the club, and also manage events.</td>
                    </tr>
                    <tr scope="row">
                        <td>Executive Officer</td>
                        <td>In charge of regular officers, help manage events and activities.</td>
                    </tr>
                    <tr scope="row">
                        <td>Historian</td>
                        <td>Keep track of important records and help host activities.</td>
                    </tr>
                </tbody>
            </table>
    </div>


</div>

<?php require_once './private/temp/footer.php'; ?>

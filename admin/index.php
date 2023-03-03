<?php session_start();
if(!isset($_SESSION['user']['username'])){
    header('location: login.php');
}
?>
<?php require('sections/head.php') ?>
        <!-- Navigation-->
        <?php require('sections/menu.php') ?>
        <!-- Header-->
        <?php require('sections/header.php') ?>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h1>Bosh Sahifa</h1>
            </div>
        </section>
        <!-- Footer-->
        <?php require('sections/footer.php') ?>


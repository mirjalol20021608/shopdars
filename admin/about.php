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
         <h1>Biz Haqimizda</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Accusantium debitis distinctio dolores itaque magnam magni quidem sequi.
              Aliquam at blanditiis debitis doloribus eligendi esse explicabo fugiat fugit id illo ipsam itaque,
              laboriosam libero magnam maiores, natus necessitatibus non qui quibusdam quis,
              quisquam quos reiciendis saepe velit voluptatum. Odit, quae sint.</p>
          <p>Telefon: +998 90-075-49-39 <br> info@shop.loc</p>
     </div>
    </section>
    <!-- Footer-->
    <?php require('sections/footer.php') ?>

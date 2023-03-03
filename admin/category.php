<?php session_start();
if(!isset($_SESSION['user']['username'])){
    header('location: login.php');
}
?>
<?php require('sections/head.php') ?>
    <!-- Navigation-->
<?php require('sections/menu.php') ?>
    <!-- Header-->
<?php // require('sections/header.php')?>
<?php include('../dbmysql.php') ?>

<?php
    $category_sql = "SELECT * FROM category";
    $categories = $conn->query($category_sql);
    $categories = $categories->fetch_all(MYSQLI_ASSOC)
?>

<section class="py-5">
    <div class="Container px-4 px-lg-5 mt-5">
        <a href="add-category.php" class="btn btn-primary"">Kategorya qo'shish</a>
        <h1>Kategoriyalar ro'yxati</h1>
      <table class="table">
          <thead>
          <tr>
              <th scope="col">Id</th>
              <th scope="col">Nomi</th>
              <th scope="col">Ota kategoriya</th>
              <th scope="col">Amallar</th>
          </tr>
          </thead>
          <?php foreach ($categories as $category):?>
          <tr>
              <th scope="row"><?= $category['id'];?></th>
              <td><?= $category['name'];?></td>
              <td><?= $category['category_id'];?></td>
              <td>
                  <a href="edit-category.php?id=<?=$category['id'];?>" Class="btn btn-warning">O'zgartirish</a>
                  <a href="delete-category.php?id=<?=$category['id'];?>" Class="btn btn-danger">O'chirish</a>
              </td>
          </tr>
        <?php endforeach;?>
      </table>
    </div>
</section>
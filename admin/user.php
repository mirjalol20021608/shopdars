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
<?php include('dbmysql.php') ?>

<?php
$user_sql = "SELECT * FROM user";
$users = $conn->query($user_sql);
$users = $users->fetch_all(MYSQLI_ASSOC)
?>

<section class="py-5">
    <div class="Container px-4 px-lg-5 mt-5">
        <a href="add-user.php" class="btn btn-primary">Foydalanuvchi qo'shish</a>
        <h1>Foydalanuvchilar ro'yxati</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Ism</th>
                <th scope="col">Familiiya</th>
                <th scope="col">Foydalanuvchi nomi</th>
                <th scope="col">Telefon raqam</th>
                <th scope="col">Email</th>
                <th scope="col">Parol</th>
                <th scope="col">Jinsi</th>
                <th scope="col">Amallar</th>
            </tr>
            </thead>
            <?php foreach ($users as $user):?>
                <tr>
                    <th scope="row"><?= $user['id'];?></th>
                    <td><?= $user['firstname'];?></td>
                    <td><?= $user['lastname'];?></td>
                    <td><?= $user['username'];?></td>
                    <td><?= $user['phone'];?></td>
                    <td><?= $user['email'];?></td>
                    <td><?= $user['password'];?></td>
                    <td><?= $user['gender'];?></td>
                    <td>
                        <a href="edit-user.php?id=<?=$user['id'];?>" Class="btn btn-warning">O'zgartirish</a>
                        <a href="delete-user.php?id=<?=$user['id'];?>" Class="btn btn-danger">O'chirish</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</section>
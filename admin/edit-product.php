<?php session_start();
if (!isset($_SESSION['user']['username'])){
    header('location: login.php');
}
?>

<?php require('sections/head.php'); ?>

<!-- Navigation-->
<?php require('sections/menu.php'); ?>

<!-- Header-->
<?php // require ('sections/header.php'); ?>

<?php include('../dbmysql.php'); ?>

<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $get_product_sql = "SELECT * FROM product WHERE id = {$id}";
    $get_pro = $conn->query($get_product_sql);
    $get_pro = $get_pro->fetch_assoc();
}


if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])
    && isset($_POST['category_id']) && isset($_POST['instock'])
    && isset($_POST['description'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $instock = $_POST['instock'];
    $description = $_POST['description'];

    $update_sql = "UPDATE product SET name = '$name', price = $price, category_id = $category_id, instock = '$instock', description = '$description' WHERE id = $id";

    if($conn->query($update_sql)){
        header( "Location: product.php");
    }
}

$cat_list = "SELECT * FROM product";
$cat_list = $conn->query($cat_list);
$cat_list = $cat_list->fetch_all(MYSQLI_ASSOC);
?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Mahsulotlarni yangilash</h1>
        <form action="edit-product.php" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $get_pro['id'] ?>">
                <label for="name" class="form-label"> Nomi</label>
                <input name="name" value="<?= $get_pro['name'] ?>" type="text" class="form-control" id="name" placeholder="Mahsulot nomi">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Narxi</label>
                <input name="price" value="<?= $get_pro['price'] ?>" type="text" class="form-control" id="price" placeholder="Mahsulot narxi">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label"> Kategoriyasi</label>
                <select class="form-select" name="category_id">
                    <?php  foreach ($cat_list as $cat):?>
                        <?php if ($get_pro['category_id'] == $cat['id']): ?>
                            <option selected value="<?= $cat['id']?>"><?= $cat['name']?></option>
                        <?php else: ?>
                            <option  value="<?= $cat['id']?>"><?= $cat['name']?></option>
                        <?php endif; ?>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <label for="instock" class="form-label"> Miqdori</label>
                <input name="instock" value="<?= $get_pro['instock'] ?>" type="text" class="form-control" id="instock" placeholder="Mahsulot miqdori">
            </div>

            <div class="mb-3">
                <label for="description">Mahsulot haqida</label>

                <textarea id="" name="description" class="form-control" rows="4" cols="50"></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Saqlash">
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php require('sections/footer.php'); ?>




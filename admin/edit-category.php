<?php session_start();
if(!isset($_SESSION['user']['username'])){
    header('location: login.php');
}
?>
<?php require("sections/head.php"); ?>
    <!-- Navigation-->
<?php require("sections/menu.php"); ?>
    <!-- Header-->

<?php require("../dbmysql.php");?>

<?php
   if (isset($_GET['id'])){
       $id = $_GET['id'];
       $get_category_sql ="SELECT * FROM category WHERE id = {$id}";
       $get_cat = $conn->query($get_category_sql);
       $get_cat = $get_cat->fetch_assoc();
   }



if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['category_id'])  ){

    $id = $_POST['id'];
    $name = $_POST['name'];
    if ($_POST['category_id'] != ''){
        $category_id  = $_POST['category_id'];
        $update_sql = "UPDATE category SET name ='$name', category_id = {$category_id} WHERE  id = {$id}";

    }else{
            $update_sql = "UPDATE category SET {$name} WHERE  id = {$id}";
    }

    if($conn->query($update_sql)){
        header("location: category.php");
    }
}

$cat_list = "SELECT * FROM category";
$cat_list = $conn->query($cat_list);
$cat_list = $cat_list->fetch_all(MYSQLI_ASSOC);


?>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h1>Kategoriy yaratish</h1>
            <div class="container">
            <form action="edit-category.php" method="post">
                <div class="mb-3">

                <input type="hidden" name="id" value="<?=$get_cat['id'] ?>">
                    <label for="Name" class="form-label">Kategoria nomi</label>
                    <input name="name" type="text" value="<?=$get_cat['name'] ?>" class="form-control" id="name" placeholder="Kategoria nomi">
                </div>
                <div class="mb-3">
                </div>
                <div class="mb3">
                    <select class="form-select" name="category_id">
                        <option value="">Kategoriya qo'shing</option>

                        <?php foreach ($cat_list as $cat): ?>
                        <?php if ($get_cat['category_id'] == $cat['id']):?>
                            <option selected value="<?=$cat['id']?>"><?=$cat['name']?></option>
                             <?php else: ?>
                             <option  value="<?=$cat['id']?>"><?=$cat['name']?></option>
                        <?php endif; ?>
                      <?php endforeach;?>
                    </select>
                    <br>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Saqlash">
                </div>
            </form>
            </div>
    </section>
<?php require("sections/footer.php");?>
<?php session_start();?>
<?php require('sections/head.php');?>
<?php include('../dbmysql.php');?>


<?php

    if(isset($_POST['login']) && $_POST['login'] != '' && isset($_POST['password'])){
     $login = $_POST['login'];
     $password = $_POST['password'];
     $login_sql = "SELECT * FROM user WHERE username = '$login' AND password = '$password'";
     $result = $conn->query($login_sql);
     $user = $result->fetch_assoc();

     if(!is_null($user)){
         $_SESSION['user']['username'] = $login;
         $_SESSION['user']['id'] = $user['id'];
         header('location: index.php');
     }else{
         $error = 'login yoki parol xato kiritildi';
     }
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="offset-3 col-6">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="login">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="parol">
                </div>
                <div class="form-group">
                    <label class="form-check-label"><input type="checkbox">Eslab qol</label>
                </div>
                <button type="submit" class="btn btn-primary submit-btn">Kirish</button>
            </form>
        </div>
    </div>
</div>

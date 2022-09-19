<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАШ САЙТ</title>
    <link rel="stylesheet" href="src/style.css">

        
</head>
<body>

<div class="page">
<!--header -->
    <div class="header">
        
        <?php
        //проверяем авторизован ли пользователь
        if(!isset($_SESSION['login'])):?>
        <!-- если не авторизован, выводим ссылки на регистрацию и авторизацию  -->  
           
             <div>
                <a href="reg.php">Регистрация</a>
             </div>
             <div>
                <a href="auth.php">Авторизация</a>
             </div>
        <?php else: ?>
         <!-- если авторизован, то ссылку на выход-->   
            <div>
                <p>Добрый день, <?=$_SESSION['login']?>   <a href="logout.php">Выход</a></p>
                
             </div>
        <?php endif;?>     
                  
    </div>
    <!--header -->
    

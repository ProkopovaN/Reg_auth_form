<?php
include 'app/database/db.php';

$errMes=[];

try{

if($_SERVER['REQUEST_METHOD']==='POST'){

    var_dump($_POST);
    $login=trim($_POST['login']);
    $email=trim($_POST['email']);
    $passF=trim($_POST['password_first']);
    $passS=trim($_POST['password_second']);
    $captcha=trim($_POST['captcha']);

    if($login===''|| $email===''|| $passF===''|| $captcha===''){
       array_push($errMes, 'не все поля заполнены') ;  
    }elseif(mb_strlen($login, 'UTF8')<3){
        array_push($errMes, 'логин должен быть больше 3 символов');

    }elseif(mb_strlen($passF, 'UTF8')<8){
        array_push($errMes, 'пароль должен быть больше 8 символов');

    }elseif (!preg_match('/^[a-zA-Z0-9]+$/', $login)){
        array_push($errMes, 'логин должен содержать цифры и буквы латинского алфавита');
    }elseif (!preg_match('/^[a-zA-Z0-9]+$/', $passF)){
        array_push($errMes, 'пароль должен содержать цифры и буквы латинского алфавита');
    }
    
    
    
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errMes, 'неверно указан адрес эл почты');
    }elseif($passF!==$passS){
        array_push($errMes, 'пароли не совпадают');
    }
    else{
        echo 'ok';
          $sql='SELECT * FROM user WHERE login=:login';
          $stmt=$pdo->prepare($sql);
          $stmt->execute(array('login'=>$login));
          $array=$stmt->fetch(PDO::FETCH_ASSOC);
          echo '<pre>';
          var_dump($array);
          echo '<pre>';
            
          if($array){
            array_push($errMes, 'пользователь с таким логином уже зарегистрирован');

          }else{
            $pass=password_hash($passF, PASSWORD_DEFAULT);
            
            $sql='INSERT INTO user (login,  pass_hash, email)  
            VALUES ( :login, :pass_hash, :email );';
           var_dump($sql);
   
           $param=[
            'login'=>$login,
            'pass_hash'=>$pass,
            'email'=>$email, ];
           
           $row=$pdo ->prepare($sql);
           $row->execute($param);
            if($row){
                $_SESSION['login']=$login;
                header('Location: index.php');

            }else{
                header('Location: /reg.php');
            }
         }
       }
}else{
    $login='';
    $email='';
}
}catch(PDOException $e){
    echo $e->getMessage();
}


?>

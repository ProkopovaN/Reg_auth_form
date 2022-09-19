<?php

require 'header.php';
require 'controllers/register.php';

?>
    <div>
        <?php foreach($errMes as $error):?>
   <p><?=$error?></p>
        <?php endforeach;?>    
    </div>
   <h2>Регистрация</h2>
   <div class="form_register">   
   <form action="reg.php" method="post" name="form_register">
         <table>
            <tr>
                <td>
                    Login:
                </td>
                <td>
                    <input type="text" name="login" required="required" value="<?=$_POST['login']?>">
                </td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
                <td>
                    <input type="text" name="email" value="<?=$_POST['email']?>">
                </td>
            </tr>
            <tr>
                <td>
                    Password:
                </td>
                <td>
                    <input type="password" name="password_first" >
                </td>
            </tr>
            <tr>
                <td>
                    Password:
                </td>
                <td>
                    <input type="password" name="password_second" >
                </td>
            </tr>
            <tr>
                <td>
                    Введите капчу:
                </td>
                <td>
                    <img src="captcha.php" alt="captcha"><br>
                    <input type="text" name="captcha" >
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btn_register" value="register"">
                </td>
            </tr>

         </table>
   </form>
</div>
<?php
require 'footer.php';
?>
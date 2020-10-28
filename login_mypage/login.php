<?php
session_start();

if (isset($_SESSION['id'])){
    header("Location:mypage.php");
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログインページ</title>
  <link rel="stylesheet" type="text/css" href="login3.css">
</head>
    
    <body>
        <header>
        <img src="4eachblog_logo.jpg">
        </header> 

        <main>
        <form action="mypage.php" method="POST">
            <div class="form_contents">
                
                <?php if (isset($err['mail'])) : ?>
                <h3><?php echo $err['mail']; ?></h3>
                <?php endif; ?>
            
                <div class="mail">
                <label>メールアドレス</label> <br>
                    <input type="text" class="formbox" size="40" value="<?php 
                                                                        if (isset($_COOKIE['mail'])){
                                                                            echo $_COOKIE['mail'];
                                                                        } ?>" name="mail">
                </div>
                
                <div class="password">
                    <label>パスワード</label> <br>
                    <input type="password" class="formbox" size="40" value="<?php 
                                                                        if (isset($_COOKIE['password'])){
                                                                            echo $_COOKIE['password'];
                                                                        } ?>" name="password">
                </div>
                
                <div class="login_check">
                    <label><input type="checkbox" class="check" size="40" name="login_keep" vlue="login_keep"
                                <?php 
                                  if (isset($_SESSION['login_keep'])){
                                        echo "checked = 'checked'";
                                        }
                                    ?>>ログイン状態を保持する</label>
                </div>
                <div class="login">
                    <input type="submit"　name="login" class="submit_button" size="35" value="ログイン">
                    </div>
                </div>
            </form>
        </main>
        
        <footer>
        ©︎2018 internNouse.inc.All rights reservd
        </footer>
        
        <script>
        function confirm password(confirm){
            var input1c= password.value;
            var input2 = confirm.value;
            if (input1 != input2) {
                confirm.setCustom validity("パスワードが一致しません。");
            }else {
              onfirm.setCustom validity(");  
            }
        }
        </script>
    
    </body>
    
</html>
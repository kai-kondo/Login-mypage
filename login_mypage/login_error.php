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
  <link rel="stylesheet" type="text/css" href="login_error2.css">
</head>
    
    <body>
        <header>
        <img src="4eachblog_logo.jpg">
        </header> 

        <main>
        <form action="mypage.php" method="POST">
            <div class="form_contents">
                
            <div class="error_massege">メールまたはパスワードが間違っています</div>
                
                <div class="mail">
                <label>メールアドレス</label> <br>
                    <input type="text" class="formbox" size="40" value="" name="mail">
                </div>
                
                <div class="password">
                    <label>パスワード</label> <br>
                    <input type="password" class="formbox" size="40" value="" name="password">
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
        
<?php 

mb_internal_encoding('utf8');
//セッションスタート
session_start();



?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <title>マイページ編集</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu3.css">
    </head>
    
    <body>
        <header>
        <img src="4eachblog_logo.jpg">
        <div class="logout"><a href="log_out.php">ログアウト</a></div>
        </header> 
    <main>
        <form action="mypage_update.php" method="POST">
            <div class="form-contents">
            <h2>会員情報</h2>
                <div class="profile_pic">
                    <img src="<?php echo $_SESSION['picture']; ?>">
                </div>
                
                <div class="info">
                
                <p> 氏名: <input type="text" size="30" name="name" value="<?php echo $_SESSION['name']; ?>"></p>
                    
                <p>メールアドレス: <input type="text" size="30" name="mail"　value="<?php echo $_SESSION['mail']; ?>"></p>
                    
                <p>パスワード:　<input type="text" size="30" name="password"　value="<?php echo $_SESSION['password']; ?>"> </p>
                
                </div>
                
                <div class="comments">
                   <textarea rows="5" cols="107" name="comments"><?php echo $_SESSION['comments']; ?> </textarea> 
                
                    </div>
                
                    <div class="hensyubutton">
                        <input type="submit" name="hensyu" class="hensyu" value="編集する">
                        </div>
                    
            </div>
        </form>
            
        </main>
        <footer>
        ©︎2018 internNouse.inc.All rights reservd
        </footer>
    </body>
</html>

    
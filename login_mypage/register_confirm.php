<?php
mb_internal_encoding("utf8");

//保存されたファイル名で画像ファイルを取得。
$temp_pic_name = $_FILES['picture']['tmp_name'];

$original_pic_name =$_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

//仮保存のファイル名を、imgeフォルダに元のファイルを移動させる
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="register_confirm2.css">
    </head>
    
    <body>
        <header>
        <img src="4eachblog_logo.jpg">
        </header> 
    <main>
        <div class="confirm">
            <div class="form-contents">
            <h2>会員登録の確認</h2>
                <p>こちらの内容でよろしいでしょうか？</p>
                <div class="name">
                氏名　<?php echo $_POST['name'];?>
                </div>
                <div class="mail">
                メールアドレス <?php echo $_POST['mail'];?> 
                
                </div>
                
                <div class="password">
                    パスワード <?php echo $_POST['password'];?> 
                </div>
                
                
                <div class="picture">
                プロフィール写真 <?php echo $_FILES['picture']['name'];?> 
                    
                </div>
                <div class="comments">
                    コメント　<?php echo $_POST['comments'];?> 
                
                    </div>
                
                <div class="button">
                    <div class="modorubotan">
                    <a href="register.php">戻って修正する</a>
                    </div>
                    
                    <div class="submit">
                    <form action="register_insert.php" method="POST">  
                    <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
                    <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                    <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                    <input type="hidden" value="<?php echo $path_filename; ?>" name="path_filename">
                    <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
                    <input type="submit" class="submit_button" value="登録する"/>
                    </form>
                        
                    </div>
                
                </div>
                
            </div>
                
                
            </div>
        </main>
        <footer>
        ©︎2018 internNouse.inc.All rights reservd
        </footer>
    </body>
</html>

    
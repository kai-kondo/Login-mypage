<?php

mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){
    

try{
    //try catch文、dbに接続できなければエラ〜メッセージを表示
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
}catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスできません。<br> しばらくしてから再度ログインしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );
}

//プリペアード文で型を作る
$stmt = $pdo->prepare("select * from login_mypage where mail = ? && password =  ?");

$stmt->bindValue(1,$_POST['mail']);
$stmt->bindValue(2,$_POST['password']);

$stmt->execute();

//データベース切断
$pdo= NULL;

//while文　データ取得　session代入
while ($row=$stmt->fetch()) {
$_SESSION['id']=$row['id'];
$_SESSION['name']=$row['name'];
$_SESSION['mail']=$row['mail'];
$_SESSION['password']=$row['password'];
$_SESSION['picture']=$row['picture'];
$_SESSION['comments']=$row['comments'];
}

if (empty($_SESSION['id'])) {
 header("Location:login_error.php");
}

if (!empty($_POST['login_keep'])){
    $_SESSION['login_keep']=$_POST['login_keep'];
}
}

if (!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])) {
    setcookie('mail',$_SESSION['mail'],time()+60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*24*7);
    setcookie('login_keep',$_SESSION['login_keep'],time()+60*24*7);
}else if (empty($_SESSION['login_keep'])) {
  setcookie('mail','',time()-1);
  setcookie('password','',time()-1);
    setcookie('login_keep','',time()-1);  
}


?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage4.css">
    </head>
    
    <body>
        <header>
        <img src="4eachblog_logo.jpg">
        <div class="logout"><a href="log_out.php">ログアウト</a></div>
        </header> 
    <main>
        <div class="box">
            <h2>会員情報</h2>
                <div class="hello">
                <?php echo "こんにちは！".$_SESSION['name']."さん";?>
                </div>
                
                <div class="profile_pic">
                    <img src="<?php echo $_SESSION['picture'];?> ">
                </div>
                
                <div class="info">
                <p>氏名:　<?php echo $_SESSION['name'];?></p>
                <p>メールアドレス: <?php echo $_SESSION['mail'];?> </p>
                <p>パスワード: <?php echo $_SESSION['password'];?> </p>
                
                </div>
                
                <div class="comments">
                    <?php echo $_SESSION['comments'];?> 
                
                    </div>
                <form action="mypage_hensyu.php" method="POST" class="form_mypage">
                 <input type="hidden" value="<?php echo rand(1.10); ?>" name="form_mypage">
                
                <div class="button">
                    <a href="mypage_hensyu.php">編集する</a>
                </div>
                </form>
                
            </div>
        </main>
        <footer>
        ©︎2018 internNouse.inc.All rights reservd
        </footer>
    </body>
</html>

    
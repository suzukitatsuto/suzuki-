<!DOCTYPE html>
<html lang="ja">
<head>
       <meta charset="UTF-8">
       <title>mission_3-4</title>
</head>
<body>
<?php
    /*$pass = ($_POST["pass"]);
    $namae= ($_POST["namae"]);
    $commentphp = ($_POST["comment"]);
    $date = date("Y年m月d日 H:i:s");*/
    //データベースへの接続
    $dsn = 'データベース名';
	$user = 'ユーザー名';
	$password = 'パスワード';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));$sql ='SHOW CREATE TABLE tbtest';
    //データを入力
    $sql = $pdo -> prepare("INSERT INTO suzuki (name, comment,date) VALUES (:name, :comment, :date)");
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	$sql -> bindParam(':date', $date, PDO::PARAM_STR);
	if(isset($_POST["namae"],$_POST["comment"])){
	    $namaephp=$_POST["namae"];
	    $commentphp=$_POST["comment"];
	    $comment =$commentphp;
     	$name =$namaephp;
	    $date = date("Y年m月d日 H:i:s");
     	$sql -> execute();
	}else{
	}
    //削除処理  
   if(isset($_POST['delete'])){
       $delnum=$_POST['delete'];
   
    $id = $delnum;
	$sql = 'delete from suzuki where id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
   }else{
   }
    
   //編集処理
    if(isset($_POST['edit'])) {
        $edit = $_POST['edit'];
        $ednamae =$_POST['ednamae'];
        $edcomment =$_POST['edcomment'];
    
     $id =$edit  ;
     $name =$ednamae;
     $comment =$edcomment;
     $date = date("Y年m月d日 H:i:s");
     //変更したい名前、変更したいコメントは自分で決めること
    $sql = $pdo -> prepare("INSERT INTO suzuki (date) VALUES (:date)");
	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
	$sql = 'UPDATE suzuki SET name=:name,comment=:comment,date=:date WHERE id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
	$stmt->execute();  
    }else{
    }
?>

    <!--変数をvalueに入れて投稿フォーム記述-->
    <form action="" method="post">
        <input type="text" name="namae">
        <input type="text" name="comment">
         <input type="text" name="pass" >
        <input type="submit" name="sousin">
    </form>

    
    <!-- 削除フォームと編集フォーム-->
    <form action="" method="post">
        <input type="text" name="delete" placeholder="削除">
        <input type="submit" name="" value="削除">
        
    </form>

    <form action="" method="post">
        <input type="text" name="ednamae"value="名前">
        <input type="text" name="edcomment"value"コメント">
        <input type="text" name="edit" placeholder="編集">
        <input type="submit" name="" value="編集">
        
    </form>
   
    


</body>
</html>
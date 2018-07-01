<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>DB検索のサンプル </title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116131680-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116131680-2');
</script>
</head>
<body >
<?php
// DB接続情報です
$dsn = 'mysql:host=sv3.php.starfree.ne.jp;dbname=kirara123_mysql;charset=utf8mb4';
$username = 'kirara123_wp1';
$password = 'kirara0210';

// try-catch。エラー発生時はcatch(36行目)のロジックが実行される
try{
	// データベースへの接続を表すPDOインスタンスを生成
	$pdo = new PDO($dsn,$username,$password);

	// SQL文
	$sql = 'select * from fish';

	// データを取得
	$stmt = $pdo->query($sql);
	$stmt -> execute();

	// 1行ずつ取得
	while($rec = $stmt->fetch(PDO::FETCH_ASSOC)){

		// テーブルの項目名を指定して値を表示
		print $rec['id'];
		print $rec['name'];
		print $rec['romaji'];
		print '<br>';
	}

}catch (PDOException $e) {
	// UTF8に文字エンコーディングを変換します
	echo mb_convert_encoding($e->getMessage(),'UTF-8','SJIS-win');
}
// 接続を閉じる
$pdo = null;
?>
</div>
</body>
</html>
<?php
  $dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_test") or die("Error Error");

  $sql = "
  SELECT *
  FROM article AS A
  ORDER BY A.id DESC 
  ";

  $rs = mysqli_query($dbConn, $sql);

  $articles = [];

  while($article = mysqli_fetch_assoc($rs)){
    $articles[] = $article;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시물 리스트</title>
</head>
<body>
  <h1>게시물 리스트</h1>
  <hr>
  
  <?php foreach($articles as $article) {?>
    <?php
      $detailUri = "detail.php?id=${article['id']}";  
    ?>
    <a href="<?=$detailUri?>">번호 : <?=$article['id']?></a><br>
    등록일 : <?=$article['regDate']?><br>
    <a href="<?=$detailUri?>">제목 : <?=$article['title']?></a><br>
    <hr>
  <?php }?>

</body>
</html>
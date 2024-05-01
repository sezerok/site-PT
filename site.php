<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Харахорин В.Д.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 auth">
        <?php
        if (!isset($_COOKIE['User'])){
        ?>    
            <h1>Авторизируйтесь!</h1>
            <a href="/site-PT/registration.php">Зарегистрируйтесь</a> или <a href="/site-PT/login.php">Войдите</a>!
        <?php
        } else{
        ?>
            <h1>Ваши посты</h1>
            <?php
            $link = mysqli_connect('db', 'root', 'root', 'first');

            $sql = "SELECT * FROM posts";
            $res = mysqli_query($link, $sql);

            if (mysqli_num_rows($res) >  0) {
                while ($post = mysqli_fetch_array($res)) {
                    echo "<a href='/site-PT/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a><br>";
                }
               } else {
                    echo "Записей пока нет";
               }
        }
        ?>
        </div>
    </div>
</div>
</body>

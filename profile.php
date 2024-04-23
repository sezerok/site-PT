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
    <div class="container nav_bar">
        <div class="row">
            <div class="col-3">
                <div class="logo"></div>
            </div>
            <div class="col-9">
                <div class="nav_text">salam vsem!</div>
            </div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2>
                        Харахорин Всеволод Дмитриевич это who?
                        Стажёр pt.
                    </h2>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="img_size"></div>
                        <div class="row"><p class="title_photo"> Харахорин В.Д </p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class=" button_js col-12">
                <button id="myButton">Жмякай!</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-12 prof">
                <h1>Привет, <?php echo $_COOKIE['User']?></h1>
            </div>
            <form class="form_align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                <input type="text" class="form-control" cols="30" name="title" placeholder="заголовок">
                <textarea name="text" class="form-control" cols="30" rows="10" placeholder="введите тект поста"></textarea>
                <button type="submit" class="btn_reg" name="submit">сохранить</button>
                <input type="file" name="file" /><br>
            </form>
                <!-- <div class="col-12 post">
                        <input type="text" class="form-control" cols="30" name="title" placeholder="заголовок">
                </div>
                <div class="col-12 post">
                        <textarea name="text" class="form-control" cols="30" rows="10" placeholder="введите тект поста"></textarea>
                </div>
                <div class="col-12 post">
                        <button type="submit" class="btn_reg" name="submit">сохранить</button>
                </div> -->

        </div>
    </div>
</body>
</html>
<?php
    require_once('db.php');
    
    $link = mysqli_connect('127.0.0.1', 'root', 'root', 'first');
    
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $main_text = $_POST['text'];
        if (!$title || !$main_text) die ("Заполните все поля");
        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
        if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
    }
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

?>
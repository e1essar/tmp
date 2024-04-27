<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Валиулин И.Р.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/aniron" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container nav_bar">
        <div class="row">
            <div class="col-3 nav_logo"></div>
            <div class="col-9">
                <div class="nav_text">Информация</div>
            </div>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="col-12">
                <h1>Арагорн II Элессар</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <p>А́рагорн (синд. Aragorn), коронованный как Эле́ссар (кв. Elessar) — человек-дунадан, 
                    сын Араторна II и Гильраэн, шестнадцатый вождь Дунэдайн Севера, прямой потомок Исильдура, 
                    старшего сына Элендиля и последнего Верховного короля Дунэдайн, 
                    и единственный законный наследник трона Гондора.</p>
                <p>
                    Третий и последний в истории Средиземья человек, вступивший в брак с эльфийской девой 
                    — его женой и королевой стала Арвен Ундомиэль, дочь Эльронда Полуэльфа.
                </p>
                <p>
                    Арагорн стал величайшим из людей своей эпохи — он возглавлял Людей Запада в войне 
                    против Тёмного Властелина Саурона и помог уничтожить Единое Кольцо Власти 
                    (был одним из девяти членов Братства Кольца), а после победы воссоединил 
                    королевства Арнор и Гондор в единое государство.
                </p>
                <div class="container">
                    <div class="row">
                        <div class="button_js col-12">
                            <button id="myButton">Click me</button>
                            <p id="demo"></p>
                        </div> 
                    </div>
                </div>
                
            </div>
            <div class="col-4">
                <div class="photo_info">
                    <div class="my_photo"></div>
                    <div class="info">
                        <p><strong>Титулы:</strong> Вождь Дунэдайн Севера
                            Верховный король Гондора и Арнора</p>
                        <p><strong>Прозвища:</strong> Дунадан, Странник, Элессар, Эстель</p>
                        <p><strong>Время правления:</strong> 2933 — 3019 Т. Э.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container post">
    <div class="row">
        <div class="col-12">
            <h2 class="hello">
                Hello, <?php echo $_COOKIE['User']; ?>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Header of your post">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="text" rows="5" placeholder="Enter text for your post..."></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="file" /><br>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="submit">Save post!</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/button.js"></script>
</body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('db', 'root', '123', 'first');

if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");

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

}

?>
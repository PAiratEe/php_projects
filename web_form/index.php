<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebForm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center>
    <h1 align='center'>Добро пожаловать в генератор по созданию веб-страниц</h1>
<?php
function printForm() {
    print <<<here
    <form method="post">
        <table>
            <tr>
                <th>Какой будет заголовок будущей страницы?</th>
                <th>
                    <center>
                        <input class="hdr" type="text" name="header" value="">
                    </center>
                </th>
            </tr>
            <tr>
                <th>Выберите цвет фона</th>
                <th> 
                    <center>
                        <select name="bgcolor">
                            <option value="white" selected>Выберите...</option>
                            <option value="red">Красный</option>
                            <option value="orange">Оранжевый</option>
                            <option value="yellow">Желтый</option>
                            <option value="green">Зеленый</option>
                            <option value="lightblue">Голубой</option>
                            <option value="blue">Синий</option>
                            <option value="purple">Фиолетовый</option>
                            <option value="black">Черный</option>
                            <option value="gray">Серый</option>
                        </select>
                    </center>
                </th>
            </tr>
            <tr>
                <th>А теперь цвет шрифта</th>
                <th>
                    <center>
                        <select name="fontcolor">
                            <option value="black" selected>Выберите...</option>
                            <option value="red">Красный</option>
                            <option value="orange">Оранжевый</option>
                            <option value="yellow">Желтый</option>
                            <option value="green">Зеленый</option>
                            <option value="lightblue">Голубой</option>
                            <option value="blue">Синий</option>
                            <option value="purple">Фиолетовый</option>
                            <option value="white">Белый</option>
                            <option value="gray">Серый</option>
                        </select>
                    </center>
                </th>            
            </tr>
            <tr>
                <th>И с размером определиться не помешало бы</th>
                <th>
                    <center>
                        <input class="hdr" type="text" name="size" value="">
                    </center>
                </th>
            </tr>
            <tr>
                <th>И, наконец, содержание вашей страницы</th>
                <th>
                    <center>
                        <textarea cols="35" rows="10" name="txt"></textarea>
                    </center>
                </th>
            </tr>
        </table>
        <center>
            <input class="create" type="submit" value="Создать">
        </center>
    </form>
here;
}

function printPage($header, $bgcolor, $fontcolor, $size, $txt) {
    print <<<here
    <style>
    body {color: $fontcolor; background: $bgcolor; text-shadow: 0px 0px 0px; font-style: normal; font-family: 
    "Times New Roman", serif; font-size: $size px;}
    </style>
    <h1>$header</h1>
    <pre>$txt</pre>
here;
}

if (empty($_POST["header"]))
    printForm();
else if (empty($_POST["bgcolor"]))
    printForm();
else if (empty($_POST["fontcolor"]))
    printForm();
else if (empty($_POST["size"]))
    printForm();
else if (empty($_POST["txt"]))
    printForm();
else {
    $header = $_POST["header"];
    $bgcolor = $_POST["bgcolor"];
    $fontcolor = $_POST["fontcolor"];
    $size = $_POST["size"];
    $txt = $_POST["txt"];
    printPage($header, $bgcolor, $fontcolor, $size, $txt);
}
?>
</center>
</body>
</html>

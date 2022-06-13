<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<h1>Добро пожаловать в гостевую книгу</h1>
<h3>Оставить свой отзыв можно здесь</h3>
<?php
    function printForm() {
        print<<<here
<form method="post">
    <table border="1">
        <tr>
            <td>Имя</td>
            <td><input type="text" size="20" name="author"</td>
        </tr>
        <tr>
            <td>Тема</td>
            <td><input type="text" size="20" name="theme"</td>
        </tr>
        <tr>
            <td>Комментарий</td>
            <td><textarea name="comment" cols="45" rows="10"></textarea></td>
        </tr>
    </table>
    <input class="sub" type="submit" name="Отправить">
</form>
here;
    }

if (empty($_POST["author"])) {
    printForm();
}
else if (empty($_POST["theme"])) {
    printForm();
}
else if (empty($_POST["comment"])) {
    printForm();
}
else {
    $author = $_POST["author"];
    $theme = $_POST["theme"];
    $comment = $_POST["comment"];
    fileWrite($author, $theme, $comment);
    fileRead();
}

    function fileWrite($author, $theme, $comment) {
        $fw = fopen("data.txt", "a");
        fwrite($fw, "\r\n" . $author);
        fwrite($fw, "\r\n" . $theme);
        fwrite($fw, "\r\n" . $comment);
        fclose($fw);
    }

    function fileRead() {
        $fr = fopen("data.txt", "r");
        $flag = 0;
        $line = fgets($fr);
        if (!feof($fr)) {
            print<<<here
<table border="1px" width="50%">
    <tr>
        <td>Имя</td>
        <td>Тема</td>
        <td>Комментарий</td>
    </tr>
here;
            $flag = 1;
        }

        while (!feof($fr)) {
            print "<tr>";
            for ($i = 0; $i < 3; $i++) {
                $line = fgets($fr);
                print "<td>" . $line . "</td>";
            }
            print "</tr>";
        }

        if ($flag == 1) {
            print "</table>";
        }
        fclose($fr);
    }
?>
</center>
</body>
</html>


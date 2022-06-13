<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Города</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center>
<h1>Сыграем в города?</h1>
<?php
$cities = array("москва", "санкт-петербург", "новосибирск", "екатеринбург", "казань",
                "нью-йорк", "лос-анджелес", "чикаго", "хьюстон", "филадельфия",
                "киев", "харьков", "одесса", "днепр", "донецк",
                "лондон", "бирмингем", "лидс", "шеффилд", "манчестер",
                "париж", "марсель", "лион", "тулуза", "ницца", "воркута", "ашхабад");

function printForm($oppo) {
    print<<<here
    <form method="post">
        <input name="town" type="text" value="">
        <input name="oppo" type="text" value="$oppo"><br>
        <input class="make" type="submit" value="Сделать ход">        
    </form>
here;
}

function game($cities, $town) {
    $tmp = 0;
    for ($i = 0; $i < count($cities); $i++) {
        if ($town == $cities[$i]) {
            $tmp++;
            for ($j = 0; $j < count($cities); $j++) {
                if (mb_substr($town,mb_strlen($town,'utf-8') - 1,1) == 'ь') {
                    if (mb_substr($town,mb_strlen($town,'utf-8') - 2,1) == mb_substr($cities[$j],0,1)) {
                        if (mb_substr($cities[$j],mb_strlen($town,'utf-8') - 1,1) == 'ь') {
                            $x = mb_substr($cities[$j], mb_strlen($cities[$j], 'utf-8') - 2, 1);
                            print<<<here
                                <p>Вам на $x</p>
                            here;
                            printForm($cities[$j]);
                            break;
                        }
                        else {
                            $x = mb_substr($cities[$j], mb_strlen($cities[$j], 'utf-8') - 1, 1);
                            print<<<here
                                <p>Вам на $x</p>
                            here;
                            printForm($cities[$j]);
                            break;
                        }
                    }
                }
                else {
                    if (mb_substr($town,mb_strlen($town,'utf-8') - 1,1) == mb_substr($cities[$j],0,1)) {
                        if (mb_substr($cities[$j],mb_strlen($town,'utf-8') - 1,1) == 'ь') {
                            $x = mb_substr($cities[$j], mb_strlen($cities[$j], 'utf-8') - 2, 1);
                            print<<<here
                                <p>Вам на $x</p>
                            here;
                            printForm($cities[$j]);
                            break;
                        }
                        else {
                            $x = mb_substr($cities[$j], mb_strlen($cities[$j], 'utf-8') - 1, 1);
                            print<<<here
                                <p>Вам на $x</p>
                            here;
                            printForm($cities[$j]);
                            break;
                        }
                    }
                }
            }
        }
    }
    if ($tmp == 0)
        print "Автор не знает ничего про базы данных. Поэтому такого города нет в моей базе!";
}

if (empty($_POST["town"]))
    printForm("");
else {
    $town = $_POST["town"];
    game($cities, $town);
}
?>
</center>
</body>
</html>

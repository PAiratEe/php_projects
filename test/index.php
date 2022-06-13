<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TEST</title>
</head>
<body>
<center>
<?php
    $cnct = mysqli_connect('localhost', 'root', 'root', 'MyDB');
    mysqli_select_db($cnct, 'MyDB');
    $sql = "select * from Numbers where features>='F'";
    $res = mysqli_query($cnct, $sql);
    print "<table border=1>\n";
    print "<tr>\n";
    while ($field = mysqli_fetch_field($res)) {
        print "<th>$field->name</th>\n";
    }
    print "</tr>\n";
    while ($row = mysqli_fetch_assoc($res)) {
        print "<tr>\n";
        foreach($row as $col=>$val){
            print "<td>$val</td>\n";
        }
        print "<tr>\n";
    }
    print "</table>";
?>
</center>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Story</title>
    <link rel="stylesheet" href="style.css">
</head>
<body bgcolor="#deb887">
<center>
<h1>My story</h1>
<img src="book.jpg" width="50%">
<?php
$pronoun = $_REQUEST["pronoun"];
$race = $_REQUEST["race"];
$lang = $_REQUEST["lang"];
$celeb = $_REQUEST["celeb"];
print <<<here
<div>
    Да будь $pronoun<br>
    и $race преклонных годов,<br>
    и то,<br>
    без унынья и лени,<br>
    я $lang бы выучил<br>
    только за то,<br>
    что им<br>
    разговаривал $celeb.
</div>
here;
phpinfo();
?>
</center>
</body>
</html>

<html lang="de">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
</head>
<body id="grad">
<div class="nav">
    <a href="index.php">Home  </a>|<a href="form.php"> New Post </a>
</div>


<?php
require "backend.php";

$error = "unexpected expcetion:";
echo "<div class='content'>
    <div class='welcome'>
        <div id='title'>An unexpected Error has occurred</div>
    </div>

</div>"

?>
<footer class="nav">
    <a href="https://github.com/AronBA">GitHub</a>
</footer>
</body>
</html>
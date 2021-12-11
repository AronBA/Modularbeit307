<html lang="de">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
</head>
<body id="grad">
<div class="nav">
    <a href="index.php">Home  </a>|<a href="form.php"> New Post </a>
</div>
<div class="content">
    <div class="welcome">
        <div id="title">NEW POST</div>
        <div id="text">create a new Post!</div>
    </div>

    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <titel class="formitile" required >Titel:</titel>
            <input type="text" class="intitel" maxlength="80" name="Titel" required> <br>
            <titel class="formautor" required >Autor:</titel>
            <input type="text" class="inautor" maxlength="50" name="Autor" required><br>
            <textarea name="content" maxlength="2000" class="incontent"></textarea><br>
            select image
            <input type="file" class="infile" name="picture" accept=".jpeg, .png, .jpg, .gif" required><br>
            <input type="submit" class="insubmit" name="submit" value="Post!">
        </form>
    </div>
</div>
<footer class="nav">
<a href="https://github.com/AronBA">GitHub</a>
</footer>
<?php
require "backend.php";
if(isset($_POST['submit'])) {
    $titel = $_POST["Titel"];
    $autor = $_POST["Autor"];
    $text = $_POST["content"];
    $img = $_FILES["picture"]["name"];
    $tmp_img = $_FILES["picture"]["tmp_name"];
    $imgsize = $_FILES["picture"]["size"];

    if (strlen($titel) > 80 && isset($titel) && !empty($titel)
        || (strlen($autor) > 50) && isset($autor) && !empty($autor)
        || (strlen($text) > 2000) && isset($text) && !empty($text)
        || $imgsize > 500000 && isset($img)  ) {
        redirect("error.php");
    }
    else {
            createpost($titel,$text, $autor,$img,$tmp_img);
}
}

?>
</body>
</html>
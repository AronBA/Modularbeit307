c<html lang="de">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
</head>
<body id="grad">
<div class="nav">
    <a href="index.php">Home | </a><a href="form.php"> New Post </a><a href="edit.php"> | Edit Posts</a>
</div>
<div class="content">
    <div class="welcome">
        <div id="title">NEW POST</div>
        <div id="text">create a new Post!</div>
    </div>

    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <titel class="formitile" >Titel:</titel>
            <input type="text" class="intitel" name="Titel"> <br>
            <titel class="formautor" >Autor:</titel>
            <input type="text" class="inautor" name="Autor"><br>
            <textarea name="content" class="incontent"></textarea><br>
            select image
            <input type="file" class="infile" name="picture"><br>
            <input type="submit" class="insubmit" name="submit" value="Post!">
        </form>
    </div>
</div>
<footer class="nav">
    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">About | </a><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley"> Impressum </a><a href="https://github.com/AronBA"> | GitHub</a>
</footer>
<?php
require "backend.php";
if(isset($_POST['submit'])) {
    $titel = $_POST["Titel"];
    $autor = $_POST["Autor"];
    $text = $_POST["content"];
    $img = $_FILES["picture"]["name"];
    $tmp_img = $_FILES["picture"]["tmp_name"];
    createpost($titel,$text, $autor,$img,$tmp_img);
}

?>
</body>
</html>
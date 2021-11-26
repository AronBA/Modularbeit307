<html lang="de">
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
        <div id="text">I feel depressed!</div>
    </div>

    <div class="form">
        <form action="backend.php" method="post">
            Titel
            <input type="text" name="Titel"><br>
            Autor
            <input type="text" name="Autor"><br>
            Inhalt
            <textarea name="content">Hier kommt post test rein</textarea><br>
            Bild
            <input type="file" name="picture"><br>
            <input type="submit" name="submit" value="Post!">
        </form>
    </div>
</div>
<footer class="nav">
    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">About | </a><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley"> Impressum </a><a href="https://github.com/AronBA"> | GitHub</a>
</footer>
</body>
</html>
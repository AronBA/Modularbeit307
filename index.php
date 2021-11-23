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
            <div id="title">Willkommen</div>
            <div id="text">Hier website und coller text weil das cool ist und no shut up im depressed</div>
        </div>

        <div class="Posts">
            <?php
            require "backend.php";
            for ($i = 1; $i < getdirlen(); $i++){
                loadpost($i);
                echo "<br>";
            }
            ?>
        </div>
    </div>
    <footer class="nav">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">About | </a><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley"> Impressum </a><a href="https://github.com/AronBA"> | GitHub</a>
    </footer>
</body>
</html>
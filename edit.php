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
        <div id="title">Edit Post</div>
        <div id="text">Here you can edit the selected Post</div>
    </div>

    <div class="Posts">
        <?php
        require "backend.php";
        if(isset($_GET['editPost'])
            && isset($_GET['editImage'])) {
            $oldpost = $_GET['editPost'];
            $oldimg = $_GET['editImage'];
            $txt = file_get_contents($_GET['editPost']);
            $content = explode("<|>", $txt);
            echo "<form method='post' enctype='multipart/form-data'>
                            <div id='newPostForm'>
                                <input type='text' class='intitel' name='title'  required='required' maxlength='80' value='$content[0]' placeholder='title'>
                                <input type='text' name='username' class='inautor' required='required' maxlength='50' value='$content[3]' placeholder='autor'>
                                <textarea name='content' class='incontent' id='content' required='required' maxlength='2000' placeholder='Content'>$content[1]</textarea>
                             
                                    <input type='file' class='fileInput' name='fileToUpload' id='fileToUpload' accept='.jpeg, .png, .jpg, .gif' required>
 
                                <input type='submit' class='submitPost' name='edit' value='edit'>
                            </div>
                        </form>";

            if (isset($_POST["edit"])) {
                $tmp_img = $_FILES['fileToUpload']['tmp_name'];
                $img = $_FILES['fileToUpload']['name'];
                $imgSize = $_FILES['fileToUpload']['size'];
                $autor = htmlspecialchars(trim($_POST['username']));
                $titel = htmlspecialchars(trim($_POST['title']));
                $text = htmlspecialchars(trim($_POST['content']));
                if (strlen($titel) > 80 && isset($titel) && !empty($titel)
                    || (strlen($autor) > 50) && isset($autor) && !empty($autor)
                    || (strlen($text) > 2000) && isset($text) && !empty($text)
                || $imgSize > 500000 && isset($img)) {
                    redirect("error.php");
                } else {
                   editpost($titel,$autor,$text,$img,$tmp_img,$oldpost,$oldimg);
                }
            }
        }
        ?>
    </div>
</div>
<footer class="nav">
    <a href="https://github.com/AronBA">GitHub</a>
</footer>
</body>
</html>
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
            && isset($_GET['editImage'])){
            $get_filename = $_GET['editPost'];
            $get_imagename = $_GET['editImage'];
            $txt = file_get_contents($get_filename);
            $content = explode("<|>",$txt);
            echo "<form method='post' enctype='multipart/form-data'>
                            <div id='newPostForm'>
                                 <titel class='formitile' required >Titel:</titel>
                                <input type='text' name='username' class='inautor' required='required' maxlength='50' value='$content[3]' placeholder='Username'>
                                <input type='text' class='intitel' name='title'  required='required' maxlength='80' value='$content[0]' placeholder='Title'>
                                <textarea name='content' class='incontent' id='content' required='required' maxlength='2000' placeholder='Content'>$content[1]</textarea>
                                <div class='fileInputClass'>
                                    <input type='file' class='fileInput' name='fileToUpload' id='fileToUpload' accept='.jpeg, .png, .jpg, .gif'>
                                </div>
                                <input type='submit' class='submitPost' name='submit' id='submit' value='POST!'>
                            </div>
                        </form>";

            if(isset($_POST["submit"])){
                if(!empty($_FILES['fileToUpload']['size'])){
                    $tmp_img = $_FILES['fileToUpload']['tmp_name'];
                    $img = $_FILES['fileToUpload']['name'];
                    $imgSize = $_FILES['fileToUpload']['size'];
                    $autor = $_POST['username'];
                    $titel = $_POST['title'];
                    $text = $_POST['content'];
                    createpost($titel,$text, $autor,$img,$tmp_img);
                }else{
                    $usernameNew = $_POST['username'];
                    $titleNew = $_POST['title'];
                    $contentNew = $_POST['content'];
                }
            }
        }else{redirect("index.php");}
        ?>
    </div>
</div>
<footer class="nav">
    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">About | </a><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley"> Impressum </a><a href="https://github.com/AronBA"> | GitHub</a>
</footer>
</body>
</html>
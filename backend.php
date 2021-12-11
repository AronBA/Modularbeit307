<?php
function getdirlen(){
    $dirlen = 0;
    $dirpath = "./posts/text/*.txt";
    foreach(glob($dirpath) as $file){
        $dirlen++;
    }
    return $dirlen;
}

function loadpost($file,$img,$mode="load"){
    if ($mode == "load"){
        $path = "posts/text/$file";
        $imgpath = "posts/img/$img";
        $txt = file_get_contents($path);
        $content = explode("<|>", $txt);
        echo "<div class='Post'>
                <titel class='titel'>$content[0]</titel>
                <a class='editPost' href='edit.php?editPost=$path&editImage=$imgpath'><div class='postEdit'>Edit</div></a>
                <a class='deletePost' href='backend.php?deletePost=$path&deleteImage=$imgpath'><div class='postDelete'>Delete</div></a>
                <autor class='autor'>by $content[3]</autor>
                <content class='text'>$content[1]</content>
                <date class='date'>$content[2]</date>
                <img class='img' src='posts/img/$img' alt='picture'>
                </div>";
    }
}

function timestamp(){
    $date = date("YmdHisu");
    return $date;
}

function getpost($n,$mode="post"){
    if ($mode == "post") {
        $folder = scandir("posts/text", SCANDIR_SORT_DESCENDING);
        return $folder[$n];
    } else if ($mode == "img"){
        $folder = scandir("posts/img", SCANDIR_SORT_DESCENDING);
        return $folder[$n];
    }
}

function createpost($titel,$autor,$text,$img,$tmp_img){
    $filename = timestamp();
    $date = date("d/m/Y h:i:s");
    $content = $titel . "<|>" . $autor . "<|> ". $date . "<|>" . $text . "<|>" . $filename.".txt";
    $post = fopen("posts/text/$filename.txt", "w");
    fwrite($post,$content);
    fclose($post);
    $filetype = strtolower(pathinfo(basename($img),PATHINFO_EXTENSION));
    move_uploaded_file($tmp_img, "posts/img/$filename.$filetype");
    redirect("index.php");
}

function editpost($titel,$text,$autor,$img,$tmp_img,$oldpost,$oldimg){
    $filename = timestamp();
    $date = date("d/m/Y h:i:s");
    $content = $titel . "<|>" . $autor . "<|> ". $date . "<|>" . $text . "<|>" . $filename.".txt";
    $post = fopen("posts/text/$filename.txt", "w");
    fwrite($post,$content);
    fclose($post);
    $filetype = strtolower(pathinfo(basename($img),PATHINFO_EXTENSION));
    move_uploaded_file($tmp_img, "posts/img/$filename.$filetype");
    deletepost($oldpost,$oldimg);
    redirect("index.php");
}



function redirect($url)
{
    echo "<meta http-equiv='refresh' content='0;url=$url'>";
    exit();
}

if(isset($_GET['deletePost'])
&&isset($_GET['deleteImage'])) {
        deletePost($_GET['deletePost'],$_GET["deleteImage"]);
}

function deletepost($filename,$imgname){
    $filetype = strtolower(pathinfo(basename($filename),PATHINFO_EXTENSION));
    if ($filetype == "txt"){
        unlink($filename);
        unlink($imgname);
        redirect("index.php");
    }
}




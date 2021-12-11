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
        $txt = file_get_contents($path);
        $content = explode("<|>", $txt);
        echo "<div class='Post'>
                <titel class='titel'>$content[0]</titel>
                <autor class='autor'>by $content[3]</autor>
                <content class='text'>$content[1]</content>
                <date class='date'>$content[2]</date>
                <img class='img' src='posts/img/$img' alt='picture'>
                </div>";
    } else if ($mode = "edit"){
        $path = "posts/text/$file";
        $txt = file_get_contents($path);
        $content = explode("<|>", $txt);
        echo "<div class='Post'>
                <titel class='titel'>$content[0]</titel>
                <form><input type='submit' value='$file' name='$file'>
                <input type='submit' value='edit'></form>
                <autor class='autor'>by $content[3]</autor>
                <content class='text'>$content[1]</content>
                <date class='date'>$content[2]</date>
                <img class='img' src='posts/img/$img' alt='picture'>
                </div>";
    }
}

function deletepost($filename){
    $txtpath = "posts/text/$filename";
    $imgpath = "posts/img/$filename";
    $filetype = strtolower(pathinfo(basename($txtpath),PATHINFO_EXTENSION));
    if ($filetype == "txt"){
        unlink($txtpath);
        unlink($imgpath);
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
}


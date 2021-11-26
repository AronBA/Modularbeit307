<?php
function getdirlen(){
    $dirlen = 0;
    $dirpath = "./posts/text/*.txt";
    foreach(glob($dirpath) as $file){
        $dirlen++;
    }
    return $dirlen;
}

function loadpost($file,$mode="load"){
    if ($mode == "load"){

        $path = "posts/text/$file";
        $txt = file_get_contents($path);
        $content = explode("<|>", $txt);
        echo "<div class='Post'>
<titel class='titel'>$content[0]</titel>
<autor class='autor'>by $content[3]</autor>
<content class='text'>$content[1]</content>
<date class='date'>$content[2]</date>
<img class='img' src='posts/img/image0.jpg' alt='picture'>
</div>";
    }
}
function timestamp(){
    $date = date("Ymdhis");
    return $date;
}
function getpost($n,$mode="text"){
    $folder = scandir("posts/text", SCANDIR_SORT_DESCENDING);
    return $folder[$n];
}


function createpost($titel,$autor,$text){
    $filename = timestamp();
    $date = date("d/m/Y h:i:s");
    $content = $titel . "<|>" . $autor . "<|> ". $date . "<|>" . $text;

    $post = fopen("posts/text/$filename.txt", "w");
    fwrite($post,$content);
    fclose($post);
}

if(isset($_POST['submit'])) {
    $titel = $_POST["Titel"];
    $autor = $_POST["Autor"];
    $text = $_POST["content"];
    createpost($titel,$text, $autor);
    header("Location: index.php");
}



<?php
function getdirlen(){
    $dirlen = 1;
    $dirpath = "./posts/text/*.txt";
    foreach(glob($dirpath) as $file){
        $dirlen++;
    }
    return $dirlen;
}

function loadpost($file,$mode="load"){
    if ($mode == "load"){

        $path = "posts/text/$file.txt";
        $txt = file_get_contents($path);
        $content = explode("<|>", $txt);
        echo "<div class='Post'>
<titel class='titel'>$content[0]</titel>
<br>
<date class='date'>$content[1]</date>
<br>
<content class='content'>$content[2]</content>
</div>";
    }
}

function createpost($titel,$text){
    $filename = getdirlen();
    $date = date("d/m/Y");
    $content = $titel . "<|>" . $date . "<|>" . $text;

    $post = fopen("posts/text/$filename.txt", "w");
    fwrite($post,$content);
    fclose($post);
}

if(isset($_POST['submit'])) {
    $titel = $_POST["Titel"];
    $text = $_POST["content"];
    createpost($titel,$text);
    header("Location: index.php");
}



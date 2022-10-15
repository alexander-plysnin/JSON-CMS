<?
file_put_contents('json/'.$_POST["file"].'.json', $_POST["code"]);
 
header("Location: /admin.php?m=".$_POST["file"]);
    exit;

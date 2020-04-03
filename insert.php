<?php
require_once __DIR__ .'/vendor/autoload.php';
$insertdata=new DB_con();

    $text=$_POST['text'];

    $sql=$insertdata->insert($text);
    if($sql)
    {
        $getData = $insertdata->get();
        echo $getData;
    }
    else
    {
        echo "<script>alert('Data not inserted');</script>";
    }

?>
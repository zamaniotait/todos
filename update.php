<?php
require_once __DIR__ .'/vendor/autoload.php';
$insertdata=new DB_con();

$text=$_POST['text'];
$id = $_POST['id'];

$sql=$insertdata->inputFieldUpdate($id,$text);
if($sql)
{
    $getData = $insertdata->updateGetData($id);
    echo $getData;
}
else
{
    echo "<script>alert('Data not inserted');</script>";
}

?>
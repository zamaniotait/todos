<?php
require_once __DIR__ .'/vendor/autoload.php';
$insertdata=new DB_con();
$id = $_POST['id'];

$sql=$insertdata->delete_data($id);
if($sql)
{
    $getCount = $insertdata->markedCount();
    echo $getCount;
}
else
{
    echo "<script>alert('Data not inserted');</script>";
}
?>
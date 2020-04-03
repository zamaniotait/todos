<?php
require_once __DIR__ .'/vendor/autoload.php';
$insertdata=new DB_con();

$id=$_POST['id'];

$sql=$insertdata->markedUpdate($id);
if($sql)
{
    $getData = $insertdata->markedCount();
    echo $getData;
}
else
{
    echo "<script>alert('Data not inserted');</script>";
}

?>
<?php
require_once __DIR__ .'/vendor/autoload.php';
$insertdata=new DB_con();


$sql=$insertdata->delete();
if($sql)
{

}
else
{
    echo "<script>alert('Data not inserted');</script>";
}

?>
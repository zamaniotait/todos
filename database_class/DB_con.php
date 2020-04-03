<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'todo');
class DB_con
{
    function __construct()
    {
        $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        $this->dbh=$con;
// Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    public function insert($text)
    {
        $ret=mysqli_query($this->dbh,"insert into todo_list(text,active)
values('$text','0')");
        return $ret;
    }
    public function get(){

        $ret=mysqli_query($this->dbh,"select * from todo_list where active='0'");
        $rowcount=mysqli_num_rows($ret);
        while($row = mysqli_fetch_assoc($ret)){
            $output = "<div id='non_active-".$row['id']."' class='.$rowcount  .  '  onmouseover='show(this.id)' onmouseout='hide(this.id)'><p id='".$row['id']."'><i class='fa fa-circle-o' id=".$row['id']." onclick='markRead(this.id)'></i> &nbsp;&nbsp;&nbsp; <span id='checks_item-".$row['id']."' ondblclick='dblPressEdit(this.id)'>".$row['text']."</span><span style='float: right;display: none' id='del-".$row['id']."' onclick='deleteData(this.id)'>x</span><input id='text_fields-".$row['id']."' value='".$row['text']."' style='display: none' onchange=updateValue(this.id)></p></div>";
        }

        echo $output;
    }

    public function inputFieldUpdate($id,$text){

        $update = mysqli_query($this->dbh,"UPDATE todo_list SET text='$text' WHERE id='$id'");
        return $update;

    }
    public function updateGetData($id){
        $ret=mysqli_query($this->dbh,"select * from todo_list where id='$id'");
//    $rowcount=mysqli_num_rows($ret);
        $row = mysqli_fetch_assoc($ret);
        $output = "<div id='non_active-".$row['id']."'><p id='".$row['id']."'><i class='fa fa-circle-o' id=".$row['id']." onclick='markRead(this.id)'></i> &nbsp;&nbsp;&nbsp; <span id='checks_item-".$row['id']."' ondblclick='dblPressEdit(this.id)'>".$row['text']."</span><input id='text_fields-".$row['id']."' value='".$row['text']."' style='display: none'></p></div>";


        echo $output;
    }

    public function markedUpdate($id){
        $updatedMarked=mysqli_query($this->dbh,"UPDATE todo_list SET active='1' WHERE id='$id'");

        return $updatedMarked;
    }

    public function markedCount(){
        $updatedMarked=mysqli_query($this->dbh,"SELECT * FROM todo_list WHERE active='0'");
        $rowcount=mysqli_num_rows($updatedMarked);
        echo $rowcount;
    }
    public function delete(){
        $deleteRecords = mysqli_query($this->dbh,"DELETE FROM todo_list WHERE active = '1'");
        return $deleteRecords;
    }
    public function delete_data($id){
        $deleteRecords = mysqli_query($this->dbh,"DELETE FROM todo_list WHERE id = '$id'");
        return $deleteRecords;
    }
    public function getAll(){
        $getAll=mysqli_query($this->dbh,"SELECT * FROM todo_list");
        return $getAll;
    }

}
?><?php

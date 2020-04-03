<?php

require_once __DIR__ .'/vendor/autoload.php';
$getAll = new DB_con();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php";?>

</head>
<body>


<div class="container">
    <br>
<h1 class="head_title">TODOS</h1>
<input type="text" class="input_text" id="text" onchange="dataLoader()" name="text" placeholder="Whats need to be done?">

    <div class="card" id="card_body" style="visibility: hidden">
        <div class="card-body" >
            <div id="texts">
                <?php
                $result = $getAll->getAll();
                $rowcount=mysqli_num_rows($result);

                while($row = mysqli_fetch_assoc($result)){
                    if ($row['active']==0){

                        ?>
                        <div id="non_active-<?php echo $row['id']; ?>" onmouseover="show(this.id)" onmouseout="hide(this.id)">
              <p  class="all_checked"><i class="fa fa-circle-o" id="<?php echo $row['id']; ?>" onclick="markRead(this.id)"></i> &nbsp;&nbsp;&nbsp; <span id="checks_item-<?php echo $row['id']; ?>" ondblclick="dblPressEdit(this.id)"><?php echo $row['text']; ?></span><span style="float: right;display: none" id="del-<?php echo $row['id']; ?>" onclick="deleteData(this.id)">x</span><input type="text" id="text_fields-<?php echo $row['id']; ?>" name="text" value="<?php echo $row['text']; ?>" style="display: none;" onchange="updateValue(this.id)"></p>
                        </div>
                <?php

                    }
                }
                ?>
            </div>
            <div id="actives" style="display: none">
                <?php
                $result = $getAll->getAll();
                while($row = mysqli_fetch_assoc($result)){
                    if ($row['active']==1){
                        ?>
                        <div id="actives" >
              <p class="checked"> <strike> <?php echo $row['text']; ?></strike></p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <hr>
            <div id="all_actions">
                <label style="margin-right: 80px;"><span id="rowCount" style="font-size: 14px"></span> </label>
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="showAll()" style="font-size: 10px">All</button>
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="removeMarked()" style="font-size: 10px">Active</button>
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="activeShow()" style="font-size: 10px">Completed</button>

                <a type="button"  id="clear" class="btn btn-outline-secondary btn-sm" style="display: none;font-size: 10px" onclick="deleteAll()" >Clear completed</a>
            </div>
        </div>
    </div>
</div>

<script src="script.js">

</script>
</body>
</html>
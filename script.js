
function dataLoader() {
    var card = document.getElementById('card_body');
    card.style.visibility = 'visible';
    var text=$("#text").val();

    $.ajax({
        url:"insert.php",
        method: "POST",
        data:{
            text:text
        },
        success:function (data) {
            card.style.visibility = 'visible';
            $("#texts").append(data);
            var firstCount = data[33];
            var secondCount = data[34];
            var thirdCount = data[35];
            window.count = firstCount;
            window.count1 = secondCount;
            window.count2 = thirdCount;
            var spanRow = document.getElementById("rowCount")
            spanRow.innerText = firstCount+secondCount+thirdCount+" items left";
        }
    })
}
function markRead(id) {

    var tik = document.getElementById(id);
    var cross = document.getElementById("checks_item-"+id);
    $.ajax({
        url:"marked_update.php",
        method: "post",
        data:{
            id:id,
        },
        success:function (data) {
            window.markedRowCount = data;
        }
    });
    cross.style.textDecoration = "line-through";
    window.value = id;

}

function removeMarked(){
    var id = window.value;
    $("#non_active-"+id).fadeOut(500, function() { $("#non_active-"+id).remove(); });
    var modalShown = document.getElementById("actives");
    var getModal = document.getElementById("checks_item-"+id);
    var x = document.createElement("BR");
    var spaceNode = getModal.appendChild(x);
    getModal.style.color = "#d1ccbc";
    $("#actives").append(getModal);
    var spanRow = document.getElementById("rowCount")
    spanRow.innerText = window.markedRowCount+" items left";

}


function dblPressEdit(id) {
    // console.log(id);
    var hiddenDiv = document.getElementById(id);
    var replaceId = id.replace(/^\D+/g, "")
    hiddenDiv.style.display = "none";
    var getTextField = document.getElementById("text_fields-"+replaceId);
    getTextField.style.display = "initial";


}
function activeShow() {
    var modalHidden = document.getElementById("texts");
    modalHidden.style.display ='none';
    var modalShown = document.getElementById("actives");
    modalShown.style.display = 'contents';
    var modalRemove = document.getElementById("clear");
    modalRemove.style.display = 'initial';

}
function showAll() {
    var modalHidden = document.getElementById("texts");
    modalHidden.style.display ='initial';
    var modalGet = document.getElementById("clear");
    modalGet.style.display = 'none';
    var modalShown = document.getElementById("actives");
    modalShown.style.display = 'none';



}
function updateValue(id) {

    var getId = id.replace(/^\D+/g, "");
    var text=$("#text_fields-"+getId).val();
    $.ajax({
        url:"update.php",
        method:"POST",
        data:{
            id: getId,
            text: text,
        },
        success:function (data) {
            var getDiv= document.getElementById(id);
            getDiv.style.display = "none";
            var add = document.getElementById("checks_item-"+getId)
            $('#non_active-'+getId).replaceWith(data);
        }
    });

}

function deleteAll() {
    $.ajax({
        url:"delete.php",
        method: "post",

    });
    document.getElementById("actives").remove();

}
function show(id) {

    var replaceId = id.replace(/^\D+/g, "");
    var getDiv = document.getElementById("del-"+replaceId);
    getDiv.style.display = "initial";
    getDiv.style.cursor = "pointer";

}
function hide(id) {

    var replaceId = id.replace(/^\D+/g, "");
    var getDiv = document.getElementById("del-"+replaceId);
    getDiv.style.display = "none";

}

function deleteData(id){
    var id = id.replace(/^\D+/g, "");
    $("#non_active-"+id).fadeOut(500, function() { $("#non_active-"+id).remove(); });
    $.ajax({
        url:"delete_data.php",
        method: "post",
        data:{
            id:id,
        },
        success:function (data) {

            var spanRow = document.getElementById("rowCount");
            spanRow.innerText = data+" items left";


        }
    });

}
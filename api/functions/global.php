<?php

function createMsgAlert($type, $msg){
    $alert = array(
        "type" => $type,
        "msg" => $msg
    );

    return $alert;
}


function alert($alert){
    echo"<div class='alert alert-".$alert["type"]."' role='alert'>
    ".$alert["msg"]."
        <button type='button' class='btn-close' data-bs-dismiss='alert' data-bs-target='#my-alert' aria-label='Close'></button>
    </div>";
}




?>
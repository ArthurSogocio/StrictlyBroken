<?php

function insert_user($first_name, $last_name) {
    $insertquery = "INSERT INTO users "
            . "(first_name, last_name) VALUES "
            . "('$first_name', "
            . "'$last_name')";
    $insert = db_select($insertquery);
}

function insert_transaction($id, $amount, $comment) {
    
    $insertquery = "INSERT INTO credit_transactions "
            . "(user_id, amount, transaction_comment) VALUES "
            . "($id, "
            . "$amount, "
            . "'$comment')";
    $insert = db_select($insertquery);
    
    //var_dump($insertquery);
}


?>
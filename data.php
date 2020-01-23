<?php

function get_data() {
    $List = [];

    $contacts = [
        "Jean-Luc Picard"=>"(11)12345-6789",
        "Data"=>"(21)98765-4321",
        "Hugh"=>"(23)99999-9999",
        "Deanna Troi"=>"(18)11111-1111",
        "William Riker"=>"(11)55555-5555"
    ];

    foreach($contacts as $name=>$phone) {
        $List[] = $name." - ".$phone;
    }

    return $List;
}

?>
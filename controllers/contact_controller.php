<?php

require('../classes/contact_class.php');

//edit,select,update,delete function
/**
 * 
 */
function addContact_ctr($var1,$var2)
{
    # code...
    //create an intance of the class
    $add_contact = new ContactPhoneClass();

    return $add_contact -> addContact_cls($var1,$var2);
}

function get_all_contact_ctr()
{
    //create an instanct of class
    $select_item = new ContactPhoneClass();

    $action_item = $select_item->selectAllContact_cls();

    if ($action_item) {
        # code...
    }
    else {
        return false;
    }
}

public function edit_contact_ctr($var1,$var2)
{
    # code...
    //editing an instance of the class
    
}

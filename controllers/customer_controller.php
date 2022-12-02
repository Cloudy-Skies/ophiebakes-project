<?php
require('../classes/customer_class.php');

//edit,select,update, delete function

//takes 7 vars
function add_customer_controller($name, $email, $password, $country, $city, $contact, $image)
{
    $customer_instance = new Customer();

    return $customer_instance->add_customer_cls($name, $email, $password, $country, $city, $contact, $image);
}


function select_one_customer_controller($email)
{
    $select_one_customer = new Customer();

    return  $select_one_customer->select_one_customer_cls($email);
    //return $actionItem;

}

function select_customer_pass_ctr($password)
{
    $select_customer_password = new Customer();

    return $select_customer_password->select_customer_pass_cls($password);
    //var_dump($selectpassword);

}


// //:
// function get_all_customer_ctr()
// {
//     # code...
// }

function edit_customer_controller($id, $name, $email, $country, $city, $contact)
{
    $customer_instance = new Customer();
    return $customer_instance->edit_customer_cls($id, $name, $email, $country, $city, $contact);
}
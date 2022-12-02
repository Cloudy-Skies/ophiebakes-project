<?php

require('../controllers/customer_controller.php');

// check for a POST variable with the name 'register'
if(isset($_POST['submit'])){
    // retrieve the name, description and quantity from the form submission
    $full_name = $_POST['fname']+' '+$_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];



    // checking if someone's has the same email
    $customer = select_one_customer_controller($email);
    $existingCustomer = $customer['customer_email'];

    if ($existingCustomer){
        echo "<script>alert('Sorry, the email already exists, use a new one');window.location.href = '../login/register.php';</script>";
    }

    else{
        // calling the add_customer_controller function and adding a new customer
        $result = add_customer_controller($full_name, $email, $password, $country, $city, $contact,$image);
        if($result === true) {
            echo ("<script>alert('Sign up was successful'); window.location.href = '../index.php';</script>");
        }
        else{
            echo ("<script>alert('Error occurred! try again later'); window.location.href = '../login/register.php';</script>");
        }
    }
}
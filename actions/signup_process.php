<?php

require('../controllers/customer_controller.php');

// check for a POST variable with the name 'register'
if (isset($_POST['submit'])) {
    // retrieve the name, description and quantity from the form submission
    $full_name = $_POST['fullname'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $conp = $_POST['confirm_password'];
    
    if ($pass != $conp){
        echo "<script>alert('Password do not match');window.location.href = '../view/true-auth-sign-up.php';</script>";
    }else{
        $password = password_hash($pass, PASSWORD_BCRYPT);
    }
    
    
    // checking if someone's has the same email
    $customer = select_one_customer_controller($email);
    $existingCustomer = $customer['customer_email'];

    if ($existingCustomer) {
        echo "<script>alert('Sorry, the email already exists, use a new one');window.location.href = '../view/true-auth-sign-up.php';</script>";
    } else {
        // calling the add_customer_controller function and adding a new customer
        $result = add_customer_controller($full_name, $email, $password, $country, $city, $contact, $image);
        if ($result) {
            echo ("<script>alert('Sign up was successful'); window.location.href = '../index.php';</script>");
        } else {
            echo ("<script>alert('Error occurred! try again later'); window.location.href = '../view/true-auth-sign-up.php';</script>");
        }
    }
}